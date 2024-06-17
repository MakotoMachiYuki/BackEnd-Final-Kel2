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
    </header>

    <h1 class="judul">Forgot Password</h1>

    <form class = "forgotpasswordPage" action = "{{route('verifyUsername')}}" method = "post">
        @csrf
        <label>Enter your username to reset your password: </label>
        <input type="username" placeholder= "Username" name="username" required>
        <br>
        
        <input class="submit" type="submit" value="Verify Username">
        <br>
        <p>Remembered your password? <a href="/login">Login here!</a></p>
        </form>  

</body>
</html>