<?php
require '../backend/connect.php';
$cookieName = $_COOKIE['name'];
$cookieEmail = $_COOKIE['email'];
$result = $conn->query("SELECT * FROM `user` WHERE `name` = '$cookieName' AND `email` = '$cookieEmail'");
$user = $result->fetch_assoc();

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
    <link rel="stylesheet" href="../css/profile.css">
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
                <a href="./new-post" class="nav-link link-body-emphasis">
                    New Post
                </a>
            </li>
            <li>
                <a href="./profile" class="nav-link active">
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
        <form method="post" action="../backend/update-profile.php" class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="country" value="<?php echo $user['country']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        <button type="button" class="btn btn-warning px-4 m-2" onclick="showPasswordChange()">Change password</button>
                    </div>
                </div>
            </div>
        </form>
    </main>


    <div id="change-password" class="modal modal-sheet position-fixed bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
         style="flex-direction: column; justify-content: center;">
        <div class="modal-dialog w-50" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Change password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closePasswordChange()"></button>
                </div>
    
                <div class="modal-body p-5 pt-0">
                    <form method="post" method="post" action="../backend/change-password.php">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" name="password1" required>
                            <label>New password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" name="password2" required>
                            <label>Repeat new password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>