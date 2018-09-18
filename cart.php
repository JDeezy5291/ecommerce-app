<?php 
  session_start();
  include 'includes/config.php';
  include 'includes/cart.inc.php';

  if (filter_input(INPUT_GET, 'action') == 'delete') {
  	// loop through products in cart until it matches w/get id variable
  	foreach ($_SESSION['shopping_cart'] as $key => $product) {
  		if ($product['id'] == filter_input(INPUT_GET, 'id')) {
  			// remove product from cart when it matches w/the get id
  			unset($_SESSION['shopping_cart'][$key]);
  		}
  	}
  	// reset session array keys so they match w/$product_ids numeric array
  	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Shopping Cart</title>
	  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">  -->
	  <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="main.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="table-responsive">
			<table class="table">
				<tr><th colspan="5"><h3>Order Details</h3></th></tr>
				<tr>
					<th width="40%">Product Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
				</tr>
	<?php 
		if (!empty($_SESSION['shopping_cart'])):
			$total = 0;

			foreach ($_SESSION['shopping_cart'] as $key => $product):	
	?>
				<tr>
					<td><?php echo $product['name']; ?></td>
					<td><?php echo $product['quantity']; ?></td>
					<td>$<?php echo $product['price']; ?></td>
					<td>$<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
					<td>
						<a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
							<div class="btn-danger">Remove</div>
						</a>
					</td>
				</tr>
	<?php
			$total = $total + ($product['quantity'] * $product['price']);
			endforeach;
	?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right">$<?php echo number_format($total, 2); ?></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="5">
	<?php
				if (isset($_SESSION['shopping_cart'])):
					if (count($_SESSION['shopping_cart']) > 0):
	?>
				<a href="#" class="btn btn-primary">Checkout</a>
	<?php endif; endif; ?>
				</td>
			</tr>
	<?php endif; ?>
			</table>
			<a href="index.php">Continue Shopping</a>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>