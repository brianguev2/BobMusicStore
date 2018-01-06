<?php
  //connect to database
  include '../databaseConnect.php';
  global $db;
  //get 'id' of product when user clicks on product 
  $productID = $_GET['id'];
  //select from product table and delete the product where id matches
  $stmt = $db->query("SELECT * FROM product");
  $db->exec("DELETE FROM product WHERE abbrvName = '$productID'");
?>
<?php include 'managerheader.php'; ?>
<link rel="stylesheet" type="text/css" href="../productStyle.css">
   <main>
    <h2 align="center">Product Deletion Confirmation</h2>
    <div class="container" style="padding-left: 400px;">
        <div class="panel panel-default" style="width:50%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">
          Deleted product with Filename:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $productID; ?></div>
        </div>
    </div>
    <p align="center"><a href="productlist.php">Return to Product List</a></p>
   <main>
  </body>
</html>
