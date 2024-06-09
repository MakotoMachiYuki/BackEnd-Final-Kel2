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
        <a href="/about" target="_self">Profile</a>
        <a href="/settings" target="_self">Settings</a>
        <a href="/login" class="login" >Login</a>
        </nav>
    
    </header>
<div class="col-lg-8">
    <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
         
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Text</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</body>
</html>


<!-- 
    <form>
        <label>Post choice</label>
        <select required>
            <option disabled="disabled" selected>select choice</option>
            <option>text</option>
            <option>video</option>
            <option>image</option>
        </select>
    </form> -->