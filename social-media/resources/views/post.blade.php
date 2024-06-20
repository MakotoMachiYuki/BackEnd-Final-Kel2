<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>CODEGRAM | Post</title>
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

       <h1 class="judul">Create Post</h1>
       <form class="createPost" action="{{route('createPost')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image:</label>
            <input class="form-control" type="file" id="post-images" name="post-images">

          </div>
        <div class="mb-3">
            <label>Input your Title : </label><br>
            <textarea id="title" name="title" placeholder="Enter the title" rows="2" required></textarea>
            <br>
        <div class="mb-3">
            <label>Input your Caption : </label><br>
            <textarea id="text" name="text" placeholder="Enter the text" rows="5" required></textarea>
            <br>
        </div>
        <button type="submit" class="submit" name="post" value="Create Post">Submit</button>
      </form>

</body>
</html>


