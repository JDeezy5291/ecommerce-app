<?php 
  session_start();
  $product_ids = array();

  // check if add to cart button has been submitted
  if (filter_input(INPUT_POST, 'add_to_cart')) {
    if (isset($_SESSION['shopping_cart'])) {
      //tracks amount of items in cart
      $count = count($_SESSION['shopping_cart']);

      $product_ids = array_column($_SESSION['shopping_cart'], 'id');

      if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
        $_SESSION['shopping_cart'][$count] = array (
          'id' => filter_input(INPUT_GET, 'id'),
          'name' => filter_input(INPUT_POST, 'name'),
          'price' => filter_input(INPUT_POST, 'price'),
          'quantity' => filter_input(INPUT_POST, 'quantity')
        );
      } else {//product exists, increase quantity
        //match array key to id of product being added to cart
        for ($i = 0; $i < count($product_ids); $i++) {
          if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
            // add item quantity to existing product ib the array
            $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
          }
        }
      }
    } else {
      // if shopping cart doesn't exist, create first product w/array key 0
      $_SESSION['shopping_cart'][0] = array (
        'id' => filter_input(INPUT_GET, 'id'),
        'name' => filter_input(INPUT_POST, 'name'),
        'price' => filter_input(INPUT_POST, 'price'),
        'quantity' => filter_input(INPUT_POST, 'quantity')
      );
    }
  }
  include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecVenue</title> 
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">  -->
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

    <section id="showcase">
      <div class="laptop-pimg1">
        <div class="container-fluid">
          <div class="container">
            <div class="carousel-caption text-center mb-5" id="text-gray">
              <h1>Laptops</h1>
              <p>Find a Laptop to suit your Businesss, School or Gaming needs.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="album text-muted">
      <div class="container-fluid mb-5">
        <div class="row m-2">
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>

          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>

          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
          <div class="card col-lg-4 col-md-6 item-fade">
            <h4 class="my-0 font-weight-normal text-center">Laptop</h4>
            <a href="#" id="myBtn" data-toggle="modal" data-target="#myModal_laptop"><img src="images/laptop/laptop.jpeg" alt="Card image cap" class="img-fluid"></a>
            <!-- MODAL 2 -->
            <div class="modal fade" id="myModal_laptop">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <?php 
                      $query = 'SELECT * FROM products WHERE id = 4';
                      $result = mysqli_query($conn, $query);
                        if ($result):
                          if (mysqli_num_rows($result) > 0):
                            while ($product = mysqli_fetch_assoc($result)):
                    ?>
                    <img src="<?php echo $product['image']; ?>" class="img-fluid">
                      <div class="col-sm-12 col-md-6 mx-auto text-center float-right">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                          <h4><?php echo $product['name']; ?></h4>
                          <p>This Laptop is amazing! You must buy one while they last.</p>
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
              <li>List Price: <s>$1299.99</s></li>
              <li>Our Price: $899.99</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

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
      <script src="main.js"></script>
  </body>
</html>