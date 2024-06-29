<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New School Admission Application Submitted</title>
</head>
<body>
   
    <p>Dear Admin,</p>
    <p>A new school admission application has been submitted.</p>
    <p>Parent Name: {{ $applicant->father_name }}</p>
    <p>Applicant Name: {{ $applicant->first_name }} {{ $applicant->last_name }}</p>
    <p>Email Address:{{ $applicant->email }} </p>
    <p>Applicant ID: {{ $applicant->applicant_id }}</p>
    <p>Please review the application and verify the completion of the applicant's profile.</p>
    <p>Thank you,</p>
    <p>The TechSimba Team</p>
</body>
</html>
