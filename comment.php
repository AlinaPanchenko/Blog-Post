<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog-Post | Leave a comment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php
        $postId = $_GET['post'];
    ?>
    <div id="leave-comment" class="modal modal-sheet d-flex position-fixed bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
         style="flex-direction: column; justify-content: center;">
        <div class="modal-dialog w-50" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Leave a comment</h1>
                    <a class="btn-close" data-bs-dismiss="modal" aria-label="Close" href="./"></a>
                </div>
    
                <div class="modal-body p-5 pt-0">
                    <form method="post" method="post" action="./backend/leave-comment.php?post=<?php echo $postId ?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="name" required>
                            <label>Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" name="email" required>
                            <label>Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" name="message" required>
                            <label>Message</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>