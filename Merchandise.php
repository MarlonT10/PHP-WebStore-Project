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
    if(isset($_SESSION['Merch'])){
        switch ($_GET['action']){
            case 'Projectors':

                $_SESSION['Merch']['Projectors']++;
                break;
            case 'adapters' :
                $_SESSION['Merch']['Adapters']++;
                break;
            case 'Monitors':
                $_SESSION['Merch']['Monitors']++;
                break;
            case 'Cables'    :
                $_SESSION['Merch']['Cables']++;
                break;
            case 'Checkout'    :
                echo"<h1>Order Confirmation</h1></br>";
                echo"<table border = \"1\" width = \"100%\" style = \"background-color:lightgray\">\n";
                echo "<tr>\n";
                echo "<td>" . "Projectors" . "</td>";
                echo "<td>" . "Adapters" . "</td>";
                echo "<td>" . "Monitors" . "</td>";
                echo "<td>" . "Cables" . "</td>";


                echo "</tr>\n";

                echo "<tr>\n";
                foreach($_SESSION['Merch'] as $Item) {
                    echo "<td>" . htmlentities($Item) . "</td>";
                }
                echo "</tr>\n";

                echo"</table>\n";

                echo"<h1><a href='MysteryDiscount.php'>Click Here For Mystery Discount</a></h1>";

        }

    }
    else{
        $_SESSION['Merch'] = array("Projectors"=>0,"Adapters"=>0,"Monitors"=>0,"Cables"=>0);;
    }

}

?>
<h1>Official Shop</h1>
<p>
    <p>Click on the item to add it to your cart. Click on checkout to view your cart.</p>
    <a href="Merchandise.php?action=Projectors">Projectors</a><br/>
    <a href="Merchandise.php?action=adapters">Adapters</a><br/>
    <a href="Merchandise.php?action=Monitors">Monitors</a><br/>
    <a href="Merchandise.php?action=Cables">Cables</a><br/>
    <br>
    <a href="Merchandise.php?action=Checkout">Checkout</a>
</p>

</body>
</html>