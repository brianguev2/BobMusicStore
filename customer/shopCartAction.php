<?php 
  // initialize shopping cartclass
  include 'shopCart.php';
  $cart= new shopCart;

  // include database configuration file
  include '../databaseConnect.php';
  if(isset($_REQUEST['action']) && !empty($_REQUEST['action']))
  {
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id']))
    {
      $productID = $_GET['id'];
      $productQuantity = filter_var( $_GET["quantity"], FILTER_VALIDATE_INT);
      //get product details
      $query = $db->query("SELECT * FROM product WHERE p_ID = '$productID'");
      $row = $query->fetch(PDO::FETCH_ASSOC);
      $itemData = array(
        'id' => $row['p_ID'],
        'name' => $row['p_Name'],
        'price' => $row['p_Price'],
        'qty' => $productQuantity
      );

      $insertItem = $cart->insert($itemData);
      $redirectLoc = $insertItem?'viewCart.php':'homepage.php'; //check this
      header("Location: " . $redirectLoc);
    }
    elseif($_REQUEST['action'] == 'updateShopCartItem' && !empty($_REQUEST['id']))
    {
      $itemData = array(
        'productID' => $_REQUEST['id'],
        'qty' => $_REQUEST['qty'],
      );
      $updateItem = $cart->update($itemData);
      echo $updateItem?'ok':'err';die;
    }
    elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id']))
    {
      $deleteItem = $cart->remove($_REQUEST['id']);
      header("Location: viewCart.php");
    }
    elseif($_REQUEST['action'] == 'placeOrder' && $cart->totalCartItems() > 0 && !empty($_SESSION['id']))
    {
      //insert order with account id, total number of items, total bill, date of purchase, ship address
      $insertOrder = $db->query("INSERT INTO
        orders (a_ID, o_Quantity, o_Bill, o_Date, o_Address)
        VALUES ('".$_SESSION['id']."', '".$cart->totalCartItems()."', '".$cart->shopCartPrice()."',
        '".date("Y-m-d H:i:s")."', '".$_SESSION['address']."')");
      if($insertOrder)
      {
        $orderID = $db->lastInsertId();;
        $_SESSION['o_ID'] = $orderID;
        $sql = '';
        //get all items in cart
        $shopCartItems = $cart->shopCartContents();
        //insert into orderitems table each product in the cart
        foreach ($shopCartItems as $item) 
        {
          $sql .= "INSERT INTO orderitems (o_ID, p_ID, item_Quantity)
                   VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
        }
        $insertOrderItems = $db->exec($sql);
        //destroy the cart if the items are successfully inserted to table
        if($insertOrderItems)
        {
          $cart->destroy();
          header("Location: paymentInfo.php?id=$orderID");
        }
        //if not, remain in checkout page
        else
        {
          header("Location: checkout.php");
        }
      }
      //if not sucessfuly when inserting to order table, remain in checkout page
      else
      {
        header("Location: checkout.php");
      }
    }
    //no action
    else
    {
      header("location: homepage.php");
    }
  }
  //no action
  else
  {
    header("location: homepage.php");
  }
?>
