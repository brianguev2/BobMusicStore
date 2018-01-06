<?php

  /*When the manager goes to add a new product in the
  database, it checks if that product already exists.*/

  //connect to database
  include '../dbh.php';
  global $db;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    //receives user input for product from form in addproduct.php
    $category_id = mysqli_real_escape_string($db, $_POST['category_id']);
    $product_name = mysqli_real_escape_string($db, $_POST['name']);
    $product_price = mysqli_real_escape_string($db, $_POST['price']);
    $image_name = mysqli_real_escape_string($db, $_POST['image']);
    $product_quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $description = mysqli_real_escape_string($db, $_POST['description']);

    $bool = true;

    //query the product table
    $query = mysqli_query($db, "SELECT * FROM product");

    //displaying all rows from query
    while($row = mysqli_fetch_array($query))
    {
      /*the first product row is passed on to $table_products,
      and so on until the query is finished */
      $table_products = $row['p_Name'];

      //if a product name that was entered matches one in the database
      if($product_name == $table_products)
      {
        $bool = false;

        //tell the user that the product already exists
        print '<script>alert("Product already exists!");</script>';
        //redirects to addproduct.php
        print '<script>window.location.assign("addproduct.php");</script>';
      }

    }
    //if the product does not exist
    if($bool)
    {
      //insert the values to table product
      mysqli_query($db, "INSERT INTO product (p_Category, p_Name, p_Price, abbrvName, p_Quantity, p_Description) 
        VALUES ('$category_id', '$product_name', '$product_price', '$image_name', '$product_quantity', '$description')");
      //prompt to let user know addition was successful
      print '<script>alert("Successfully added product!");</script>';
    }
  }
?>
<?php include 'managerheader.php'; ?>
<link rel="stylesheet" type="text/css" href="../productStyle.css">
    <main>
      <h3 align="center">Product Addition Confirmation</h3>
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
          <div class="panel-body" style="font-size:18px; color: #000"><?php echo $description; ?></div>
        </div>
      </div>

    </main>
  </body>
</main>
</html>