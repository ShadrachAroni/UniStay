<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear {{ Auth::user()->Fname }},</p>
    <p>Thank you for booking the property: {{ $property->title }}.</p>
    <p>Your booking is currently pending. We will notify you once it is confirmed.</p>
    <p>Thank you,<br>Real Estate Team</p>
</body>
</html>
