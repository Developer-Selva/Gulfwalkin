@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employer Registration</h1>
    <form method="POST" action="{{ url('/employer/register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Employer Name -->
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
            @error('company_name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Country -->
        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required>
                <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                <!-- Add other countries as required -->
            </select>
            @error('country')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Place -->
        <div class="form-group">
            <label for="place">Place</label>
            <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{ old('place') }}" required>
            @error('place')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- PO Box No -->
        <div class="form-group">
            <label for="po_box_no">PO Box No.</label>
            <input type="text" class="form-control @error('po_box_no') is-invalid @enderror" id="po_box_no" name="po_box_no" value="{{ old('po_box_no') }}" required>
            @error('po_box_no')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contact Person 1 -->
        <div class="form-group">
            <label for="contact_person_1">Contact Person 1</label>
            <input type="text" class="form-control @error('contact_person_1') is-invalid @enderror" id="contact_person_1" name="contact_person_1" value="{{ old('contact_person_1') }}" required>
            @error('contact_person_1')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contact Number 1 -->
        <div class="form-group">
            <label for="contact_number_1">Contact Number 1</label>
            <input type="text" class="form-control @error('contact_number_1') is-invalid @enderror" id="contact_number_1" name="contact_number_1" value="{{ old('contact_number_1') }}" required>
            @error('contact_number_1')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contact Person 2 -->
        <div class="form-group">
            <label for="contact_person_2">Contact Person 2</label>
            <input type="text" class="form-control @error('contact_person_2') is-invalid @enderror" id="contact_person_2" name="contact_person_2" value="{{ old('contact_person_2') }}">
            @error('contact_person_2')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Contact Number 2 -->
        <div class="form-group">
            <label for="contact_number_2">Contact Number 2</label>
            <input type="text" class="form-control @error('contact_number_2') is-invalid @enderror" id="contact_number_2" name="contact_number_2" value="{{ old('contact_number_2') }}">
            @error('contact_number_2')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Human Verification Code -->
        <div class="form-group">
            <label for="verification_code">Verification Code</label>
            <input type="text" class="form-control @error('verification_code') is-invalid @enderror" id="verification_code" name="verification_code" required>
            @error('verification_code')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- Terms & Conditions -->
        <div class="form-group">
            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
            <label class="form-check-label" for="terms">I agree to the <a href="#">Terms of Service & Privacy Policy</a></label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
