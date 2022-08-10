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

    <div class="nav">
        <h1 style="text-align: center;">Website Hacks</h1>
    </div>

    <div class="search-engine">
        <form action=" " method="POST">
            <div class="wrapper">
                <input placeholder="Search..." type="text" class="search-in" name="search">
                <button class="submit-search" type="submit" name="search-submit">GO!</button>
            </div>
        </form>
    </div>

    <div class="category-engine">
        <div class="wrapper">
            <form action=" " method="POST">
                <select name="category_id" type="submit" id="category-sel">
                    <option>Categories</option>
                    <?php fetchCategories(); ?>
                </select>
                <button name="submit-category" style="display:none;" type="submit" id="submit-category"></button>
            </form>
        </div>
    </div>

    <div class="data">
        <div class="center-data">
            <?php
            if (isset($_POST['search-submit'])) {
                searchAllData($_POST['search']);
            } else if (isset($_POST['submit-category'])) {
                getCategory($_POST['category_id']);
            } else {
                fetchAllData();
            }
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#category-sel").on("change", function() {
            $("#submit-category").click();
        });
    </script>
</body>

</html>