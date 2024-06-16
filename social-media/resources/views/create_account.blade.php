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

        <label class="label">Input your Email: </label>
        <input type = "email" placeholder = "Email" name = "email" value = "{{old('email')}}"/>
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('email') as $email)
                    {{$email}}    
                    @endforeach
            </div>
        <br>
        @endif

        <label class="label">Username: </label>
        <input type = "text" placeholder = "Username" name = "username" value = "{{old('username')}}">
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('username') as $username)
                    {{$username}}    
                    @endforeach
            </div>
        <br>
        @endif

        <label class="label">First Name: </label>
        <input type = "name" placeholder = "First Name" name = "firstName" value = "{{old('firstName')}}">
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('firstName') as $firstName)
                    {{$firstName}}    
                    @endforeach
            </div>
        <br>
        @endif

        <label class="label">Last Name: </label>
        <input type = "name" placeholder = "Last Name (not required)" name = "lastName" value = "{{old('lastName')}}">
        <br>

        <label class="label"> Date Of Birthday: </label>
        <input type = "date" placeholder = "Date Of Birth" name = "dateOfBirth" value = "{{old('dateOfBirth')}}">
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('dateOfBirth') as $dateOfBirth)
                    {{$dateOfBirth}}    
                    @endforeach
            </div>
        <br>
        @endif

        <label class="label">Password: </label>
        <input type = "password" placeholder="Password" name = "password" value = "{{old('password')}}">
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('password') as $password)
                    {{$password}}    
                    @endforeach
            </div>
        <br>
        @endif

        <label class="label">Confirm Password: </label>
        <input type = "password" placeholder="Password" name = "password_confirm">
        <br>
        @if ($errors->any())
            <div class ="wrongValidation">
                    @foreach($errors->get('password_confirm') as $password_confirm)
                    {{$password_confirm}}    
                    @endforeach
            </div>
        <br>
        @endif


        <input class = "submit" type = "submit" name = "signin" value = "Sign In">
        <br>

        <div class="login">
        <a href = "/login" class = "login" > Already Haven an account? Click Here! </a>
        </div>
    </form>
</body>
</html>