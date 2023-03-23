<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activation Email</title>
</head>
<body>
    <p>Dear, {{ $customer_name }}</p>
    <p>Thank you for your registration. Below is the link to activate your Account</p>
    <p><a href="{{ url('register/activation?token_id=' . $token_id)}}">Activate Your Account</a></p>
    <p>Best regards,</p>
    <p>House of Makeup</p>
    <p>Instagram : <a href="https://www.instagram.com/houseofmakeup/">@houseofmakeup</a></p>
    <p>Email : <a href="mailto:{{ $email_notif }}">{{ $email_notif }}</a></p>
</body>
</html>