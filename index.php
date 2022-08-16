<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'sql.php'; ?>
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
    <h1>Website Hacks</h1>
    <main>
        <div data-aos="fade-up" class="search">
            <form class="search-bar-form" method="POST" action="#search-div">
                <input name='search' placeholder="Search..." id="search-bar" type="text" />
            </form>
        </div>
        <div class="top-links">
            <div class="row">
                <?php getTopLinks(); ?>
            </div>
            <div class="row categories">
                <?php getCategories(); ?>
            </div>
            <?php if (isset($_POST['search'])) : ?>
            <div id="search-div">
                <h2><?php echo "Search results for '" . $_POST['search'] . "' :" ?></h2>
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
    function showCategory(id){
        if(document.getElementById("category-content-box-"+id).style.display == "none"){
           $("#category-content-box-"+id).slideDown( "slow", function() {
                $("#category-content-box-"+id).fadeIn("slow");
            });
            $("#chevron-compact-down-"+id).fadeOut(500);
            setTimeout(function(){
                $("#chevron-compact-up-"+id).fadeIn("slow");
            }, 500);
        }else{
            $("#category-content-box-"+id).slideUp( "slow", function() {
                $("#category-content-box-"+id).fadeOut("slow");
            });
            $("#category-content-box-"+id).fadeOut("slow");
            
            $("#chevron-compact-up-"+id).fadeOut(500);
            setTimeout(function(){
                $("#chevron-compact-down-"+id).fadeIn("slow");
            }, 500);
        } 
    }
  </script>
</body>

</html>