<?php include 'customerheader.php'; 
      include 'categoryfunctions.php'; ?>
        
<!DOCTYPE html>
<html>
<!-- Creates a page which displays all categories. -->
<body>
<main>
    <aside>
        <h2>Categories</h2>
        <nav>
        <!-- Calls function from categoryfunctions.php to display categories. -->
            <?php echo all_categories() ?>
        </nav>           
    </aside>

</main>    
<?php include '../footer.php'; ?>
</body>
</html>
        
