<!doctype html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/656e38591d.js" crossorigin="anonymous"></script>
    <script src="/M120-Projektarbeit/public/js/script.js"></script>
    <link rel="stylesheet" href="/M120-Projektarbeit/public/css/styles.php" type="text/css" crossorigin="anonymous">
    <title>SBB-Ticketautomat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="grid-Container">
<div class="row ">
    <div class="col  d-flex justify-content-end">
        <?php
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (!str_contains($actual_link, "public/settings")) {
            setcookie("href", $actual_link);
        }
        echo "<a  href='/M120-Projektarbeit/public/settings' class='d-inline'><i class='fas fa-cog fa-5x'></i></a>";
        ?>
    </div>

</div>