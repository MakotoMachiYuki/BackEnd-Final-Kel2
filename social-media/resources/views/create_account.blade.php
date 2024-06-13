<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | Create_account</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">CODEGRAM</a>

    </header>
    <h1 class ="judul">Create Account</h1>
    <form class = "registerAccount" action = "{{route('registerAccount')}}" method = "post">
    @csrf
        <label  class="label">Input your : </label>
        <input type = "name" placeholder = "Name" name = "name" required>
        <br>

        <label  class="label">Input your : </label>
        <input type = "text" placeholder = "Username" name = "username" required>
        <br>

        <label  class="label">Input your : </label>
        <input type = "email" placeholder = "Email" name = "email" required>
        <br>

        <label class="label"> Date Of Birthday : </label>
        <input type = "date" placeholder = "Date Of Birth" name = "dateOfBirth" required>
     
        <br>

        <label  class="label">Input your : </label>
        <input type = "password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  placeholder="Password" name = "password" required>
        <br>
        <input class = "submit" type = "submit" name = "signin" value = "Sign In">
        <br>
        <div class="login">
        <a href = "/login" class = "login" > Already Haven an account? Click Here! </a>
        </div>
    </form>
</body>
</html>