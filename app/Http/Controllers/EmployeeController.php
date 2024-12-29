<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeVerificationMail;

class EmployeeController extends Controller
{
    public function showRegistrationForm()
    {
        return view('employee.register');
    }

    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string', // You should validate 'gender' if it's a required field
            'email' => 'required|email|unique:employees',
            'password' => 'required|confirmed',
            'resume' => 'nullable|mimes:pdf,docx,txt|max:10240',
        ]);

        // Store the resume if uploaded
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes');
        }

        // Store employee
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'resume_path' => $resumePath,
        ]);

        // Send verification email
        Mail::to($employee->email)->send(new EmployeeVerificationMail());

        // Redirect to registration page with success message
        return redirect()->route('employee.register')->with('status', 'Check your email for verification');
    }
}
