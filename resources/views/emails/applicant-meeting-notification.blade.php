<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Scheduled Notification</title>
</head>
<body>
    <p>Dear {{ $applicant->father_name }},</p>
    
    <p>Your meeting details are as follows:</p>
    <ul>
        <li><strong>Applicant Name:</strong> {{ $applicant->first_name }}  {{ $applicant->last_name }} </li>
        <li><strong>Meeting Date:</strong> {{ $meeting->meeting_date }}</li>
        <li><strong>Meeting Time:</strong> {{ $meeting->time_slot }}</li>
        <li><strong>Meeting Mode:</strong> {{ $meeting->mode }}</li>
        <li><strong>Meeting Location/URL:</strong> {{ $meeting->location_url }}</li>
    </ul>
    
    <p>Please confirm your availability for the scheduled meeting. We look forward to meeting you.</p>
    
    <p>Thank you,</p>
    <p>The EduServ Team</p>
</body>
</html>
