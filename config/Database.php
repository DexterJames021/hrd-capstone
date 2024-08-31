<?php 

define("host","localhost");
define("db","hrcapstone");
define("user","root");
define("pass","");
define("dns","mysql:host=".host.";dbname=".db);

try{
    $conn = new PDO(dns,user,pass);
}catch(PDOException $e){
    echo "ERR: ". $e->getMessage();
}
