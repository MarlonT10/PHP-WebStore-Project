<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if (isset($_GET['action'])){
    unset($_SESSION['Merch']);
    session_destroy();
    echo"<h2>You have been signed out</h2>";
}

?>
<h1>Sign Out</h1>
<a href="SignOut.php?action=Sign">Sign Out</a>
<a href="ShopLogin.php">Sign in With Different Account</a>
</body>
</html>