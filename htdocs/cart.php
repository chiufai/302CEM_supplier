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
	Online Manufacturing - cart
</title>
<style>
#confirm{
	padding:10px;
}
#order {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	box-sizing: border-box;
	
}

#order th {
    border: 1px solid #FFFFFF;
	background:#ff9900;
	color: #FFFFFF;
    text-align: left;
    padding: 8px;
	text-align: center;
}

#order td{
    border: 1px solid #FFFFFF;
	color: #FFFFFF;
    text-align: left;
    padding: 8px;
}
</style>
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

<font size="16" color="#FFFFFF">Please confirm your order below</font>

<div id="confirm">
	<form action = "#" method = "post">
	<table id="order">
	<tr>
		<th>Product ID</th>
		<th>Product Description</th>
		<th>Quantity</th>
		<th>Price / Unit</th>
		<th>Total</th>
		<th>Delete</th>
	</tr>
	<?php
	if(!isset($_SESSION["quantity0"]))
		$_SESSION["quantity0"] = 0;
	if(!isset($_SESSION["quantity1"]))
		$_SESSION["quantity1"] = 0;
	if(!isset($_SESSION["quantity2"]))
		$_SESSION["quantity2"] = 0;
	if(!isset($_SESSION["quantity3"]))
		$_SESSION["quantity3"] = 0;
	if(!isset($_SESSION["quantity4"]))
		$_SESSION["quantity4"] = 0;
	if(!isset($_SESSION["quantity5"]))
		$_SESSION["quantity5"] = 0;
	$quantity = array($_SESSION["quantity0"],$_SESSION["quantity1"],$_SESSION["quantity2"],$_SESSION["quantity3"],$_SESSION["quantity4"],$_SESSION["quantity5"]);
	$sql = "SELECT * FROM product";
	$result = $link->query($sql);
	$x = 0;
	$have_order = false;
	foreach($quantity as $value){
		if($value>0)
			$have_order=true;
	}
	if($have_order){
		$total = 0;
		while($row = $result->fetch_row()) {
			if($quantity[$x]>0){
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$quantity[$x]."</td><td>HKD $".$row[3]."</td><td>HKD $".$row[3]*$quantity[$x].".00</td><td><center><input type=\"submit\" name=\"delete".$x."\" value = \"Delete!\" /></center></td></tr>";
			$total_array[$x] = $row[3]*$quantity[$x];
			}
			$total = $total+ ($row[3]*$quantity[$x]);
		$x++;
		}
	echo "<tr><th colspan=\"6\"> <font size = \"6\">Total amount: HKD $".$total."</font></th></tr>";
	echo "</table><br>";
	echo "<input type=\"submit\" name=\"confirm\" value = \"Confrim!\" style=\"font-size: 150%;height:40px;width:200px\"/>";
	}else{
		echo "</table><br><br>";
		echo "<center><font size = \"10\" color=\"#FFFFFF\"> There is no order received.</font></center>";}
	?>
	</form>
	<?php
	if(isset($_POST['delete0'])){
		$_SESSION["quantity0"] = 0;
		header("Refresh:0");
	}
	if(isset($_POST['delete1'])){
		$_SESSION["quantity1"] = 0;
		header("Refresh:0");
	}
	if(isset($_POST['delete2'])){
		$_SESSION["quantity2"] = 0;
		header("Refresh:0");
	}
	if(isset($_POST['delete3'])){
		$_SESSION["quantity3"] = 0;
		header("Refresh:0");
	}
	if(isset($_POST['delete4'])){
		$_SESSION["quantity4"] = 0;
		header("Refresh:0");
	}
	if(isset($_POST['delete5'])){
		$_SESSION["quantity5"] = 0;
		header("Refresh:0");
	}
	
	if(isset($_POST['confirm'])){
		$sql1 = "SELECT MAX(`order_id`) FROM order_detail";
		$result1 = $link->query($sql1);
		$row1 = $result1->fetch_row();
		if(is_null($row1[0])){
			echo $row1[0];
		$index=1;}
		else $index=$row1[0]+1;
		
		for($y=0;$y<count($quantity);$y++){
			if($quantity[$y]>0){
				$sql = "INSERT INTO `order_detail` (`order_id`, `customer_id`, `product_id`, `quantity`, `total_price`, `order_date`) VALUES ('".$index."','".$_SESSION["user_id"]."','P000000".($y+1)."','".$quantity[$y]."','".$total_array[$y]."',CURRENT_DATE())";
				$link->query($sql);
				
				$temp_sql1 = "SELECT stock from product WHERE product_id = 'P000000".($y+1)."'";
				$temp_result1 = $link->query($temp_sql1);
				$temp_row1 = $temp_result1->fetch_row();
				//echo $temp_row1[0];
				$update_sql = "UPDATE product SET stock = ".($temp_row1[0]-$quantity[$y])." WHERE product_id = 'P000000".($y+1)."'";
				//echo $update_sql;
				$link->query($update_sql);
				//echo $sql;
			}
		}
		header("location: confirmed.php");
		
	}
	
	?>
	
</div>

</body>
<html>