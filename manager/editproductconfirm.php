<?php
  //connect to database
  include '../databaseConnect.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //get 'id' of product when manager clicks on product in editproduct.php
    $productID = $_GET['id'];
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $db->prepare("UPDATE product SET p_Category=:category_id, p_Name=:name, p_Price=:price,
            p_Quantity=:quantity, abbrvName=:fileToUpload, p_Description=:description WHERE abbrvName='$productID'");
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':name', $product_name);
    $stmt->bindParam(':price', $product_price);
    $stmt->bindParam(':quantity', $product_quantity);
    $stmt->bindParam(':fileToUpload', $image_name);
    $stmt->bindParam(':description', $product_description);
    //get user input from editproduct.php
    $category_id = $_POST['category_id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_quantity = $_POST['quantity'];
    $image_name = $_POST['fileToUpload']; 
    $product_description = $_POST['description'];
    //executes query
    $stmt->execute();
    //prompt to let user know edit was successful
    print '<script>alert("Successfully edited product!");</script>';
  }
?>
<?php include 'managerheader.php'; ?>
<link rel="stylesheet" type="text/css" href="../productStyle.css">
    <main>
      <h3 align="center">Product Edit Confirmation</h3>
      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">Category ID:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $category_id; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">Product Name:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_name; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">Product Price:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_price; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">Product Quantity:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_quantity; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">Image Name:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $image_name; ?></div>
        </div>
      </div>

      <div class="container" align="center">
        <div class="panel panel-default" style="width:40%;">
          <div class="panel-heading" style="background-color: #4d79ff; color: white; font-size:18px;">Product Description:</div>
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $product_description; ?></div>
        </div>
      </div>

    </main>
  </body>
</main>
</html>
