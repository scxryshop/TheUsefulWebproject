<?php 

define("DB_NAME","theusefulwebproject");
define("DB_HOST", "localhost");
define("DB_PWD","");
define("DB_USER","root");


function fetchAllData(){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT name, address FROM links limit 0,6";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        echo "<a href='".$row['address']."'><button class='dataset'>".$row['name']."</button></a><br>";
    }
    mysqli_close($conn);
}

function fetchCategories(){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT name, PKCategories FROM categories";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        echo "<option value='".$row['PKCategories']."'>".$row['name']."</option>";
    }
    mysqli_close($conn);
}

function searchAllData($search){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $s = "%".$search."%";
    $sql = "SELECT name, address FROM links WHERE name LIKE $s";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        echo "<a href='".$row['address']."'><button class='dataset'>".$row['name']."</button></a><br>";
    }
    mysqli_close($conn);
}

?>
<style>
    a a:hover{
        text-decoration: none;
    }
    button:hover{
        cursor: pointer;    
    }   
    .dataset{
        width: 100%;
        height: 6vh;
        padding: 10px 20px;
        margin-top: 1vh;
        margin-bottom: 1vh;
        border: none;
        background-color: white;
        font-size: 1em;
        font-weight: 500;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
    }
</style>