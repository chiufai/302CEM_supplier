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
	Online Manufacturing - Home
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

<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- Slider -->
    <section id="slider"><a href="#"><img src="images/iphoneX.jpg"  alt=""></a></section>
    <!-- main content -->
    <div id="homepage">
      <section id="latest">
        <article>
          <figure>
            <ul class="clear">
              <li class="one_third"><img src="images/iphone7.jpg" width="290" height="180" alt=""></li>
              <li class="one_third"><img src="images/iphone8.jpg" width="290" height="180" alt=""></li>
              <li class="one_third lastbox"><img src="images/iphone8p.jpg" width="290" height="180" alt=""></li>
            </ul>
            <figcaption><a href="product.php">View All Our Products &raquo;</a></figcaption>
          </figure>
        </article>
      </section>
      <!-- / latest work -->
    </div>
  </div>
</div>

</body>
<html>