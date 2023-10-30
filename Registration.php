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
if(isset($_POST['Submit'])){
    if(!empty($_POST['Name'])&&!empty($_POST['User'])&&!empty($_POST['Pass'])){
        $DBConnect = mysqli_connect("localhost","tmarlon","cfALUPA9U9","tmarlon_project");
        $Name = $_POST['Name'];
        $User = $_POST['User'];
        $Pass = $_POST['Pass'];
        $Query = "INSERT INTO turcios_marlon_accounts (Name,Username,Password) VALUES('$Name','$User','$Pass') ";
        $ResultQuery = mysqli_query($DBConnect,$Query);
        if($ResultQuery){
            echo"Registration Successful";
        }
        else{
            echo"<p>Unable to connect to the database server.</p>"."<p>Error code". mysqli_errno() . ": ".mysqli_error(). "</p>";
        }
    }
    mysqli_close($DBConnect);

}
?>
<form method="post" action="Registration.php">
    <p>Name: <input type="text" name="Name"></p>
    <p>Username: <input type="text" name="User"></p>
    <p>Password: <input type="text" name="Pass"></p>
    <p>
        <input type="submit" name="Submit" value="Enter">
    </p>
</form>
<a href="ShopLogin.php">Return To Login</a>
</body>
</html>