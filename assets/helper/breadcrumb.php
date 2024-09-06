<?php 
    // $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
    // foreach($crumbs as $crumb){
    //     echo ucfirst(str_replace(array(".php","_"),array("",""),$crumb) . ' / ');
    // }

function breadcrumb(){
    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
    foreach($crumbs as $crumb){
        echo ucfirst(str_replace(array(".php","_"),array("",""),$crumb) . ' / ');
    }
}



