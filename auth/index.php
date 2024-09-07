<?php 
session_start();
require "../config/autoload.php";

$err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
        if($err == ""){

            $query = "SELECT * FROM user_login WHERE username = :username && password = :password LIMIT 1";
            $stmt = $conn->prepare($query);
            $check = $stmt->execute(['username'=> $username,'password'=>$password]);

            if ($check) {
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                if($user){
                    $_SESSION['user_id'] = $user->id;
                    $_SESSION['username'] = $user->username;
                    $_SESSION['log_timein'] = "";

                    header("Location:../admin/index.php");
                    die;
                }else{
                    echo "<script>confirm('Something Wrong in email or password')</script>";
                    // header("Location: index.php");

                }
                
            }
        }

    }

    // $err = "<script>alert('Something Wrong in email or password')</script>";
?>
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="shortcut icon" href="../assets/images/bcp-hrd-logo.jpg" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <?php 
            if(isset($err) && $err != ""){
                echo $err;
            }
        ?>
        <div class="card ">
            <div class="card-header text-center">
                <a href="../index.php">
                    <img class="logo-img" src="../assets/images/bcp-hrd-logo.jpg" alt="logo" style="height:10rem;width:auto;">
                </a>
                <!-- <span class="splash-description">For authenticated staffs only.</span> -->
            </div>
            <div class="card-body">
                <form action="index.php" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Sign in">
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <!-- <a href="#" class="footer-link">Forgot Password</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- <script>
    $(document).ready(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault();

            var user = $('#username').val();
            var pass = $('#password').val();


            if (user !== '' && pass !== '') {
                $.ajax({
                    type: "POST",
                    url: "./login.php",
                    data: {
                        "username": user,
                        "password": pass
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = '../admin/index.php'; 
                        } else {
                            alert(response.message); // Show error message from the server
                        }
                    },
                    error: function() {
                        alert('Something went wrong.');
                    }
                });
            } else {
                alert("Please fill in forms.");

            }
        });
    });
    </script> -->

</body>
 
</html>