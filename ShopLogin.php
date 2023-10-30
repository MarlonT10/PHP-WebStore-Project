<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Login</title>
</head>
<body>
<?php

if(isset($_POST['Submit'])){

if(!empty($_POST['Username']) && !empty($_POST['Password'])){
    $User = stripslashes($_POST['Username']);
    $Pass = stripslashes($_POST['Password']);
    $DBConnect = mysqli_connect("localhost","tmarlon","cfALUPA9U9","tmarlon_project");
    if($DBConnect){
        $TableName = "turcios_marlon_accounts";
        $SQLstring ="SELECT * FROM turcios_marlon_accounts WHERE Username = '$User'";
        $Result = mysqli_query($DBConnect,$SQLstring);
        if($Result){
            if(mysqli_num_rows($Result)==0){
                echo"You do not have an account, please register";
            }
            else{
                echo"<h2>Login Successful, you now have access to our shop. Click Below.</h2>";
                echo"<a href='Merchandise.php'>Click Here to Access Shop</a>";
            }


        }
        else{
            echo"Unable to verify login.";
        }


    }
    else{
        echo"Unable to connect to database.";
    }
}
else{
    echo"All fields must be completed";
}
    mysqli_close($DBConnect);
}

?>
<h1>Marlon's Gadget Shop</h1>
<h2>If you already have an account please login to continue shopping.</h2>
<h2>If you don't have an account please click register.</h2>
<form method="post" action="ShopLogin.php">
    <p>Username: <input type="text" name="Username" ></p>
    <p>Password: <input type="text" name="Password" ></p>
    <p>
        <input type="submit" name="Submit" value="Enter" >
    </p>
</form>

<a href="Registration.php">Register</a>
</body>
</html>