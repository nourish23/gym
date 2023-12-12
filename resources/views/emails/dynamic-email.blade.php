<!DOCTYPE html>
<html>
<head>
    <title>{{ $emailTemplate->subject }}</title>
</head>
<body>
    <h1>{{ $emailTemplate->subject }}</h1>
    <p>{{ $emailTemplate->content }}</p>
    <p>Nourish Fitness Team</p>
    <img src="{{ asset('assets/img/logo.png')}}" width="125" alt="">
</body>
</html>
