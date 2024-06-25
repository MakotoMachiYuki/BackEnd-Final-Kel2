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

        <button onclick="window.location.href= '/settings/change_account_information' "> Change Account Information</button>
    <br>
        <button onclick="window.location.href = '/settings/delete-account' ">Delete Account</button>
    <br>
        <button onclick="window.location.href = '/logout' "> Logout </button>

    <div class="container">
    <form action="{{ route('settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control">{{ auth()->user()->bio }}</textarea>
        </div>
        <div class="form-group">
            <label for="pronouns">Pronouns</label>
            <input type="text" name="pronouns" id="pronouns" class="form-control" value="{{ auth()->user()->pronouns }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </div>

</body>
</html>