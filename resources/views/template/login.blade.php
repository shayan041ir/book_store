<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        h1 {
            color: #e65c00;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #e65c00;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #d35400;
        }

        .error {
            color: #ff4d4d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        ul {
            padding-left: 20px;
            color: #ff4d4d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <input type="submit" value="Login">
        </form>
        <a href="/" class="home-button">← Back to Home</a>
    </div>
</body>

</html>
