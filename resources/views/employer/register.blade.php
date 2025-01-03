<!-- resources/views/employer/register.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	
	<form class="login-form" name="logCmpfrm" id="logCmpfrm" method="post">
		<h3 class="form-title">EMPLOYERS SIGN IN</h3>		
		<div class="alert alert-danger" id="errCmpMsg" style="display:none;">
			<strong>Please Fill All Fields !</strong>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email ID" name="txtCmpEmail"  id="txtCmpEmail"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Password" type="password" name="txtCmpPwd" id="txtCmpPwd" />
		</div>
		<div class="form-actions">
			<input type="submit" name="btnCmpLogn" value="Login" id="btnCmpLogn" class="btn btn-success uppercase"/>&nbsp;&nbsp;<span style="display:none;" id="cmpcmnloadcntct"><img src="../assets/global/img/loading.gif" alt="" title=""/></span>
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
		</div>	
		<div class="create-account">
			<p>
				<a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" name="fgtForm" id="fgtForm" method="post" autocomplete="off">
		<h3>FORGOT PASSWORD ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="alert alert-danger" style="display:none;" id="errFgtMsg">
			<strong>Something went wrong. Please Try Again !</strong>
		</div>
		<div class="alert alert-success" style="display:none;" id="succFgtMsg">
			<strong>Check Your Email for Requested Data</strong>
		</div>
		<div class="form-group">
			<label class="control-label">Email ID<span class="mandatory-icon">*</span></label>
			<input class="form-control" type="text" name="txtEmailfgt" id="txtEmailfgt"/>
		</div>
		<div class="form-group">
			<label class="control-label">4 Digit Code<span class="mandatory-icon">*</span></label>
			<input class="form-control" type="text" name="txtBebcodefgt" id="txtBebcodefgt"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>&nbsp;&nbsp;<span style="display:none;" id="cmpcmnloadfgt"><img src="../assets/global/img/loading.gif" alt="" title=""/></span>
			<input type="submit" name="btnFgtFrm" id="btnFgtFrm" value="Submit" class="btn btn-success uppercase pull-right"/>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" name="regForm" id="regForm" method="post" autocomplete="off">
		<h3>EMPLOYERS SIGN UP</h3>
		<div class="alert alert-danger" style="display:none;" id="errRegMsg">
			<strong>Something went wrong. Please Try Again !</strong>
		</div>
		<div class="alert alert-success" style="display:none;" id="succRegMsg">
			<strong>Your Registration Successfully Done. An activation link has been sent to your mailid. Please check your spam folder also !</strong>
		</div>
		<p class="hint">
			 Enter the organization details:
		</p>
		<div class="form-group">
			<label class="control-label">Employer Name<span class="mandatory-icon">*</span></label>
			<input class="form-control placeholder-no-fix" type="text" name="txtName" id="txtName"/>
		</div>
		 <div class="form-group">
			<label for="lsCountry" class="control-label">Country <span class="mandatory-icon">*</span></label>
			<select name="lsCountry" id="lsCountry" class="select2 form-control">
				<option value="">Select</option></select>
		 </div>
		 <div class="form-group">
			<label class="control-label">Place<span class="mandatory-icon">*</span></label>
			<input class="form-control placeholder-no-fix" type="text" name="txtPlace" id="txtPlace"/>
		</div>
		<div class="form-group">
			<label class="control-label">Address<span class="mandatory-icon">*</span></label>
			<input class="form-control placeholder-no-fix" type="text" name="txtAddr" id="txtAddr"/>
		</div>
		<div class="form-group">
			<label class="control-label">PO Box No.<span class="mandatory-icon">*</span></label>
			<input class="form-control placeholder-no-fix" type="text" name="txtPobox" id="txtPobox"/>
		</div>
		<div class="form-group">
			<label class="control-label">Contact Person 1<span class="mandatory-icon">*</span></label>
			<input class="form-control placeholder-no-fix" type="text" name="txtPerson" id="txtPerson"/>
		</div>
		<div class="form-group">
			<label class="control-label">Contact Number 1<span class="mandatory-icon">*</span></label>
			<input class="form-control placeholder-no-fix" type="text" name="txtMob" id="txtMob"/>
		</div>
		<div class="form-group">
			<label class="control-label">Contact Person 2</label>
			<input class="form-control placeholder-no-fix" type="text" name="txtPerson2" id="txtPerson2"/>
		</div>
		<div class="form-group">
			<label class="control-label">Contact Number 2</label>
			<input class="form-control placeholder-no-fix" type="text" name="txtMob2" id="txtMob2"/>
		</div>
		<p class="hint">
			 Enter your account details below:
		</p>
		<div class="form-group">
			<label class="control-label">Email ID<span class="mandatory-icon">*</span></label>
			<input class="form-control" type="text" name="txtEmail" id="txtEmail"/>
		</div>
		<div class="form-group">
			<label class="control-label">Password<span class="mandatory-icon">*</span></label>&nbsp;&nbsp;<span id="result"></span>
			<input class="form-control" type="password" name="txtPassword1" id="txtPassword1"/>
		</div>
		<div class="form-group">
			<label class="control-label">Re-type Your Password<span class="mandatory-icon">*</span></label>
			<input class="form-control" type="password" name="txtPassword2" id="txtPassword2"/>
		</div>
		<div class="form-group">
			<label class="control-label">Type Any 4 Digit Code<span class="mandatory-icon">*</span></label>
			<input class="form-control" type="text" name="txtBebcode" id="txtBebcode" maxlength="4"/>
		</div>
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="chkAccept" id="chkAccept" value="1"/> I agree to the <a href="../terms-and-conditions.php">
			Terms of Service </a>
			& <a href="../legalprivacy.php">
			Privacy Policy </a>
			</label>
		</div>
		<div class="form-actions">
			<button type="button" id="register-back-btn" class="btn btn-default">Back</button>&nbsp;&nbsp;<span style="display:none;" id="cmpcmnloadreg"><img src="../assets/global/img/loading.gif" alt="" title=""/></span>
			<input type="submit" name="regSubBtn" id="regSubBtn" value="Register" class="btn btn-success uppercase pull-right"/>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
</div>
<!-- <div class="container"> -->
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
                <option value="">Select Country</option>
                @foreach ($countries as $countryCode => $countryName)
                    <option value="{{ $countryCode }}" {{ old('country') == $countryCode ? 'selected' : '' }}>
                        {{ $countryName }}
                    </option>
                @endforeach
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
