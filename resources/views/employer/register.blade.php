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
    <!-- <form class="register-form" method="POST" action="{{ url('/employer/register') }}" enctype="multipart/form-data" autocomplete="off"> -->
    <form class="register-form" method="POST" action="{{ url('/employer/register') }}" enctype="multipart/form-data">
        @csrf
        <h3>EMPLOYERS SIGN UP</h3>

    <!-- Employer Name -->
    <div class="form-group">
        <label class="control-label" for="company_name">Employer Name<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
        @error('company_name')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Country -->
    <div class="form-group">
        <label class="control-label" for="country">Country<span class="mandatory-icon">*</span></label>
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
        <label class="control-label" for="place">Place<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{ old('place') }}" required>
        @error('place')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Address -->
    <div class="form-group">
        <label class="control-label" for="address">Address<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
        @error('address')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- PO Box No -->
    <div class="form-group">
        <label class="control-label" for="po_box_no">PO Box No.<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('po_box_no') is-invalid @enderror" id="po_box_no" name="po_box_no" value="{{ old('po_box_no') }}" required>
        @error('po_box_no')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Contact Person 1 -->
    <div class="form-group">
        <label class="control-label" for="contact_person_1">Contact Person 1<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('contact_person_1') is-invalid @enderror" id="contact_person_1" name="contact_person_1" value="{{ old('contact_person_1') }}" required>
        @error('contact_person_1')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Contact Number 1 -->
    <div class="form-group">
        <label class="control-label" for="contact_number_1">Contact Number 1<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('contact_number_1') is-invalid @enderror" id="contact_number_1" name="contact_number_1" value="{{ old('contact_number_1') }}" required>
        @error('contact_number_1')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Contact Person 2 -->
    <div class="form-group">
        <label class="control-label" for="contact_person_2">Contact Person 2</label>
        <input class="form-control" type="text" class="form-control @error('contact_person_2') is-invalid @enderror" id="contact_person_2" name="contact_person_2" value="{{ old('contact_person_2') }}">
        @error('contact_person_2')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Contact Number 2 -->
    <div class="form-group">
        <label class="control-label" for="contact_number_2">Contact Number 2</label>
        <input class="form-control" type="text" class="form-control @error('contact_number_2') is-invalid @enderror" id="contact_number_2" name="contact_number_2" value="{{ old('contact_number_2') }}">
        @error('contact_number_2')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group">
        <label class="control-label" for="email">Email<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group">
        <label class="control-label" for="password">Password<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
        <label class="control-label" for="password_confirmation">Confirm Password<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <!-- Verification Code -->
    <div class="form-group">
        <label class="control-label" for="verification_code">Verification Code<span class="mandatory-icon">*</span></label>
        <input class="form-control" type="text" class="form-control @error('verification_code') is-invalid @enderror" id="verification_code" name="verification_code" value="{{ old('verification_code') }}" required>
        @error('verification_code')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
    </div>

    <!-- Terms & Conditions -->
    <div class="form-group margin-top-20 margin-bottom-20">
			<label class="check">
			<input type="checkbox" name="chkAccept" id="chkAccept" value="1"/> I agree to the <a href="../terms-and-conditions.php">
			Terms of Service </a>
			& <a href="../legalprivacy.php">
			Privacy Policy </a>
			</label>
		</div>

    <!-- Submit Button -->
    <div class="form-actions">
        <button type="button" id="register-back-btn" class="btn btn-default">Back</button>&nbsp;&nbsp;<span style="display:none;" id="cmpcmnloadreg"><img src="../assets/global/img/loading.gif" alt="" title=""/></span>
        <input type="submit" name="regSubBtn" id="regSubBtn" value="Register" class="btn btn-success uppercase pull-right"/>
    </div>
</form>
	<!-- END REGISTRATION FORM -->
</div>

</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.navbar-light').hide();
        $('#register-btn').on('click', function(){
            $('.register-form').show();
            $('.login-form').hide();
        });
        $('#register-back-btn').on('click', function(){
            $('.login-form').show();
            $('.register-form').hide();
        });
        $('#forget-password').on('click', function(){
            $('.forget-form').show();
            $('.login-form').hide();
        });
        $('#back-btn').on('click', function(){
            $('.forget-form').hide();
            $('.login-form').show();
        });
    });
</script>
@endpush
