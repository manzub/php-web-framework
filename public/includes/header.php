<?php
if ($type == "html") {
?>
  <!DOCTYPE html>
  <html lang="zxx">

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wizz Web Framework | <?php echo $title ?></title>
    <!-- <link rel="icon" href="/public/img/core-img/favicon.ico"> -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Langar&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a8fee4cd0.js" crossorigin="anonymous"></script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/public/js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/public/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/public/js/bootstrap.min.js"></script>
  </head>
<?php
} else {
  header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
}
