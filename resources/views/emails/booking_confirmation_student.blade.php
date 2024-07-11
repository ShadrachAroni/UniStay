<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        /* Email body styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        /* Container styles */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        /* Header styles */
        .header {
            background-color: #4caf50;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }
        /* Content styles */
        .content {
            padding: 20px;
        }
        /* Footer styles */
        .footer {
            text-align: center;
            padding-top: 10px;
            color: #777777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Booking Confirmation</h1>
        </div>
        <div class="content">
            <p>Dear {{ Auth::user()->Fname }},</p>
            <p>Thank you for booking the property: {{ $property->title }}.</p>
            <p>Your booking is currently pending. We will notify you once it is confirmed.</p>
            <p>Thank you,<br>Accommodation Team</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }}UniStay Accommodation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
