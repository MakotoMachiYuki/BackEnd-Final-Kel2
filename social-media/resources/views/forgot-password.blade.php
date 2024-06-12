<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | Login</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">CODEGRAM</a>

        <nav class="navbar">
        <a href="/" target="_self">Home</a>
        <a href="/post" target="_self">Post</a>
        <a href="/about" target="_self">Profile</a>
        <a href="/settings" target="_self">Settings</a>
        <a href="/login" class="login" >Login</a>
        </nav>
    </header>

    <h2>Forgot Password</h2>

    <form class = "forgotpasswordPage" action = "{{route('sendReset')}}" method = "post">
        @csrf
        <label>Enter your username to reset your password: </label>
        <input type="username" placeholder= "Username" name="username" required>
        <br>

        <input class="submit" type="submit" value="Send Password Reset Link">
        <br>
        <p>Remembered your password? <a href="/login">Login here!</a></p>
        </form>
    <a href="/reset-password">Reset Password </a>
</body>
</html>