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
    
    <div class="search">
        @if(isset($error))
            <h4>{{$error}}</h4>
        @else
            <h2>Search Result "{{$username}}"</h2>
            <ul>
                @foreach ($users as $user)
                    <li>{{$user->username}}</li>
                    <form action="{{route('accProfile', ['id' => $user->id])}}">
                        <button type='submit'> profile </button>
                    </form>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>