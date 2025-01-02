<!DOCTYPE html>
<html>
<head>
    <title>Employer Verification</title>
</head>
<body>
    <h1>Welcome to Our Job Portal</h1>
    <p>Dear {{ $employer->company_name }},</p>
    <p>Thank you for registering as an employer. Please verify your email by clicking the link below:</p>
    <p><a href="{{ url('/verify-email/' . $verificationCode) }}">Click here to verify your email</a></p>
    <p>If you did not register, please ignore this email.</p>
</body>
</html>
