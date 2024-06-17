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

    <h1 class="judul">Login</h1>
    
    <form class = "loginPage" action = "{{route('loginAccount')}}" method = "post">
    @csrf
        <label>Input your Username: </label>
        <input type="text" placeholder="Username" name = "username" required value = "{{old('username')}}">
        <br>

        <label>Pasword:</label>
        <input type="password" placeholder="Input Password" name = "password" required>
        <br>

        @if ($errors->any())
            <div class ="wrongLogin">
                    @foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach
            </div>
        <br>
        @endif

        <input class = "submit" type="submit" name = "login" value = "Log In">
        <br>
        <p> Didn't have an account? <a href = "/create_account" > Register Now!</a></p>
        <p> Forgot your password? <a href="/forgot-password">Log In Here!</a></p> 


   

 
</body>
</html>