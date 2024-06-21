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

    <h1 class="judul">Change Password </h1>


    <form class = "loginPage" action = "{{route('changePassword')}}" method = "post">
    @csrf
        <label class="label">Input your Password: </label>
        <input type = "password" placeholder = "New_Password" name = "password" value = "{{old('Password')}}"/>
        <br>
        <input type = "password" placeholder = "Confirm_Password" name = "password_confirm">
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->all() as $Password)
                    {{$Password}}    
                    @endforeach
            </div>
        @endif
        <br>
        <input class = "submit" type = "submit" name = "signin" value = "Update">
        <br>

    </form>
</body>
</html>