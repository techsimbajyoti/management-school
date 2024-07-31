<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Meeting Scheduled Information</title>
</head>
<body>
   
    <p>Dear Admin,</p>
    <p>A new Meeting has been scheduled.</p>
    <p>Parent Name: {{ $applicant->father_name }}</p>
    <p>Applicant Name: {{ $applicant->first_name }} {{ $applicant->last_name }}</p>
    <p>Email Address:{{ $applicant->email }} </p>
    <p>Applicant ID: {{ $meeting->applicant_id }}</p>
    <p>Meeting date: {{ substr($meeting->meeting_date,0,16) }}</p>
    <p>Meeting Time: {{ $meeting->time_slot }}</p>
    <p>Meeting Mode: {{ $meeting->mode }}</p>
    <p>Meeting location/URL: {{ $meeting->location_url }}</p>
    <p>Please review the scheduled meeting details and ensure all necessary preparations are made.</p>
    <p>Thank you,</p>
    <p>The EduServ Team</p>
</body>
</html>
