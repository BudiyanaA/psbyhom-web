<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activation Email</title>
</head>
<body>
    <p>Dear {{$customer_name}},</p>
    <p>Thank you for your registration. Below is the link to activate your account:</p>
    <p><a href="{{ route('activication') }}?token={{$token_id}}">Activate Your Account</a></p>
    <p>Best regards,</p>
    <p>House of Makeup</p>
    <p>Line@ : <a href="https://line.me/R/ti/p/%40houseofmakeup">@houseofmakeup</a></p>
    <p>Email : <a href="https://line.me/R/ti/p/%40houseofmakeup">info@psbyhom.com</a></p>
</body>
</html>