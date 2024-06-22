<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>CODEGRAM | Settings</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">CODEGRAM</a>

        <nav class="navbar">
        <a href="/" target="_self">Home</a>
        <a href="/post" target="_self">Post</a>
        <a href="/profile" target="_self">Profile</a>
        <a href="/settings" target="_self">Settings</a>
        </nav>
    </header>
    <h1 class ="judul">Verify Account</h1>
        <form class = "loginPage" action = "{{route('verifyAccount')}}" method = "post">
            @csrf
            <label>Input your password:</label>
            <input type="password" placeholder="Input Password" name = "password" required>
            <br>

            @if ($errors->any())
                <div class ="wrongPassword">
                        @foreach($errors->all() as $error)
                        {{$error}}
                        @endforeach
                </div>
            <br>
            @endif

            <input class = "submit" type="submit" name = "login" value = "Verify">
            <br>
        </form>
</body>
</html>