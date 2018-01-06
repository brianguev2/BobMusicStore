<?php

  /*When the admin goes to create a manager account, it
    checks that the username has not already been used.
     If not, it successfully creates the manager account.*/

  //connect to database
  include '../dbh.php';
  global $db;

  //receives user input from form 
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $user_name = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['pass']);
    $bool = true;

    //query the employee table
    $query = mysqli_query($db, "SELECT * FROM manager");

    //displaying all rows from query
    while($row = mysqli_fetch_array($query))
    {
      /*the first username row is passed on to $table_username,
      and so on until the query is finished */
      $table_username = $row['manager_Username'];

      //checks if there are any matching fields
      if($user_name == $table_username)
      {
        $bool = false;
        //tell the user that the username has been taken
        print '<script>alert("Username has been taken!");</script>';
        //redirects to createmanager.php
        print '<script>window.location.assign("createmanager.php");</script>';
      }


    }

    //if there are no conflicts of username
    if($bool)
    {
      //insert the values to table admins
      mysqli_query($db, "INSERT INTO manager (manager_FName, manager_LName, manager_Email, manager_Username, manager_Password) 
        VALUES ('$first_name', '$last_name', '$email', '$user_name', '$password')");
      //prompt to let user know registration was succesful
      print '<script>alert("Successfully registered!");</script>';
    }
  }
?>

<!DOCTYPE html>
<html>
<?php include 'adminheader.php'; ?>
  <body>
  
      <h1>Manager Account Confirmation </h1><br>
      <h4>First Name:</h4>
      <?php echo $first_name; ?><br>
      <h4>Last Name:</h4>
      <?php echo $last_name; ?><br>
      <h4>Email:</h4>
      <?php echo $email; ?><br>
      <h4>Username:</h4>
      <?php echo $user_name; ?><br>
    
      <?php include '../footer.php'; ?>

  </body>

</html>