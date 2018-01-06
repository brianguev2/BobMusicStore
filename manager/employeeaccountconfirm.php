<?php

  /*When the manager goes to create an employee account, it
    checks that the username has not already been used.
     If not, it successfully creates the employee account.*/

  //connect to database
  include '../dbh.php';
  global $db;

  //receives user input from form 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $user_name = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['pass']);
    $ssn = mysqli_real_escape_string($db, $_POST['ssn']);
    $bool = true;

    //query the employee table
    $query = mysqli_query($db, "SELECT * FROM employee");

    //displaying all rows from query
    while($row = mysqli_fetch_array($query))
    {
      /*the first username row is passed on to $table_username,
      and so on until the query is finished */
      $table_username = $row['e_Username'];

      //checks if there are any matching fields
      if($user_name == $table_username)
      {
        $bool = false;
        //tell the user that the username has been taken
        print '<script>alert("Username has been taken!");</script>';
        //redirects to employeecreateaccount.php
        print '<script>window.location.assign("employeecreateaccount.php");</script>';
      }


    }

    //if there are no conflicts of username
    if($bool)
    {
      //insert the values to table employee
      mysqli_query($db, "INSERT INTO employee (e_FName, e_LName, e_Phone, e_Address, e_DOB, e_Username, e_Password, SSN) 
        VALUES ('$first_name', '$last_name', '$phone', '$address', '$dob', '$user_name', '$password', '$ssn')");
      //prompt to let user know registration was succesful
      print '<script>alert("Successfully registered!");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
<?php include 'managerheader.php'; ?>
  <body>
  
      <h1>Employee Account Confirmation </h1><br>
      <h4>First Name:</h4>
      <?php echo $first_name; ?><br>
      <h4>Last Name:</h4>
      <?php echo $last_name; ?><br>
      <h4>Phone:</h4>
      <?php echo $phone; ?><br>
      <h4>Address:</h4>
      <?php echo $address; ?><br>
      <h4>Date of Birth:</h4>
      <?php echo $dob; ?><br>
      <h4>Username:</h4>
      <?php echo $user_name; ?><br>
    
      <?php include '../footer.php'; ?>

  </body>

</html>