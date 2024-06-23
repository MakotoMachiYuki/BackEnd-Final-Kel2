<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>CODEGRAM | Profile</title>
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

    </main>
     <h1>Profile</h1>
     <section class="about">
        @isset($user)
            <p><strong>Username : </strong> {{$user -> username}}</p>
            <p><strong>Email : </strong>{{$user -> email}}</p>
            <p> Hallo, i'm {{$user -> username}}</p>
        @else
            <p><strong>Username : </strong> {{Auth::user() -> username}}</p>
            <p><strong>Email : </strong>{{Auth::user() -> email}}</p>
            <p> Hallo, i'm {{Auth::user() -> username}}</p>
        @endisset
     </section>   

     <h1>Your Posts</h1>
     <section class="post">



</body>
</body>
</html>