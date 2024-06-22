<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
    <h1>{{Auth::user()->username}} saved post</h1>
    <p><strong>Username : </strong> {{Auth::user() -> username}}</p>
    <p><strong>Email : </strong>{{Auth::user() -> email}}</p>

    @foreach ($userSavedPost as $savedPost)
        <div class="post">
            <img src="storage/{{$savedPost->post->image}}" alt="Creator post" width="500" height="300">

            <h2>{{$savedPost->title}}</h2>
            <p>{{$savedPost->text}}</p>
        </div>
    @endforeach

</body>
</html>

