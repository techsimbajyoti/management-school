<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Registration Confirmation</title>
</head>
<body>
    <h2>Application Registration Confirmation</h2>
    <p>Dear {{ $applicant->father_name }},</p>
    <p>Your  ward registration application ID is : {{ $applicant_id }}.</p>
    <p>Given below are your login credentials</p>
    <p>Username : {{ $applicant->username}}</p>
    <p>Password : 123456789 </p>
    <p>Please click on the following link to verify your registration:</p>
    <p><a href="{{ $verificationLink }}">Verify Registration</a></p>
    <p>Thank you for your registration.</p>
</body>
</html>
