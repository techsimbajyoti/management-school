<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update on Your School Admission Application Status</title>
</head>
<body>
    
    <p>Dear {{ $parent->father_name }},</p>
    <p>We hope this message finds you well.</p>
    <p>We wanted to inform you that the status of your school admission application for {{ $applicant->first_name }} (Applicant ID: {{ $applicant->applicant_id }}) has been updated to:</p>
    <p>Status: {{ $student->status }}</p>
    <p>Thank you for your continued interest in Edu.serv.</p>
    <p>Best regards,</p>
    
    <p>The TechSimba Team</p>
</body>
</html>
