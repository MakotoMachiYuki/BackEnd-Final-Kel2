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
    </header>

    <h1 class="judul">Delete Account</h1>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status')}}
        </div>
    @endif

    <form action = "{{route('deleteAccount')}}" method="post" >
        @csrf
        @method ('Delete')
        <button type="submit" class = "btn btn-danger"> Delete Account </button>
    </form>

</body>
</html>
