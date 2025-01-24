<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployerApprovalMail;
use App\Mail\EmployerRejectionMail;
use App\Mail\EmployeeApprovalMail;

class AdminController extends Controller
{
    // Middleware to ensure only admin users can access
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    // Display the list of employers awaiting approval
    public function manageEmployers()
    {
        $employers = Employer::where('status', 'pending')->get();
        return view('admin.employers.index', compact('employers'));
    }

    // Approve an employer's registration
    public function approveEmployer($id)
    {
        $employer = Employer::find($id);

        if (!$employer) {
            return redirect()->route('admin.manage.employers')->with('error', 'Employer not found.');
        }

        // Update the employer's status to 'approved'
        $employer->status = 'approved';
        $employer->save();

        // Send approval email to the employer
        Mail::to($employer->email)->send(new EmployerApprovalMail());

        return redirect()->route('admin.manage.employers')->with('status', 'Employer approved successfully.');
    }

    // Reject an employer's registration
    public function rejectEmployer($id)
    {
        $employer = Employer::find($id);

        if (!$employer) {
            return redirect()->route('admin.manage.employers')->with('error', 'Employer not found.');
        }

        // Delete the employer record
        $employer->delete();

        // Send rejection email to the employer
        Mail::to($employer->email)->send(new EmployerRejectionMail());

        return redirect()->route('admin.manage.employers')->with('status', 'Employer rejected successfully.');
    }

    // Display the list of employees
    public function manageEmployees()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    // Approve an employee's registration
    public function approveEmployee($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return redirect()->route('admin.manage.employees')->with('error', 'Employee not found.');
        }

        // Send approval email to the employee
        Mail::to($employee->email)->send(new EmployeeApprovalMail());

        return redirect()->route('admin.manage.employees')->with('status', 'Employee approved successfully.');
    }

    // Deactivate an employer account (they can no longer log in)
    public function deactivateEmployer($id)
    {
        $employer = Employer::find($id);

        if (!$employer) {
            return redirect()->route('admin.manage.employers')->with('error', 'Employer not found.');
        }

        // Set status to 'deactivated'
        $employer->status = 'deactivated';
        $employer->save();

        return redirect()->route('admin.manage.employers')->with('status', 'Employer deactivated successfully.');
    }

    // Deactivate an employee account (they can no longer log in)
    public function deactivateEmployee($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return redirect()->route('admin.manage.employees')->with('error', 'Employee not found.');
        }

        // Set status to 'deactivated'
        $employee->status = 'deactivated';
        $employee->save();

        return redirect()->route('admin.manage.employees')->with('status', 'Employee deactivated successfully.');
    }
}
