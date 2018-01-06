<?php include 'customerheader.php';

    include 'categoryfunctions.php';

    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    //get id of category from categories.php
    $cID = $_GET['id'];

    //get tables for category with the 'id' that was 
    //passed from categoryfunctions.php
    $queryCategory = "SELECT *
                     FROM category
                     WHERE p_Category = '$cID'";
    $result = $db->prepare($queryCategory);
    $result->bindValue('$cID', $category_id);
    $result->execute();
    $category = $result->fetch();
    $category_name = $category['categoryName'];
    $result->closeCursor();

    //get products for selected category
    $queryProducts = "SELECT * FROM product
                  WHERE p_Category = '$cID'
                  ORDER BY p_ID";
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue('$cID', $category_id);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();

?>

<!DOCTYPE html>
<html>
<!--Creates the page which shows each product in a category.-->

<body>
<main>
    <div class="container">
    <h2><?php echo $category_name; ?></h2>
    <div class="row">
    <?php foreach ($products as $product) : ?>
                <div class="col-sm-3">
                    <div class="panel panel-primary">
                        <!--Display product name.-->
                        <div class="panel-heading"><?php echo $product['p_Name']; ?></div>
                            <!--Clicking on the picture will take user to product page according to 'id'-->
                            <div class="img-responsive"><a href = "productpage.php?id=<?php echo $product['abbrvName']; ?>">
                            <!--The image displayed needs to be in images folder with png extension-->
                            <img src="../images/<?php echo $product['abbrvName'].'.png'; ?>" class="img-responsive" style="width:100%" 
                            alt="../images/<?php echo $product['abbrvName'].'.png'; ?>"></a>
                            </div>
                        <!--Display product price.-->
                        <div class="panel-footer"> $<?php echo $product['p_Price']; ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
</main>    
<?php include '../footer.php'; ?>
</body>
</html>
