<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
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
    </header>

    <h1 class="judul">Change Email</h1>

    
    <form class = "loginPage" action = "{{route('changeEmail')}}" method = "post">
    @csrf
        <label class="label">Input your Email: </label>
        <input type = "email" placeholder = "Email" name = "email" value = "{{old('email')}}"/>
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('email') as $email)
                    {{$email}}    
                    @endforeach
            </div>
        <br>
        @endif
        <input class = "submit" type = "submit" name = "signin" value = "Update">
        <br>
    </form>
</body>
</html>