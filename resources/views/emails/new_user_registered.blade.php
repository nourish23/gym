<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New User Registered</title>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #777;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New User Registered</h1>
        <p>A new user has registered:</p>
        <ul>
            <li><strong>Name:</strong> {{ $user->first_name }}{{ $user->last_name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
        </ul>
    </div>
</body>
</html>
