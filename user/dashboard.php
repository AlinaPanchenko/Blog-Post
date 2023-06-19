<?php
    require '../backend/connect.php';
    $cookieEmail = $_COOKIE['email'];
    $postData = $conn->query("SELECT * FROM `post`");
    $myPosts = $conn->query("SELECT `comments` FROM `post` WHERE `author` = '$cookieEmail'");

    if(empty($_COOKIE['email']) && empty($_COOKIE['name'])){
        header("Location: ../");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Post | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
        <a href="../" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">Back to main</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="./dashboard" class="nav-link active" aria-current="page">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="./new-post" class="nav-link link-body-emphasis">
                    New Post
                </a>
            </li>
            <li>
                <a href="./profile" class="nav-link link-body-emphasis">
                    Profile
                </a>
            </li>
            <hr>
            <li>
                <a href="../backend/sign-out.php" class="nav-link link-body-emphasis">
                    Log out
                </a>
            </li>
        </ul>
    </div>
    <main class="p-5 w-100">
        <h2>My posts</h2>
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Message</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($postData as $post){
                        echo '
                            <tr>
                                <td>'.$post['id'].'</td>
                                <td>'.$post['title'].'</td>
                                <td>'.$post['message'].'</td>
                                <td>'.$post['comments_num'].'</td>
                                <td>'.$post['date'].'</td>
                            </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <h2>Comments</h2>
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author</th>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($myPosts as $onlyPost){
                        $commentsArr = explode(" | ", $onlyPost['comments']);
                        foreach($commentsArr as $i){
                            $id = $commentsArr[$i];
                            $commentData = $conn->query("SELECT * FROM `comment` WHERE `id` = '$id'");
                            foreach($commentData as $row){
                                echo '
                                    <tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['message'].'</td>
                                        <td>'.$row['date'].'</td>
                                    </tr>
                                ';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>