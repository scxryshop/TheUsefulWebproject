<?php
require_once 'php/sql.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/cookiebanner.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Website Hacks</title>
</head>

<body>
    <h1>Linked Websites</h1>
    <main>
        <div class="top-links">
            <div class="row top-div">
                <div data-aos="fade-up" class="col-xs-12 col-sm-12
                col-md-12
                col-lg-12 search">
                    <form class="search-bar-form" method="POST" action="#search-div">
                        <input name='search' placeholder="Search..." id="search-bar" type="text" />
                    </form>
                    <a href="contact.php"><button class="send-links">Send us links</button></a>
                </div>
            </div>
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
                    <h2 class="search-result-txt"><?php echo "Search results for '" . $_POST['search'] . "' :" ?></h2>
                    <div class="row">
                        <?php getSearchElements($_POST['search']); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </main>
        <div id="cookiebanner" class="cookie-consent-banner">
            <div class="cookie-consent-banner__inner">
                <div class="cookie-consent-banner__copy">
                    <div class="cookie-consent-banner__header">WE ARE NOT RESPONSIBLE FOR THE CONTENT SHOWN ON THE WEBSITES & AGREE TO COOKIES</div>
                    <div class="cookie-consent-banner__description">The links are for informational purposes only and we bear no responsibility for any content. While we have checked the links below, we can not guarantee they are all safe at the time you are reading this. We do not endorse any websites or illegal activities. By tapping on Got it, you agree to our use of cookies. We use cookies to improve your experience on our site.</div>
                </div>

                <div class="cookie-consent-banner__actions">
                    <form action="php/cookie.php" method="post">
                        <button name="submit-accept" type="submit" value="accept-cookie" style="border: none;" id="accept-cookie" class="cookie-consent-banner__cta">
                            Got it!
                        </button>
                        <button name="submit-decline" type="submit" value="decline-cookie" id="decline-cookie" class="cookie-consent-banner__cta cookie-consent-banner__cta--secondary">
                            Decline
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="js/main.js" type="text/javascript"></script>
</body>

</html>