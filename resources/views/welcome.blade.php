<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Alumni+Sans:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:regular,700" rel="stylesheet" />

    <script>
        <?php $recaptchaKey = env('GOOGLE_RECAPTCHA_KEY'); ?>
        window.recaptchaKey = <?php echo json_encode($recaptchaKey); ?>;
    </script>
 @vite(['resources/js/app.js'])
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Bakery</title>
</head>
<body>
<div
            class="g-recaptcha"
            data-sitekey="6Lc-AfgpAAAAAEWiEsUe8pwaZp7XfWpw4FOeXRZP"
        ></div>

    <div id="app"></div>
     

</body>
</html>

    <!-- <script>

        window.appConfig = {
            recaptchaSiteKey: "{{ config('services.reCaptchaKey') }}",
            recaptchaSecretKey: "{{ config('services.reCaptchaKeySecret') }}",
        };
    </script>  -->
