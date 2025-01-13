    <!DOCTYPE html>
    <html>
    <head>
        <title>Your Verification Code</title>
    </head>
    <body>
    <h1>Your Verification Code</h1>
    <p>Please verify your identity to proceed with the login.</p>
    <p>An email containing the verification code has been sent to your email . Please enter the code in the field below to proceed.</p>

    <p><strong>Verification Code: </strong>{{ $verificationCode }}</p>
    <a href="{{ route('profile.verification')}}"> Verify</a>
    </body>
    </html>
