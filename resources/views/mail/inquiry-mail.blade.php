<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for contacting us!</title>
    <style>
        body {
            background-color: #f3f4f6;
            color: #1f2937;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: linear-gradient(135deg, #77b69a, #06401c);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 24px;
        }
        h1 {
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .message {
            color: #ffffff;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .bold-text {
            font-weight: bold;
            color: #ffffff;
            text-decoration: underline;
        }
        footer {
            margin-top: 24px;
            text-align: center;
            font-size: 0.875rem;
            color:#ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Contacting Us!</h1>

        <p class="message">
            Dear Customer <span class="bold-text">{{ $contact->name }}</span>,
        </p>
        <p class="message">
            Thank you for contacting us about <span class="bold-text">{{ $contact->subject }}</span>.
            We appreciate your inquiry and are here to assist you with any questions or concerns you may have.
        </p>
        <footer>
            <p>We will get back to you shortly!</p>
            <p>The NowGo Team</p>
        </footer>
    </div>
</body>
</html>
