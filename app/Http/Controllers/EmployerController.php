<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployerVerificationMail;

class EmployerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('employer.register');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'company_name' => 'required|string',
            'country' => 'required|string',
            'place' => 'required|string',
            'address' => 'required|string',
            'po_box_no' => 'required|string',
            'contact_person_1' => 'required|string',
            'contact_number_1' => 'required|string',
            'email' => 'required|email|unique:employers',
            'password' => 'required|confirmed',
        ]);

        // Generate verification code
        $verificationCode = rand(1000, 9999);

        // Store employer
        $employer = Employer::create([
            'company_name' => $request->company_name,
            'country' => $request->country,
            'place' => $request->place,
            'address' => $request->address,
            'po_box_no' => $request->po_box_no,
            'contact_person_1' => $request->contact_person_1,
            'contact_number_1' => $request->contact_number_1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode,
        ]);

        // Send verification email
        Mail::to($employer->email)->send(new EmployerVerificationMail($verificationCode));

        // Redirect to registration page with success message
        return redirect()->route('employer.register')->with('status', 'Check your email for verification');
    }
}
