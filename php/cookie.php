<?php 
session_start();
if(isset($_POST['cookie-val'])){

    if($_POST['cookie-val'] === "accept"){
        setcookie("terms", "accept", time()+31556926 ,'/', "localhost");
        header("Location: ../");
        exit();
    }else if($_POST['cookie-val'] === "decline"){
        $_SESSION['decline-cookie'] = true;
        header("Location: ../");
        exit();
    }

}