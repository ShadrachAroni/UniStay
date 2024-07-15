<!DOCTYPE html>
<html>
<head>
    <title>Booking Cancellation Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        h1 {
            color: #FF5722;
            text-align: center;
            font-size: 24px;
            margin-top: 0;
        }
        .cross {
            text-align: center;
            margin-bottom: 20px;
        }
        .cross img {
            width: 80px;
            height: auto;
        }
        p {
            line-height: 1.6;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #FF5722;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .button a {
            color: #fff;
        }
        .button:hover {
            background-color: #e64a19;
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 20px;
            }
            .cross img {
                width: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cross">
            <img src="https://img.icons8.com/ios-filled/100/ff5722/cancel.png" alt="Cancellation Cross" />
        </div>
        <h1>Booking Cancelled</h1>
        <p>We regret to inform you that the booking for <strong>{{ $property->title }}</strong> by <strong>{{ $booking->student->Fname }}</strong> has been cancelled by the tenant.</p>
        <p>If you have any questions or need further assistance, please contact us.</p>
        <div class="cross">
            <a href="{{ route('pages.show', ['id' => $property->id]) }}" class="button">View Booking Details</a>
        </div>
    </div>
</body>
</html>
