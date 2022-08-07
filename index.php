<?php session_start(); ?>
<?php require_once 'sql.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="" method="GET">
            <div class="wrapper">
                <select>
                    <option>Categories</option>
                    <?php fetchCategories(); ?>
                </select>
            </div>
        </form>
    </div>

    <div class="data">
        <div class="center-data">
            <?php if (isset($_POST['search-submit'])) : ?>
                <?php searchAllData($_POST['search']); ?>
            <?php else : ?>
                <?php fetchAllData(); ?>
            <?php endif; ?>
        </div>
    </div>

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .search-engine {
            top: 12%;
            width: 100%;
        }

        .search-engine,
        .category-engine {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .category-engine {
            top: 18%;
            width: 80vw;
            padding: 0px 10px;
            left: 50%;
            transform: translate(-50%, 0);
        }

        select {
            font-size: 1em;
            height: 5vh;
            width: calc(80vw + 20px);
            text-align: center;
        }

        .data {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            width: 80vw;
            height: 50vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
            border-radius: 10px;
        }

        .center-data {
            width: 100%;
        }
    </style>
</body>

</html>