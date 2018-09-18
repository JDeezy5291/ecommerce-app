<?php
  $product_ids = array();
  // session_destroy();

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
            // add item quantity to existing product in the array
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
?>