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
    
     <h3>Reset Password</h3>
    <form class = "resetpasswordpage" action="{{ route('reset')}}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ request()->token }}">
        <labbel>Enter your email address:</label>
        <input type="email" placehorder="Email" name="email" required>
        <br>

        <label>Enter your new password:</label>
        <input type="password" placehorer="New Password" name="password_confirmation" required>
        <br>
        <label>Confirm your new pasword:</label>
        <input type="password" placeholder="confirm New Password" name="password_confirmation" requuired>
        <br>
        <p>Remember your password? <a href="/login">Login here!</a></p>
    </form> 
</body>
</html>