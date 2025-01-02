<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployerVerificationMail;
use Illuminate\Support\Facades\Validator;
use Webpatser\Countries\Countries;

class EmployerController extends Controller
{
    public function showRegistrationForm()
    {
        $countries = [
            'USA' => 'United States',
            'CA' => 'Canada',
            'GB' => 'United Kingdom',
            'AU' => 'Australia',
            'IN' => 'India',
            // Add more countries here...
        ];
        return view('employer.register', compact('countries'));
    }

    public function register(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'po_box_no' => 'required|string|max:255',
            'contact_person_1' => 'required|string|max:255',
            'contact_number_1' => 'required|string|max:15',
            'email' => 'required|email|unique:employers,email',
            'password' => 'required|string|min:8|confirmed',
            'verification_code' => 'required|string|min:4|max:4',
            'terms' => 'accepted',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('employer.register')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Create employer record
        $employer = new Employer();
        $employer->company_name = $request->company_name;
        $employer->country = $request->country;
        $employer->place = $request->place;
        $employer->address = $request->address;
        $employer->po_box_no = $request->po_box_no;
        $employer->contact_person_1 = $request->contact_person_1;
        $employer->contact_number_1 = $request->contact_number_1;
        $employer->email = $request->email;
        $employer->password = bcrypt($request->password);
        $employer->verification_code = $request->verification_code;

        // Capture IP address and browser details
        $ip = $request->header('X-Forwarded-For') ?: $request->ip();
        $employer->ip_address = $ip; // Get client IP address
        
        $employer->browser = $request->header('User-Agent'); // Get client browser user-agent

        // Save employer data
        $employer->save();

        // Send the verification email
        Mail::to($request->email)->send(new EmployerVerificationMail($employer));

        // Return response
        return redirect()->route('employer.register')
                         ->with('success', 'Registration successful! Please verify your email.');
    }
}
