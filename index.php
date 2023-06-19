<?php
    require './backend/connect.php';
    $postData = $conn->query("SELECT * FROM `post`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Post | Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <h1 class="fs-4 mt-1" style="margin-right: 30px;">Blog-Post</h1>
    
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Main</a></li>
                    <?php if(!empty($_COOKIE['email']) && !empty($_COOKIE['name'])): ?>
                    <li><a href="./user/dashboard" class="nav-link px-2 link-body-emphasis">Dashboard</a></li>
                    <li><a href="./user/new-post" class="nav-link px-2 link-body-emphasis">New post</a></li>
                    <li><a href="./user/profile" class="nav-link px-2 link-body-emphasis">Profile</a></li>
                    <?php endif; ?>
                </ul>

                <?php if(!empty($_COOKIE['email']) && !empty($_COOKIE['name'])): ?>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./images/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="./user/dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="./user/new-post">New post</a></li>
                        <li><a class="dropdown-item" href="./user/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./backend/sign-out.php">Sign out</a></li>
                    </ul>
                </div>
                <?php else: ?>
                <div class="col-md-3 text-end">
                    <a href="./auth/sign-in" class="btn btn-outline-primary me-2">Login</a>
                    <a href="./auth/sign-up" class="btn btn-primary">Sign-up</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>



    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php 
                foreach($postData as $post){
                    echo '
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text fs-5" style="font-weight: 500;">'.$post['title'].'</p>
                                    <p class="card-text">'.$post['message'].'</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="./comment.php?post='.$post['id'].'" class="btn btn-sm btn-outline-secondary">Add comment</a>
                                        </div>
                                        <small class="text-body-secondary">'.$post['date'].'</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
                ?>
                
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Main</a></li>
                <?php if(!empty($_COOKIE['email']) && !empty($_COOKIE['name'])): ?>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Dashboard</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">New post</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Profile</a></li>
                <?php endif; ?>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>