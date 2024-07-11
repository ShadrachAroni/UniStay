<!DOCTYPE html>
<html>
<head>
    <title>New Booking Notification</title>
</head>
<body>
    <h1>New Booking Notification</h1>
    <p>Dear {{ $agent->name }},</p>
    <p>A new booking has been made for your property: {{ $property->title }}.</p>
    <p>Please review and confirm the booking.</p>
    <p>Thank you,<br>Real Estate Team</p>
</body>
</html>
