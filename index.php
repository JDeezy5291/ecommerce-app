<?php 
  session_start();

  include 'includes/config.php';
  include 'includes/cart.inc.php';
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>TecVenue</title> 
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="main.css" rel="stylesheet">
	</head>
	<body>
    <section id="navigation">
      <nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">TecVenue</a>
        <form class="form-inline my-2 my-md-0 mr-auto" id="searchFormLarge">
          <input class="form-control" type="text" placeholder="Search">
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar01" aria-controls="navbar01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar01">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Computer Systems</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="laptops.php">Laptops</a>
                <a class="dropdown-item" href="desktops.php">Desktops</a>
                <a class="dropdown-item" href="peripherals.php">Peripherals</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Components</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Core Components</a>
                <a class="dropdown-item" href="#">Storage Devices</a>
                <a class="dropdown-item" href="#">Accessories</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Electronics</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Tablets</a>
                <a class="dropdown-item" href="#">Mobile Phones</a>
                <a class="dropdown-item" href="#">Headphones</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gaming</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Consoles</a>
                <a class="dropdown-item" href="#">Games</a>
                <a class="dropdown-item" href="#">Headphones</a>
              </div>
            </li>
            <li class="nav-item">
              <?php
              if (isset($_SESSION['u_email'])) {
                  echo '<form action="includes/logout.inc.php" method="post">
                          <button type="submit" name="submit" class="btn-link" id="logOutBTN">Log Out</button>
                        </form>';
                } else {
                  echo '<a href="login.php" class="nav-link">Sign In</a>';
                }
              ?>
            </li>
          </ul>
          <form class="form-inline my-2 my-md-0" id="searchFormSmall">
            <input class="form-control" type="text" placeholder="Search">
          </form>
        </div>
      </nav>
    </section>

    <section id="carousel">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="pimg1">
              <div class="container-fluid">
                <div class="carousel-caption text-center" id="title-text">
                  <h1>Get in the Game</h1>
                  <p>15% off all games</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Shop Now</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="pimg2">
              <div class="container">
                <div class="carousel-caption text-center" id="title-text">
                  <h1>Upgrade with an CPU you can count on</h1>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Shop Now</a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="pimg3">
              <div class="container">
                <div class="carousel-caption text-center" id="title-text">
                  <h1>Monitor Sale</h1>
                  <p>10% off selected Monitors</p>
                  <p>Valid through 3/15/2018</p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Shop Now</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </section>

    <section class="section section-light">
      <h1>Now Trending</h1>
        <div class="row">
          <!-- IMG 1 -->
          <div class="card-deck mb-3">
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">SSD</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_ssd"><img src="images/ssd.jpg" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_ssd">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 1';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This SSD is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning">
                      </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                      </div>
                    </div>   
                  </div>
                </div>
                <ul class="list-unstyled mt-3 mb-4 text-center">
                  <li>List Price: <s>$109.99</s></li>
                  <li>Our Price: $99.99</li>
                </ul>
              </div>
            </div>
            <!-- IMG 2 -->
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
            <!-- <h4 class="my-0 font-weight-normal text-center">SSD</h4> -->
              <div class="card-header">
                <h4 class="my-0 font-weight-normal">Monitor</h4>
              </div>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_monitor"><img src="images/monitor.png" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_monitor">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <?php
                    $query = 'SELECT * FROM products WHERE id = 2';
                    $result = mysqli_query($conn, $query);
                      if ($result):
                        if (mysqli_num_rows($result) > 0):
                          while ($product = mysqli_fetch_assoc($result)):
                  ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Monitor is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                          endwhile;
                        endif;
                      endif;
                      ?>
                  </div>
                </div>   
              </div>
            </div>
            <ul class="list-unstyled mt-3 mb-4 text-center">
              <li>List Price: <s>$129.99</s></li>
              <li>Our Price: $109.99</li>
            </ul>
          </div>
        </div>
            <!-- IMG 3 -->
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">RAM</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_ram"><img src="images/ram.png" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_ram">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 3';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This RAM is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                    </div>
                  </div>   
                </div>
              </div>
              <ul class="list-unstyled mt-3 mb-4 text-center">
                <li>List Price: <s>$99.99</s></li>
                <li>Our Price: $89.99</li>
              </ul>
            </div>
          </div>
            <!-- IMG 4 -->
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">SSD</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_ssd"><img src="images/ssd.jpg" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_ssd">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 1';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This SSD is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                      </div>
                    </div>   
                  </div>
                </div>
                <ul class="list-unstyled mt-3 mb-4 text-center">
                  <li>List Price: <s>$109.99</s></li>
                  <li>Our Price: $99.99</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    <section class="section section-dark">
      <h1>Top Sellers</h1>
        <div class="row">
          <!-- IMG 1 -->
          <div class="card-deck mb-3">
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">SSD</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_ssd"><img src="images/ssd.jpg" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_ssd">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 1';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This SSD is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                      </div>
                    </div>   
                  </div>
                </div>
                <ul class="list-unstyled mt-3 mb-4 text-center">
                  <li>List Price: <s>$109.99</s></li>
                  <li>Our Price: $99.99</li>
                </ul>
              </div>
            </div>

            <!-- IMG 2 -->
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Monitor</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_monitor"><img src="images/monitor.png" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_monitor">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 2';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Monitor is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                      </div>
                    </div>   
                  </div>
                </div>
                <ul class="list-unstyled mt-3 mb-4 text-center">
                  <li>List Price: <s>$129.99</s></li>
                  <li>Our Price: $109.99</li>
                </ul>
              </div>
            </div>
            <!-- IMG 3 -->
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">RAM</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_ram"><img src="images/ram.png" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_ram">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 3';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This RAM is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                      </div>
                    </div>   
                  </div>
                </div>
                <ul class="list-unstyled mt-3 mb-4 text-center">
                  <li>List Price: <s>$99.99</s></li>
                  <li>Our Price: $89.99</li>
                </ul>
              </div>
            </div>
            <!-- IMG 4 -->
            <div class="col-xl-3 col-lg-6">
              <div class="card mb-4 shadow-sm item-fade">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">SSD</h4>
                </div>
              <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_ssd"><img src="images/ssd.jpg" alt="Card image cap" class="img-fluid"></a>
              <!-- MODAL 2 -->
              <div class="modal fade" id="myModal_ssd">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 1';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This SSD is amazing! You must buy one while they last.</p>
                          <hr>
                          <p class="float-left">In Stock</p>
                          <p>Price: $<?php echo $product['price']; ?></p>
                          <label class="float-left mr-3">Quantity:</label>
                          <input type="text" id="quantity" name="quantity" value="1">
                          <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <br>
                          <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-warning" onclick="location.href='cart.php'">
                        </form>
                      </div>
                      <?php
                            endwhile;
                          endif;
                        endif;
                      ?>
                      </div>
                    </div>   
                  </div>
                </div>
                <ul class="list-unstyled mt-3 mb-4 text-center">
                  <li>List Price: <s>$109.99</s></li>
                  <li>Our Price: $99.99</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section id="showcase">
        <div class="pimg4"></div>
    </section>

    <section id="features">
        <div class="row section section-light">
          <div class="col-xl-4 col-lg-12">
            <h2 class="text-center">Computer Systems</h2>
            <img src="images/monitor.png" class="img-fluid showcaseImg">
            <p class="text-center"><a class="btn btn-secondary mb-5 mt-3" href="desktops.php" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-xl-4 col-lg-12">
            <h2 class="text-center">Components</h2>
            <img src="images/hardDrive.jpeg" class="img-fluid showcaseImg">
            <p class="text-center"><a class="btn btn-secondary mb-5 mt-3" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-xl-4 col-lg-12">
            <h2 class="text-center">Electronics</h2>
            <img src="images/phone.jpeg" class="img-fluid showcaseImg">
            <p class="text-center"><a class="btn btn-secondary mb-5 mt-3" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>
    </section>

    <section id="foot">
      <footer class="container-fluid py-5 section-dark">
      <div class="row">
        <div class="col-12 col-md">
          <h5>TecVenue</h5>
          <h6 class="d-block mb-3 text-muted">&copy; 2017-2018</h6>
        </div>
        <div class="col-6 col-md">
          <h5>Customer Service</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Return an Item</a></li>
            <li class="text-muted"><a href="#">Track an Order</a></li>
            <li class="text-muted"><a href="#">Privacy & Security</a></li>
            <li class="text-muted"><a href="#">Stuff for developers</a></li>
            <li class="text-muted"><a href="#">Return Policy</a></li>
            <li class="text-muted"><a href="#">Feedback</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>My Account</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Login/Signup</a></li>
            <li class="text-muted"><a href="#">Return History</a></li>
            <li class="text-muted"><a href="#">Order History</a></li>
            <li class="text-muted"><a href="#">Email Notifications</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Site Map</a></li>
            <li class="text-muted"><a href="#">Become an Affiliate</a></li>
            <li class="text-muted"><a href="#">Shop by Brand</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small" id="footerLi">
            <li class="text-muted"><a href="#">Team</a></li>
            <li class="text-muted"><a href="#">Locations</a></li>
            <li class="text-muted"><a href="#">Privacy</a></li>
            <li class="text-muted"><a href="#">Terms</a></li>
            <li class="text-muted"><a href="#">Careers</a></li>
          </ul>
        </div>
      </div>
    </footer>   
    </section>

		  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
	</body>
</html>