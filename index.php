<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Website Hacks</title>
</head>
<body>
    <?php require_once 'sql.php'; ?>
    <h1>Website Hacks</h1>
    <a><button class="send-links">Send us Links</button></a>
    <div data-aos="fade-up" class="search">
            <form class="search-bar-form" method="POST" action="#search-div">
                <input name='search' placeholder="Search..." id="search-bar" type="text" />
            </form>
        </div>

    <main>
        <div class="top-links">
            <div class="row sub-title" style="width: 80vw;">
                <div class="col-xs-12">
                    <h2>Trending links: </h2>
                </div>
            </div>
            <div class="row">
                <?php getTopLinks(); ?>
            </div>
            <div class="row categories">
                <?php getCategories(); ?>
            </div>
            <?php if (isset($_POST['search'])) : ?>
                <div id="search-div">
                    <h2><?php echo "<h3 class='search-result-txt'>Search results for '" . $_POST['search'] . "' :</h3>" ?></h2>
                    <div class="row">
                        <?php getSearchElements($_POST['search']); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        if($("#search-bar").css("border-bottom") == "2px solid black"){

        }
        $("#search-bar").on("focus", function(){
            $("#search-bar").css("border-bottom", "2px solid black");
        });
    </script>
    <script src="smooth-open.js" type="text/javascript"></script>
</body>

</html>