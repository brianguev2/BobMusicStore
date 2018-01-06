<?php
if(!isset($_REQUEST['id'])){
    header("Location: homepage.php");
}
?>
<?php include 'customerheader.php'; ?>
  <main>
    <div class="container">
      <h1>Order Status</h1>
      <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
    </div>
  </body>
</html>
