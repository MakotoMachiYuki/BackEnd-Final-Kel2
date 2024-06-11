<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | About</title>
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
    <h1>Profile</h1>
    <body>
    <p><strong>Username : </strong> {{Auth::user() -> username}}</p>
    <p><strong>Email : </strong>{{Auth::user() -> email}}</p>
    <h1>Your Post</h1>

</body>
</body>
</html>