<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['subject'] }}</title>
</head>
<body>
    <h1>Hello, {{ $details['name'] }}!</h1>
    <p>Member ID: {{ $details['member_id'] }}</p>
    <p>{{ $details['message'] }}</p>
    <p>Your password: {{ $details['password'] }}</p>
    <p>Your email: {{ $details['email'] }}</p>
    <p>Thank you for being a valued member.</p>
</body>
</html>
