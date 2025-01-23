@extends('layouts.app')

@section('content')
<div class="container content">
    <h1>Employee Registration</h1>
    <form method="POST" action="{{ url('/employee/register') }}" enctype="multipart/form-data" class="login-form">
        @csrf

        <!-- First Name -->
        <div class="form-group">
            <label class="control-label" for="first_name">First Name</label>
            <input type="text" class="txtOnly form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" maxlength="30" value="{{ old('first_name') }}" required>
            @error('first_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label class="control-label" for="last_name">Last Name</label>
            <input type="text" class="txtOnly form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" maxlength="30" value="{{ old('last_name') }}">
            @error('last_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label class="control-label" for="gender">Gender</label>
            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Marital Status -->
        <div class="form-group">
            <label class="control-label" for="marital_status">Marital Status</label>
            <select class="form-control @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status" required>
                <option value="Single" {{ old('marital_status') == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="Married" {{ old('marital_status') == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Other" {{ old('marital_status') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('marital_status')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <!-- Date of Birth -->
        <div class="form-group">
            <label class="control-label" for="date_of_birth">Date of Birth</label>
            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
            @error('date_of_birth')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Education Qualification -->
        <div class="form-group">
            <label class="control-label" for="education_qualification">Education Qualification</label>
            <input type="text" class="txtOnly form-control @error('education_qualification') is-invalid @enderror" id="education_qualification" name="education_qualification" value="{{ old('education_qualification') }}">
            @error('education_qualification')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label class="control-label" for="phone">Phone</label>
            <input type="text" class="form-control phNumOnly @error('phone') is-invalid @enderror" id="phone" name="phone" maxlength="10" value="{{ old('phone') }}" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Addresss -->
        <label class="control-label" for="">Addresss</label>

        <div class="form-group">
            <label class="control-label" for="country">Country</label>
            <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required>
                <option value="" selected>--Select Country--</option>
                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>UK</option>
                <option value="Sri lanka" {{ old('country') == 'Sri lanka' ? 'selected' : '' }}>Sri lanka</option>
            </select>
            @error('country')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="state">State</label>
            <select class="form-control @error('state') is-invalid @enderror" id="state" name="state" required>
                <option value="" selected>--Select State--</option>
                <option value="Tamilnadu" {{ old('state') == 'Tamilnadu' ? 'selected' : '' }}>Tamilnadu</option>
                <option value="Kerala" {{ old('state') == 'Kerala' ? 'selected' : '' }}>Kerala</option>
                <option value="Karnataka" {{ old('state') == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
            </select>
            @error('state')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="control-label" for="district">District</label>
            <select class="form-control @error('district') is-invalid @enderror" id="district" name="district" required>
                <option value="" selected>--Select District--</option>
                <option value="Tiruvanamalai" {{ old('district') == 'Tiruvanamalai' ? 'selected' : '' }}>Tiruvanamalai</option>
                <option value="Chennai" {{ old('district') == 'Chennai' ? 'selected' : '' }}>Chennai</option>
                <option value="Kanchipuram" {{ old('district') == 'Kanchipuram' ? 'selected' : '' }}>Kanchipuram</option>
            </select>
            @error('district')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- City / Village -->
        <div class="form-group">
            <label class="control-label" for="city">City / Village / Street</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('education_qualification') }}">
            @error('city')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>






         <!-- Email -->
        <div class="form-group">
            <label class="control-label" for="email">Email<span class="mandatory-icon">*</span></label>
            <input  type="email" class="emailValidation form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label class="control-label" for="password">Password<span class="mandatory-icon">*</span></label>
            <input  type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label class="control-label" for="password_confirmation">Confirm Password<span class="mandatory-icon">*</span></label>
            <input  type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Resume -->
        <div class="form-group">
            <label class="control-label" for="resume">Resume (PDF, Max 2MB)</label>
            <input type="file" class="form-control-file @error('resume') is-invalid @enderror" id="resume" name="resume" accept=".pdf" required>
            @error('resume')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Terms & Conditions -->
        <div class="form-group">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="control-label" class="form-check-label" for="terms">I agree to the <a href="#">Terms of Service & Privacy Policy</a></label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@include('employee.script')
@endsection
