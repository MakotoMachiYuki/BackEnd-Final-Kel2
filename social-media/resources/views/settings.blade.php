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
    <h1>Halaman Settings</h1>

    <div class="container">
    <form action="{{ route('bio.update') }}" method="POST">
        @csrf
        <input type ="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="form-group">
            <label for="bio">Bio</label>

            @if(!$errors->any())
            <textarea name="bio" id="bio" class="form-control">{{ Auth::user()->bio }}</textarea>

            @elseif ($errors->any())
            <textarea name="bio" id="bio" class="form-control">{{old('bio')}}</textarea>
            <div class ="wrongValidation">
                    @foreach($errors->get('bio') as $bio)
                    {{$bio}}    
                    @endforeach
            </div>
            @endif

        </div>
        <div class="form-group">
            <label for="pronouns">Pronouns</label>
            @if(!$errors->any())
            <input type="text" name="pronoun" id="pronoun" class="form-control" value="{{ Auth::user()->pronoun }}">

            @elseif ($errors->any())
            <div class ="wrongValidation">
                <input type="text" name="pronoun" id="pronoun" class="form-control" value="{{ old('pronoun')}}">
                    @foreach($errors->get('pronoun') as $pronoun)
                    {{$pronoun}}    
                    @endforeach
            </div>
            @endif
        <br>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    
    <br>
        <button onclick="window.location.href= '/settings/change_account_information' "> Change Account Information</button>
    <br>
        <button onclick="window.location.href = '/settings/delete-account' ">Delete Account</button>
    <br>
        <button onclick="window.location.href = '/logout' "> Logout </button>
        
    </div>

</body>
</html>