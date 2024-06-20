<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        <header class="header">
        <a href="#" class="logo">CODEGRAM</a>

        <nav class="navbar">
        <a href="/" target="_self">Home</a>
        <a href="/post" target="_self">Post</a>
        <a href="/about" target="_self">Profile</a>
        <a href="/settings" target="_self">Settings</a>
        <a href="/logout" class = "logout"> Logout</a> 
        </nav>
    </header>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome {{Auth::user() -> username}} ! </h1>
                    <p class="lead mb-0">Have some fun in codegram!</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">  
                    <?php
                    // Connection parameters
                    $connection = env('DB_CONNECTION');
                    $host = env('DB_HOST');
                    $dbname = env('DB_DATABASE');
                    $user = env('DB_USERNAME');
                    $password = env('DB_PASSWORD');
                    
                    // Pagination parameters
                    $postsPerPage = 5; // Number of posts per page
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $postsPerPage;

                    try {
                        // Establish connection
                        $pdo = new PDO("$connection:host=$host;dbname=$dbname", $user, $password);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                        // Get total number of posts
                        $totalPosts = $pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn();
                        $totalPages = ceil($totalPosts / $postsPerPage);

                        // Perform query with limit and offset
                        $statement = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT :limit OFFSET :offset");
                        $statement->bindParam(':limit', $postsPerPage, PDO::PARAM_INT);
                        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
                        
                        // Fetch data
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            $text = nl2br(htmlspecialchars($row['text']));
                            $imagePath = htmlspecialchars($row['image']);

                            echo '
                                <div class = "post">
                                    <img src="storage/$imagePath" alt="Post Image" width="500" height="300">
                                    <h2>'.$row['title'].'</h2>
                                    <p>'.$row['text'].'</p>';
                                
                                    if(Auth::check()){
                                        echo'
                                        <form action='. route('likePost', ['id' => $row['id']]).' method="POST"> 
                                                '. csrf_field().' 
                                                <button type = "submit" class = "btn btn-primary likeButton">LIKE <span class="counter">{$row["likes_count"]}</span></button><br><br>
                                        </form>';   
                                        
                                        if (Auth::user()->checkSaved($row['id'])) {
                                            echo '
                                            <form action='.route('removeSavedPost').' method="POST">
                                                '.csrf_field().'
                                                <input type = "hidden" name = "post_id" value='.$row['id'].'>
                                                <button type = "submit">Unsave</button>
                                            </form>';
                                        } else {
                                            echo '
                                            <form action='. route('addSavedPost').' method="POST">
                                                '.csrf_field().'
                                                <input type = "hidden" name = "post_id" value='.$row['id'].'>
                                                <button type = "submit">Save</button>
                                            </form>';
                                        }
                                        echo '
                                        </div>';    
                                    }
                                }
                    } catch (PDOException $e) {
                        echo "An error occurred while connecting to the database: " . $e->getMessage();
                    }
                

                    
                    // Pagination controls
                    echo '<div class="pagination">';
                    if ($page > 1) {
                        echo '<a href="?page=' . ($page - 1) . '"><< Previous</a>';
                    }
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                    if ($page < $totalPages) {
                        echo '<a href="?page=' . ($page + 1) . '">Next>></a>';
                    }
                    echo '</div>';
                    ?>
     </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
