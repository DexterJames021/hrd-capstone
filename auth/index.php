<?php require 'login.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentication</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php 
                    if(isset($err) && $err != ""){
                        echo $err;
                    }
                ?>
                <form id="form" method="POST" class="form-control">
                    <h1>Login</h1>
                    <div class="">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username">
                    </div>
                    <div class="">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password">
                    </div>
                    <div class="">
                        <input type="submit" name="login" value="Login" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>