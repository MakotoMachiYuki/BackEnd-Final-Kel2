<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>CODEGRAM | Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <main>
     <h1>Profile</h1>
     <section class="about">
        @isset($user)
            <p><strong>Username : </strong> {{$user -> username}}</p>
            <p><strong>Email : </strong>{{$user -> email}}</p>
            
            <p> Hallo, i'm {{$user -> username}}</p>
            @if(Auth::id() !== $user->id)
            <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST" onsubmit="this.querySelector('button').disabled = true;">
                @csrf
                <button type="submit" class="follow-btn">
                    {{ Auth::user()->following->contains($user->id) ? 'Unfollow' : 'Follow' }}
                </button>
            </form>
            
        @endif
        @else
            <p><strong>Username : </strong> {{Auth::user() -> username}}</p>
            <p><strong>Email : </strong>{{Auth::user() -> email}}</p>
            <p> Hallo, i'm {{Auth::user() -> username}}</p>
        @endisset
     </section>   

     <h1>Your Posts</h1>
     <div class="post">
     @foreach($userYourPost as $yourPost)
             <div class="post">
                <img src="/storage/{{$yourPost->image}}" alt="Creator post" width="500" height="300">
                <h2>{{ $yourPost->title }}</h2>
                <p>{{ $yourPost->text }}</p>
             </div>
     @endforeach
     </div>
    </main>
</body>
</html>