<?php include 'customerheader.php'; ?>
<html>
<head>
  <title>Search Results</title>
</head>
<body>
<h1>Search Results</h1>
<?php include '../dbh.php';
  // create short variable names
  $searchterm=trim($_POST['searchterm']);
  echo "<p>Your search: ".$searchterm."</p>";
  
  //if no search term entered
  if (!$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchterm = addslashes($searchterm);
  }

  //search the products for the search term
  $query = "SELECT * FROM product WHERE `p_Name` LIKE '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  //display results
  echo "<p>Number of products found: ".$num_results."</p>";
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Product Name: ";
     echo htmlspecialchars(stripslashes($row['p_Name']));
     echo "<br />Price: ";
     echo stripslashes($row['p_Price']);
     echo "</p>";
  }
 
  $result->free();
  $db->close();




