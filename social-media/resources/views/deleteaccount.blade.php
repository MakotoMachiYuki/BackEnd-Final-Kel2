<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | Confirm Delete Account</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <header class="header">
        <a href="#" class="logo">CODEGRAM</a>
        <nav class="navbar">
            <a href="/" target="_self">Home</a>
            <a href="/post" target="_self">Post</a>
            <a href="/about" target="_self">Profile</a>
            <a href="/settings" target="_self">Settings</a>
            <a href="/logout" target="_self">Logout</a>
        </nav>
    </header>
    <h1> Confirm Delete Account</h1>
    <p> Are you sure want to delete your account? </p>
    <form method="POST" action="/delete-account">
        @csrf
        <button type="submit">Yes, Delete My Account</button>
    </form>
    <button onclick="window.location.href = '/' ">No, Go Back</button>
</body>
</html>
