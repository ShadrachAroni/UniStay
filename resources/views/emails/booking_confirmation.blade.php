<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
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
            color: #4CAF50;
            text-align: center;
            font-size: 24px;
            margin-top: 0;
        }
        .tick {
            text-align: center;
            margin-bottom: 20px;
        }
        .tick img {
            width: 80px;
            height: auto;
        }
        p {
            line-height: 1.6;
            color: #333;
        }
       .tick a{
            color: #fff;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }
        .button a{
            color: #fff;
        }
        .button:hover {
            background-color: #45a049;
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 20px;
            }
            .tick img {
                width: 60px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tick">
            <img src="https://img.icons8.com/ios-filled/100/4caf50/checkmark.png" alt="Confirmation Tick" />
        </div>
        <h1>Booking Confirmed!</h1>
        <p>Your booking for <strong>{{ $property->title }}</strong> has been confirmed.</p>
        <p>Thank you for choosing our service. We hope you have a pleasant stay!</p>
        <div class="tick">
            <a href="{{ route('pages.show', ['id' => $property->id]) }}" class="button">View Booking Details</a>
        </div>
    </div>
</body>
</html>
