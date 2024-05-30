<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | Login</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">CODEGRAM</a>

        <nav class="navbar">
        <a href="/" target="_self">Home</a>
        <a href="/post" target="_self">Post</a>
        <a href="/about" target="_self">About</a>
        <a href="/login" class="login" >Login</a>
        </nav>
    </header>

    <h1>Halaman Login</h1>
    
    <form>
        <label>Input your : </label>
        <input type="text" placeholder="Input Username" required>
        <br>
        <label>Input your password:</label>
        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Input Password" required>
        <br>
        <input type="submit" value="login"> 
    </form>
</body>
</html>