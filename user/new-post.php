<?php
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
                <a href="./dashboard" class="nav-link link-body-emphasis" aria-current="page">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="./new-post" class="nav-link active">
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
        <form style="width: 100%;" method="post" action="../backend/new-post.php">
            <h1 class="h3 mb-3 fw-normal text-center">Create new post</h1>

            <div class="form-floating mt-3">
                <input type="text" class="form-control" name="title" required>
                <label>Title</label>
            </div>
            <div class="form-floating mt-3">
                <input type="text" class="form-control" name="message" required>
                <label>Message</label>
            </div>
            <button class="btn btn-primary py-2 mt-3 w-100" type="submit">Submit</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>