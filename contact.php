<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="contact.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
    <section class="get-in-touch">
        <h1 class="title">Send us suggestions</h1>
        <form class="contact-form row">
            <div class="form-field col x-50">
                <input id="name" class="input-text js-input" type="text" required>
                <label class="label" for="name">Category</label>
            </div>
            <div class="form-field col x-50">
                <input id="email" class="input-text js-input" type="email" required>
                <label class="label" for="email">Link</label>
            </div>
            <div class="form-field col x-100">
                <input id="message" class="input-text js-input" type="text" required>
                <label class="label" for="message">Description</label>
            </div>
            <div class="form-field col x-100 align-center">
                <input class="submit-btn" type="submit" value="Submit">
            </div>
        </form>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $( '.js-input' ).keyup(function() {
  if( $(this).val() ) {
     $(this).addClass('not-empty');
  } else {
     $(this).removeClass('not-empty');
  }
});
    </script>
</body>

</html>