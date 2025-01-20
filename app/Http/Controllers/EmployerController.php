<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployerVerificationMail;
use Illuminate\Support\Facades\Validator;
use Webpatser\Countries\Countries;
use Illuminate\Support\Facades\Log;

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
            'po_box_no' => 'required|numeric|digits_between:1,5', // Allow up to 5 digits
            'contact_person_1' => 'required|string|max:255',
            'contact_number_1' => 'required|numeric|digits_between:1,10',
            'email' => 'required|email|unique:employers,email',
            'password' => 'required|string|min:8|confirmed',
            'verification_code' => 'required|numeric|digits_between:1,7',
            'terms' => 'accepted', // Make sure to add this for checkbox validation
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            Log::error('Employer registration validation failed:', [
                'errors' => $validator->errors(),
                'input' => $request->all(), // Optionally log the input data for debugging purposes
            ]);
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
    
        // Return success message
        return redirect()->route('employer.register')
                         ->with('success', 'Registration successful! Please verify your email.');
    }    
}
