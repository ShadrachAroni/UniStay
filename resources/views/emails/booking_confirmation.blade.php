<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        .tick {
            text-align: center;
            margin-bottom: 20px;
        }
        .tick img {
            width: 100px;
            height: auto;
        }
        p {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tick">
            <img src="{{ asset('images/green_tick.png') }}" alt="Green Tick">
        </div>
        <h1>Booking Confirmed!</h1>
        <p>Your booking for property <strong>{{ $property->name }}</strong> has been confirmed.</p>
        <!-- Add more details or personalized messages as needed -->
    </div>
</body>
</html>
