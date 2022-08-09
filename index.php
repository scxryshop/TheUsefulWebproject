<?php session_start(); ?>
<?php require_once 'sql.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css">
    <title>The Useful Webproject</title>
</head>

<body>

    <div class="search-engine">
        <form action=" " method="POST">
            <div class="wrapper">
                <input placeholder="Search" type="text" name="search">
                <button type="submit" name="search-submit">GO!</button>
            </div>
        </form>
    </div>

    <div class="category-engine">
        <div class="wrapper">
                <select>
                    <option>Categories</option>
                    <?php fetchCategories(); ?>
                </select>
        </div>
    </div>

    <div class="data">
        <div class="center-data">
            <?php
            if(isset($_POST['search-submit'])){
                searchAllData($_POST['search']);
            }else{
                fetchAllData();
            }            
            ?>
        </div>
    </div>
</body>

</html>