<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Updated Application Status for {{ $applicant->first_name }} / {{ $applicant->applicant_id }}</title>
</head>
<body>
    
    <p>Dear Admin,</p>
    <p>This is to inform you that the parent of {{ $applicant->first_name }} (Applicant ID: {{ $applicant->applicant_id }}) has updated the application status.</p>
    <p>New Status: {{ $student->status }}</p>
    <p>Please review the updated status and take any necessary actions.</p>
     
    <p>Thank you,</p>
    <p>The Edu.serv Team</p>
</body>
</html>
