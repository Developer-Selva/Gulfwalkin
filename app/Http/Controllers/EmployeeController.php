<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeVerificationMail;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function showRegistrationForm()
    {
        return view('employee.register');
    }

    public function register(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'education_qualification' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15',
            'resume' => 'required|file|mimes:pdf|max:2048',
            'terms' => 'accepted',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('employee.register')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Handle resume file upload
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create employee record
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->gender = $request->gender;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->education_qualification = $request->education_qualification;
        $employee->phone = $request->phone;
        $employee->resume = $resumePath;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);

        // Capture IP address and browser details
        $employee->ip_address = $request->ip(); // Get client IP address
        $employee->browser = $request->header('User-Agent'); // Get client browser user-agent

        // Save employee data
        $employee->save();

        // Send the verification email
        Mail::to($request->email)->send(new EmployeeVerificationMail($employee));

        // Return response
        return redirect()->route('employee.register')
                         ->with('success', 'Registration successful! Please verify your email.');
    }
}
