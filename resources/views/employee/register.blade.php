@extends('layouts.app')
<style>
    .otp-section {
    text-align: center;
    margin-top: 20px;
}

.otp-inputs {
    display: flex;
    justify-content: center;
    gap: 5px;
    margin: 20px 0;
}

.otp-input {
    width: 40px;
    height: 40px;
    text-align: center;
    font-size: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.otp-input:focus {
    outline: none;
    border-color: #007bff;
}

#resend-timer {
    margin: 10px 0;
    color: #555;
}


</style>
@section('content')
    <div class="container clsRegComDiv content registerDiv" style="display:none">
        <h1>Employee Registration</h1>
        <form method="POST" action="{{ url('/employee/register') }}" enctype="multipart/form-data" class="login-form">
            @csrf

            <!-- First Name -->
            <div class="form-group">
                <label class="control-label" for="first_name">First Name</label>
                <input type="text" class="txtOnly form-control @error('first_name') is-invalid @enderror" id="first_name"
                    name="first_name" maxlength="30" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <label class="control-label" for="last_name">Last Name</label>
                <input type="text" class="txtOnly form-control @error('last_name') is-invalid @enderror" id="last_name"
                    name="last_name" maxlength="30" value="{{ old('last_name') }}">
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
                <select class="form-control @error('marital_status') is-invalid @enderror" id="marital_status"
                    name="marital_status" required>
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
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                    name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Education Qualification -->
            <div class="form-group">
                <label class="control-label" for="education_qualification">Education Qualification</label>
                <input type="text" class="txtOnly form-control @error('education_qualification') is-invalid @enderror"
                    id="education_qualification" name="education_qualification"
                    value="{{ old('education_qualification') }}">
                @error('education_qualification')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label class="control-label" for="phone">Phone</label>
                <input type="text" class="form-control phNumOnly @error('phone') is-invalid @enderror" id="phone"
                    name="phone" maxlength="10" value="{{ old('phone') }}" required>
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
                <select class="form-control @error('district') is-invalid @enderror" id="district" name="district"
                    required>
                    <option value="" selected>--Select District--</option>
                    <option value="Tiruvanamalai" {{ old('district') == 'Tiruvanamalai' ? 'selected' : '' }}>Tiruvanamalai
                    </option>
                    <option value="Chennai" {{ old('district') == 'Chennai' ? 'selected' : '' }}>Chennai</option>
                    <option value="Kanchipuram" {{ old('district') == 'Kanchipuram' ? 'selected' : '' }}>Kanchipuram
                    </option>
                </select>
                @error('district')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- City / Village -->
            <div class="form-group">
                <label class="control-label" for="city">City / Village / Street</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                    name="city" value="{{ old('education_qualification') }}">
                @error('city')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>






            <!-- Email -->
            <div class="form-group">
                <label class="control-label" for="email">Email<span class="mandatory-icon">*</span></label>
                <input type="email" class="emailValidation form-control @error('email') is-invalid @enderror"
                    id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="control-label" for="password">Password<span class="mandatory-icon">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label class="control-label" for="password_confirmation">Confirm Password<span
                        class="mandatory-icon">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    required>
            </div>

            <!-- Resume -->
            <div class="form-group">
                <label class="control-label" for="resume">Resume (PDF, Max 2MB)</label>
                <input type="file" class="form-control-file @error('resume') is-invalid @enderror" id="resume"
                    name="resume" accept=".pdf" required>
                @error('resume')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <!-- Terms & Conditions -->
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                <label class="control-label" class="form-check-label" for="terms">I agree to the <a
                        href="#">Terms of Service & Privacy Policy</a></label>
            </div>

            <div class="form-actions">
                <button type="button" id="register-back-btn"
                    class="btn btn-default clsComBkBtn">Back</button>&nbsp;&nbsp;<span style="display:none;"
                    id="cmpcmnloadreg"><img src="../assets/global/img/loading.gif" alt="" title=""></span>
                <input type="submit" name="regSubBtn" id="regSubBtn" value="Register"
                    class="btn btn-success uppercase pull-right">
            </div>

        </form>
    </div>

    <div class="container clsRegComDiv content loginDiv">
        <!-- BEGIN LOGIN FORM -->

        <form class="login-form" name="logCmpfrm" id="logCmpfrm" method="post" action="{{ url('/employee/login') }}"
            enctype="multipart/form-data" novalidate="novalidate">
            <h3 class="form-title">EMPLOYEE SIGN IN</h3>
            <div class="alert alert-danger" id="errCmpMsg" style="display:none;">
                <strong>Please Fill All Fields !</strong>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                    placeholder="Email ID" name="email" id="txtCmpEmail">
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" autocomplete="off"
                    placeholder="Password" type="password" name="password" id="txtCmpPwd">
            </div>
            <div class="form-actions">
                <input type="submit" name="btnCmpLogn" value="Login" id="btnCmpLogn"
                    class="btn btn-success uppercase">&nbsp;&nbsp;<span style="display:none;" id="cmpcmnloadcntct"><img
                        src="../assets/global/img/loading.gif" alt="" title=""></span>
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
            <div class="create-account clsCreateAcc">
                <p>
                    <a href="javascript:void(0);" id="register-btn" class="uppercase"
                        style="text-decoration: none;">Create an account</a>
                </p>
            </div>
            @csrf
        </form>
        <!-- END LOGIN FORM -->
    </div>

    <div class="container clsRegComDiv content frgtPwdDiv" style="display:none">
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" name="fgtForm" id="fgtForm" autocomplete="off" novalidate="novalidate">
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
                <input class="form-control fgtEmailVal" type="text" name="txtEmailfgt" id="txtEmailfgt1">
            </div>

            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default clsComBkBtn">Back</button>&nbsp;&nbsp;<span
                    style="display:none;" id="cmpcmnloadfgt"><img src="../assets/global/img/loading.gif" alt=""
                        title=""></span>
                <input type="submit" name="btnFgtFrm" id="btnFgtFrm" value="Submit"
                    class="btn btn-success uppercase pull-right btnFgtFrm">
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>

    <div class="container clsRegComDiv content frgtOtpDiv" style="display:none">
        <div class="otp-section">
            <h3>Enter OTP</h3>
            <p>We have sent a 6-digit OTP to your registered email address.</p>
            <div class="form-group">
                <label class="control-label">Email ID</label>
                <input class="form-control clsParFrgtEm" disabled type="text" name="txtEmailfgt" id="txtEmailfgt2">
            </div>
            <div class="otp-inputs">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
                <input type="text" maxlength="1" class="otp-input">
            </div>

            <p id="resend-timer">Resend OTP in <span id="timer">30</span> seconds</p>
            <div>
                <button id="resend-btn" class="btn btn-primary clsResendOtpBtn" style="display:none">Resend OTP</button>
                <button id="verify-btn" class="btn btn-success clsOtpVerifyBtn">Verify</button>
            </div>
        </div>
    </div>


    <div class="container clsRegComDiv content resetPwdDiv" style="display:none">
        <div class="container otp-section">
            <h3>Change Password</h3>
            <div class="form-group">
                <label class="control-label">Email ID</label>
                <input class="form-control resetPwdEmailBx" disabled type="text" name="txtEmailfgt" id="txtEmailfgt3">
            </div>
            <input class="hiddenOtp" type="hidden" >

            <div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">New Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Password" type="password" name="password" id="txtCmpPwd">
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                    <input class="form-control form-control-solid clsConfirmPwd placeholder-no-fix" autocomplete="off" placeholder="Confirm Password" type="password" name="password" id="txtCmpPwd">
                </div>
            </div>
            <div class="clsPwdResetBtn">
                <button class="btn btn-success">Change Password</button>
            </div>

        </div>
    </div>

    @include('employee.script')
@endsection
