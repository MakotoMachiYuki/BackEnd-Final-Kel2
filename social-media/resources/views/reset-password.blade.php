<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | Reset password</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">CODEGRAM</a>
    </header>
    
    <h1 class="judul">Reset Password</h1>
    <form class = "resetpasswordPage" action="{{ route('reset')}}" method="post">
    @csrf
    <input type = "hidden" name="username" value="{{$username}}">
    <label for = "password">New Password:</label>
    <input type = "password" placeholder =  "New password" id="password" name="password" required>
    <label for = "password_confirmation">Confirm Your New Password:</label>
    <input type = "password" placeholder="Confirm New Password" name="password_confirmation" required>
    <button type="submit">Reset Password</button>
    <p>Remember your password? <a href="/login">Login here!</a></p>
    </form> 
</body>
</html>