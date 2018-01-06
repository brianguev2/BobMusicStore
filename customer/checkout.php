<?php include 'customerheader.php'; ?>
<?php
//connect to database
include '../databaseConnect.php';
//need to include shopping cart
include 'shopCart.php';
$cart= new shopCart;
//redirect to home if cart is empty and they try to checkout
if($cart->totalCartItems() <= 0){
    header("Location: homepage.php");
}

//get current customer to be used for checkout
//the session is from when the user signed into website
$user = $_SESSION['user_name'];
//query the account table where the username matches the session username
$userQuery = $db->query("SELECT * FROM account WHERE a_Username='$user'");
$row = $userQuery->fetch(PDO::FETCH_ASSOC);
//set user account ID for shopping cart session
$_SESSION['id'] = $row['a_ID'];
$id = $_SESSION['id'];
//select from the database where the user account matches the ID
$query = $db->query("SELECT * FROM account WHERE a_ID = '$id'");
$account = $query->fetch(PDO::FETCH_ASSOC);
//set user first and last name
$_SESSION['firstname'] = $account['a_FName'];
$_SESSION['lastname'] = $account['a_LName'];
//retrieve the customer's address from the orders table where the id matches
$query = $db->query("SELECT * FROM orders WHERE a_ID = '$id'");
$address = $query->fetch(PDO::FETCH_ASSOC);
$_SESSION['address'] = $address['o_Address'];
?>
<main>
  <div class="container">
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->totalCartItems() > 0){
            //get items from session
            $shopCartItems = $cart->shopCartContents();
            foreach($shopCartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>Your cart is currently empty. Select "Continue Shopping" to add items to your cart.</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->totalCartItems() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->shopCartPrice(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
      <div class="row">
        <div class="col-sm-4 col-md-4">
        <h4>Shipping Address</h4>
        <?php if (isset($account)) :?>
        <p>
          <?php echo $account['a_FName']; ?>
          <?php echo $account['a_LName']; ?></p>
          <p><?php echo $address['o_Address']; ?>
        </p>
        <?php else: ?>
        <p style="color: #b30000">
          No shipping information available at this time.
        </p>
        <?php endif; ?>  
      </div>
    </div>
    </div>
    <div class="footBtn">
        <a href="homepage.php" class="btn btn-warning">
          <i class="glyphicon glyphicon-menu-left"></i> Continue Shopping
        </a>
        <a href="shopCartAction.php?action=placeOrder" class="btn btn-success orderBtn">
          Place Order <i class="glyphicon glyphicon-menu-right"></i>
        </a>
    </div>
    </div>
</main><br>
<?php include '../footer.php'; ?>
</body>
</html>
