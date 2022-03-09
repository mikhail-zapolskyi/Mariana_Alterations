<?php
    //CREATE CONNECTION
    $conn = mysqli_connect('localhost', 'root', '', 'marinnasblog');

    //CHECK THE CONNECTION
    if(mysqli_connect_errno()){
        echo 'faild to connect';
    }

    define('ROOT_URL', 'http://localhost/900.Mariana_Alterations/blog.php');
?>