<?php
session_start();
require_once 'connect.php';
//echo "<H1>Welcome! ".$_SESSION["login_user"].".</H1>";

?>
<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <meta charset="iso-8859-1">
	<link rel="stylesheet" href="styles/layout.css" type="text/css">
<title>
	Online Manufacturing - Order Confirmed
</title>
</head>
<body>
<div id='cssmenu'>
<ul>
	<li class='active'>
   <?php echo "<a><H1>Welcome! ".$_SESSION["login_user"].".</H1></a>"; ?>
   </li>
</ul>
</div>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="home.php">Best Manufacturer</a></h1>
      <h2>The Best Manufacturing</h2>
    </div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li class="last"><a href="logout.php">Log out</a></li>
      </ul>
    </nav>
  </header>
</div>
<br>
<H1>Your order has been confirmed, thank for purchasing from us.</H1>
<?php
$_SESSION["quantity0"] = 0;
$_SESSION["quantity1"] = 0;
$_SESSION["quantity2"] = 0;
$_SESSION["quantity3"] = 0;
$_SESSION["quantity4"] = 0;
$_SESSION["quantity5"] = 0;
?>
<figcaption><a href="home.php"><font size="5">Back to home &raquo;</font></a></figcaption>

</body>
<html>