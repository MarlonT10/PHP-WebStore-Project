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
if(isset($_GET['action'])){
    $DBConnect = mysqli_connect("localhost","tmarlon","cfALUPA9U9","tmarlon_project");
    if($DBConnect){
        $Query = "SELECT Percent FROM turcios_marlon_discounts ORDER BY RAND() LIMIT 1";
        $Result = mysqli_query($DBConnect,$Query);
        if($Result){
            $Row = mysqli_fetch_array($Result);
            $Percent = $Row['Percent'];
            echo"<h2>Your random discount is : $Percent percent</h2>";

            $priceArray = array("Projectors"=>150,"Adapters"=>90,"Monitors"=>300,"Cables"=>100);
            $Projectors = $priceArray["Projectors"]*$_SESSION['Merch']['Projectors'];
            $Adapters = $priceArray['Adapters']*$_SESSION['Merch']['Adapters'];
            $Monitors = $priceArray['Monitors']*$_SESSION['Merch']['Monitors'];
            $Cables = $priceArray['Cables']*$_SESSION['Merch']['Cables'];
            $Total=($Projectors+$Adapters+$Monitors+$Cables)*$Percent/100;

            echo"<h1>Order Confirmation</h1></br>";
            echo"<table border = \"1\" width = \"100%\" style = \"background-color:lightgray\">\n";
            echo "<tr>\n";
            echo "<td>" . "Projectors: " . $Projectors. "</td>";
            echo "<td>" . "Adapters: " . $Adapters. "</td>";
            echo "<td>" . "Monitors: " . $Monitors. "</td>";
            echo "<td>" . "Cables: " . $Cables."</td>";


            echo "</tr>\n";

            echo"</table>\n";

            echo" With Discount";

            echo"<h2> Total: $Total dollars </h2> ";


        }
        else{
            echo"Can't get percent";
        }

    }
    else{
        echo"Can't access database";
    }
    mysqli_close($DBConnect);
}
?>
<h1>Calculate Subtotal</h1>
<p>Click Below for your discount</p>
<a href="MysteryDiscount.php?action=Mystery">Click Here</a>
<a href="SignOut.php">Sign Out</a>

</body>
</html>