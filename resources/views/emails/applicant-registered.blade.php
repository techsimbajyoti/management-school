<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome! Please Verify Your Email and Complete Your Application</title>
</head>
<body>
    
    <p>Dear {{ $applicant->father_name }},</p>
    <p>Thank you for your request regarding the school admission application.</p>
    <p>To proceed, please verify your email address by clicking the link below:</p>
    <p><a href="{{ $verificationLink }}">Verify Email Address</a></p>
    <p>Your login details are as follows:</p>
    <p>Username : {{ $applicant->username}}</p>
    <p>Password : 123456789 </p>
    <p>Once you have logged in, please complete the applicant's profile.</p>
    <p>Our team will review the application and get back to you shortly.</p>
     
    <p>Thank you,</p>
    <p>The TechSimba Team</p>
</body>
</html>
