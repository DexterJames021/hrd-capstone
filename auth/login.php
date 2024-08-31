<?php 

require "../config/Database.php";

$err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!$err){
        $query = "SELECT * FROM users WHERE username = :username && password = :password LIMIT 1";
        $stmt = $conn->prepare($query);
        $check = $stmt->execute(['username'=> $username,'password'=> $password]);

        if($check){
            $data = $stmt->fetchAll(PDO::FETCH_OBJ); 
            if(is_array($data) && count($data) > 0){
                $data = $data[0];
                  
                // sessions
                header("Location: ../admin/index.php");
                exit;

            }else{ 
                $err = "No data was found";
            }
        }
    }
    $err = "Something Wrong in email or password";
}
