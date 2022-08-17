<?php

define("DB_NAME", "websitehacks");
define("DB_HOST", "localhost");
define("DB_PWD", "");
define("DB_USER", "root");


function getTopLinks()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT links.PKLinks, links.description, categories.PKCategories, links.name, links.address FROM categories LEFT JOIN links ON links.FKCategories = categories.PKCategories 
    WHERE links.FKCategories = categories.PKCategories ORDER BY clicks DESC limit 0,4";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='col-xs-12 col-sm-6
                col-md-6
                col-lg-6 mb'>
                    <div data-aos='zoom-in' class='box'>
                        <h3>" . $row['name'] . "</h3>
                        <div class='top-link-content'>
                            <p>" . $row['description'] . "</p>
                            <form action='' method='POST'>
                                <input name='PKLinks' type='hidden' value='" . $row['PKLinks'] . "'>
                                <input name='address' type='hidden' value='" . $row['address'] . "'>
                                <button name='submit-top-link-click' type='submit' 
                                style='cursor: pointer;color: rgb(0,123,255);border:none;background-color:white;font-size:1em;max-width:70%;'>
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


function getCategories()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT name, PKCategories FROM categories ORDER BY name ASC";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
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
        $elements .= "<h3>" . $row['name'] . "</h3>
        <div class='category-link-content'>
            <p>" . $row['description'] . "</p>
            <form action='' method='POST'>
                <input name='PKLinks' type='hidden' value='" . $row['PKLinks'] . "'>
                <input name='address' type='hidden' value='" . $row['address'] . "'>
                <button name='submit-top-link-click' type='submit' 
                style='cursor: pointer;color: rgb(0,123,255);border:none;background-color:white;font-size:1em;max-width:70%;'>
                    " . $row['address'] . "
                </button>
            </form>
        </div>";
    }
    return $elements;
}


function getSearchElements($search)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    $sql = "SELECT links.PKLinks, links.description, links.keywords, categories.PKCategories, links.name, links.address FROM categories LEFT JOIN links ON links.FKCategories = categories.PKCategories 
    WHERE links.name LIKE CONCAT('%', ?, '%') OR links.keywords LIKE CONCAT('%', ?, '%') OR categories.name LIKE CONCAT('%', ?, '%') OR links.description LIKE CONCAT('%', ?, '%')  ORDER BY clicks DESC limit 0,5";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
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
                        <h3>" . $row['name'] . "</h3>
                        <div class='top-link-content'>
                            <p>" . $row['description'] . "</p>
                            <form action='' method='POST'>
                                <input name='PKLinks' type='hidden' value='" . $row['PKLinks'] . "'>
                                <input name='address' type='hidden' value='" . $row['address'] . "'>
                                <button name='submit-top-link-click' type='submit' 
                                style='cursor: pointer;color: rgb(0,123,255);border:none;background-color:white;font-size:1em;'>
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
