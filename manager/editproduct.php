<?php
  //connect to database
  include '../databaseConnect.php';
  global $db;
  //get 'id' of product when admin clicks on product in productlist.php
  $productID = $_GET['id'];
  //select from product table where the id matches
	$query = "SELECT * FROM product
              WHERE abbrvName = '$productID'";
  $statement = $db->prepare($query);
  $statement->execute();
  $products = $statement->fetchAll();
  $statement->closeCursor();
  //select from categories table to display in drop-down
  $queryAllCategories = 'SELECT * FROM category
                         ORDER BY p_Category';
  $statement2 = $db->prepare($queryAllCategories);
  $statement2->execute();
  $categories = $statement2->fetchAll();
  $statement2->closeCursor();
?>
<?php include 'managerheader.php'; ?>
<link rel="stylesheet" type="text/css" href="../productStyle.css">

    <main>
      <form method="POST" action="editproductconfirm.php?id=<?php echo $products[0]['abbrvName']; ?>"
            style="padding-left: 300px; padding-right: 300px">
      <h1>Edit Product </h1><br>
      <!--Drop-down takes on value of category chosen by manager-->
      <h3>Category:</h3>
      <select name="category_id" class="btn btn-primary dropdown-toggle"
              type="button" data-toggle="dropdown"
              style="background-color: #004080; font-size: 20px; border-color:#004080;">
     <?php foreach ($categories as $category) :
              if ($category['p_Category'] == $product['p_Category']){
                $selected = 'selected';
              }else{
                $selected = '';
              }
     ?>
      <option style="background-color:white; color:black;" value="<?php echo $category['p_Category']; ?>"<?php echo $selected ?>>
       <?php echo htmlspecialchars($category['categoryName']); ?>
      </option>
     <?php endforeach; ?>
     </select><br>
       <!--Allows manager to edit the product by echoing the product details stored in the database-->
      <div class="form-group">
        <h3>Name:</h3>
        <input type="text" name="name" class="form-control"
              value="<?php echo $products[0]['p_Name']; ?>" required><br>
      </div>
      <div class="form-group">
        <h3>Price:</h3>
        <input type="text" name="price" class="form-control" placeholder="0.00" pattern="^\d*(\.\d{2}$)?"
               value="<?php echo $products[0]['p_Price']; ?>" required><br>
      </div>
      <div class="form-group">
        <h3>Image Filename:</h3>
	<input type="text" name="fileToUpload" class="form-control" value="<?php echo $products[0]['abbrvName']; ?>" required><br><br>
      </div>
      <div class="form-group">
        <h3>Quantity:</h3>
	<input type="text" name="quantity" class="form-control" value="<?php echo $products[0]['p_Quantity']; ?>" required><br><br>
      </div>
      <div class="form-group">
	<h3>Description:</h3>
	<textarea rows="10" cols="50" name="description" class="form-control" required><?php echo $products[0]['p_Description']; ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary"/>Submit</button>
      </form><br>
      </main>
  </body>
</html>
