<?php

define("DB_NAME", "theusefulwebproject");
define("DB_HOST", "localhost");
define("DB_PWD", "");
define("DB_USER", "root");

function getCategory($category_id){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT links.PKLinks, categories.PKCategories, links.name, categories.color, links.address FROM categories INNER JOIN links ON 
    categories.PKCategories = links.FKCategories WHERE PKCategories = ? ORDER BY clicks DESC limit 0,5";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $category_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <form action=' ' method='POST'>
            <input type='hidden' name='PK' value=" . $row['PKLinks'] . ">
            <input type='hidden' name='link-address' value=" . $row['address'] . ">
            <button style='background-color: ".$row['color']."' type='submit' name='submit-click' class='dataset'>" . $row['name'] . "
                <img id='q" . $row['PKLinks'] . "' class='question' src='question-circle.svg'>
            </button>
            </form><br>";
    }
    mysqli_close($conn);
}

function fetchAllData()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT links.PKLinks, categories.PKCategories, links.name, categories.color, links.address FROM categories INNER JOIN links ON 
    categories.PKCategories = links.FKCategories ORDER BY clicks DESC limit 0,5";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <form action=' ' method='POST'>
            <input type='hidden' name='PK' value=" . $row['PKLinks'] . ">
            <input type='hidden' name='link-address' value=" . $row['address'] . ">
            <button style='background-color: ".$row['color']."' type='submit' name='submit-click' class='dataset'>" . $row['name'] . "
                <img id='q" . $row['PKLinks'] . "' class='question' src='question-circle.svg'>
            </button>
            </form><br>";
    }
    mysqli_close($conn);
}

// FORMS: 

if (isset($_POST['submit-click'])) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "UPDATE links SET clicks = clicks+1 WHERE ".$_POST['PK']." = PKLinks";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("Location: ".$_POST['link-address']);
    exit();
}

function fetchCategories()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT name, PKCategories,color FROM categories";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option class='category-opt' style='color: ".$row['color'].";' value='" . $row['PKCategories'] . "'>" . $row['name'] . "</option>";
    }
    mysqli_close($conn);
}

function searchAllData($search)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT links.PKLinks, links.description, categories.PKCategories, links.name, categories.color, links.address FROM categories LEFT JOIN links ON links.FKCategories = categories.PKCategories 
    WHERE links.name LIKE CONCAT('%', ?, '%') OR links.description LIKE CONCAT('%', ?, '%') OR categories.name LIKE CONCAT('%', ?, '%') ORDER BY clicks DESC limit 0,5";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit("error");
    }
    mysqli_stmt_bind_param($stmt, "sss", $search,$search,$search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <form action=' ' method='POST'>
            <input type='hidden' name='PK' value=" . $row['PKLinks'] . ">
            <input type='hidden' name='link-address' value=" . $row['address'] . ">
            <button style='background-color: ".$row['color']."' type='submit' name='submit-click' class='dataset'>" . $row['name'] . "
                <img value='" . $row['PKLinks'] . "' id='q" . $row['PKLinks'] . "' class='question' src='question-circle.svg'>
            </button>
            </form><br>";
    }
    mysqli_close($conn);
}   

function displayResponse($name, $color, $address, $PK){


}

?>