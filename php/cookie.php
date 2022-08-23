<?php

session_start();

if(isset($_POST['submit-accept'])){
    setcookie("terms", "accept", time()+31556926 ,'/', "localhost");
    header("Location: ../");
}

if(isset($_POST['submit-decline'])){
    $_SESSION['decline'] = true;
    header("Location: ../");
}