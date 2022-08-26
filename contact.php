<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js?render=6LfKiJchAAAAALLOPvbhJshdfORB4LOd3Ql0O32c"></script>
    <link href="css/contact.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <section class="get-in-touch">
        <h1 class="title">Send us suggestions</h1>
        <form class="contact-form row" action="" method="post">
            <input type="hidden" name="token" id="token">
            <div class="form-field col x-50">
                <input minlength="3" name="category" id="name" class="input-text js-input" type="text" required>
                <label class="label" for="name">Category</label>
            </div>
            <div class="form-field col x-50">
                <input minlength="7" name="Link" id="email" class="input-text js-input" type="url" required>
                <label class="label" for="email">Link</label>
            </div>
            <div class="form-field col x-100">
                <input minlength="20" name="description" id="message" class="input-text js-input" type="text" required>
                <label class="label" for="message">Description</label>
            </div>
            <p style="text-align:center;">* By submitting this form you <b>agree</b> to our Terms of Service</p>
            <div class="form-field col x-100 align-center">
                <input name="submit" class="submit-btn" type="submit" value="Submit">
            </div>
        </form>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('.js-input').keyup(function() {
            if ($(this).val()) {
                $(this).addClass('not-empty');
            } else {
                $(this).removeClass('not-empty');
            }
        });
    </script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfKiJchAAAAALLOPvbhJshdfORB4LOd3Ql0O32c', {
                action: 'submit'
            }).then(function(token) {
                document.getElementById("token").value = token;
            });
        });
    </script>
    <?php

    if (isset($_POST['submit'])) {
        $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfKiJchAAAAAHgriYns9J3khWWGp8h5zjaag-aS&response=" . $_POST['token']);
        $request = json_decode($request);
        if ($request->success == true) {
            if ($request->score >= 0.6) {
                require_once 'php/email_template.php';

                $link = htmlspecialchars($_POST['Link']);
                $category = htmlspecialchars($_POST['category']);
                $desc = htmlspecialchars($_POST['description']);

                if (!filter_var($link, FILTER_VALIDATE_URL)) {
                    exit();
                }

                $email = getEmail($link, $desc, $category);

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <website@websitehacks.org>' . "\r\n";
                if(!mail("joalukas12@gmail.com", "Website Vorschlag", $email, $headers)){
                    exit();
                }else{
                    exit();
                }
            } else {
                exit();
            }
        }
    }
    ?>
</body>

</html>