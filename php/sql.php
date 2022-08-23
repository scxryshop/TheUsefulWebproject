<?php

require_once 'const.php';

/*
define("DB_NAME", "bernhardt");
define("DB_HOST", "beato.pdx1-mysql-a7-5b.dreamhost.com");
define("DB_PWD", "Joalukas2004");
define("DB_USER", "databaseuserq");
*/
define("DB_NAME", "websitehacks");
define("DB_HOST", "localhost");
define("DB_PWD", "");
define("DB_USER", "root");

function getTopLinks()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME,3306);
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, GET_TOP_LINKS_QUERY)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo getLinkContainer($row['name'], $row['description'], $row['address'], $row['PKLinks']);
    }
    mysqli_close($conn);
}


function getCategories()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, GET_ALL_CATEGORIES_QUERY)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='col-xs-12 col-sm-6
                col-md-6
                col-lg-6 mb-category'>
                    <div onclick='showCategory(" . $row['PKCategories'] . ")' data-aos='flip-left' class='box category-box'>
                        <h3>" . $row['name'] . " </h3>
                        <i id='chevron-compact-down-" . $row['PKCategories'] . "' style='font-size: 2em; display:block;' class='bi bi-chevron-compact-down'></i>
                        <i id='chevron-compact-up-" . $row['PKCategories'] . "' style='font-size: 2em; display:none;' class='bi bi-chevron-compact-up'></i>
                </div>
                <div id='category-content-box-" . $row['PKCategories'] . "' style='display:none;' class='box category-content-box'>
                "; 
                echo getLinks($row['PKCategories']);
        echo "</div></div>";
    }
    mysqli_close($conn);
}
function getLinks($category){
    $elements = "";
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT links.PKLinks, links.description, links.name, links.address 
    FROM links LEFT JOIN categories ON links.FKCategories = categories.PKCategories WHERE categories.PKCategories = ".$category." 
    ORDER BY links.name ASC";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $elements .= getLinkContainer($row['name'], $row['description'], $row['address'], $row['PKLinks']);
    }
    return $elements;
}


function getSearchElements($search)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, SEARCH_QUERY)) {
        exit("error");
    }
    mysqli_stmt_bind_param($stmt, "ssss", $search, $search, $search,$search);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='col-xs-12 col-sm-6
                col-md-6
                col-lg-6 mb'>
                    <div class='box'>
                        <div class='link-content'>
                        <h3>" . $row['name'] . "</h3>
                            <p>" . $row['description'] . "</p>
                            <form action='' method='POST'>
                                <input name='PKLinks' type='hidden' value='" . $row['PKLinks'] . "'>
                                <input name='address' type='hidden' value='" . $row['address'] . "'>
                                <button class='link-btn' name='submit-search-click' type='submit'>
                                    " . $row['address'] . "
                                </button>
                            </form>
                        </div>
                </div>
        </div>    
        ";
    }
    mysqli_close($conn);
}

// Link has been pressed
if (isset($_POST['submit-top-link-click'])) {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "UPDATE links SET clicks = clicks+1 WHERE " . $_POST['PKLinks'] . " = PKLinks";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("Location: " . $_POST['address']);
    exit();
}

if(isset($_POST['submit'])){
    if($_POST['submit'] == "accept-cookie"){
        setcookie("terms", "accept", time()+31556926 ,'/', "localhost");
    }else if($_POST['submit'] == "decline-cookie"){
        $_SESSION['cookie'] = "decline";
    }
}

// Search has been activated
if(isset($_POST['submit-search-click'])){
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "UPDATE links SET searches = searches+1 WHERE " . $_POST['PKLinks'] . " = PKLinks";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    header("Location: " . $_POST['address']);
    exit();
}
