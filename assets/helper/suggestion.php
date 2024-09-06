<?php

$x =  array("a","b","c","ab","ac","ad");

if(isset($_POST["suggestion"])){
    $n = $_POST['suggestion'];

    foreach($x as $y){
        if(strpos($y,$n) !== false){
            echo $n."<br>";
        }
    }
}

