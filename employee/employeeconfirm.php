<?php
  /*Checks the username and password when employee
  tries to login.*/
  //start session
  session_start();
  //connect to database
  include '../dbh.php';
  global $db;
  //receives user input for login from form in employeelogin.php
  $user_name = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['pass']);
  //query the employee table
  $query = mysqli_query($db, "SELECT * FROM employee WHERE e_Username='$user_name'");
  //checks if table exists
  $exists = mysqli_num_rows($query);
  $table_users = "";
  $table_password = "";
  //if there are returning rows for username
  if($exists > 0)
  {
      //get all rows from query
      while($row = mysqli_fetch_assoc($query))
      {
        /*the first username row is passed on to $table_users,
        and so on until the query is finished*/
        $table_users = $row['e_Username'];
        /*the first password row is passed on to $table_password,
        and so on until the query is finished*/
        $table_password = $row['e_Password'];
      }
      //checks if there are any matching fields
      if(($user_name == $table_users) && ($password == $table_password))
      {
        //password matches
        if($password == $table_password)
        {
          $_SESSION['user_name'] = $user_name;
        }
      }
      //password does not match username
      else
      {
        print '<script>alert("Incorrect Password!");</script>';
        //redirects to employeelogin.php
        print '<script>window.location.assign("employeelogin.php");</script>';
      }
  }
  //if table does not exist or no existing username in table
  else
  {
    print '<script>alert("Incorrect Username!");</script>';
    //redirects to employee.php
    print '<script>window.location.assign("employeelogin.php");</script>';
  }
?>

<!DOCTYPE html>
<html>
<!--Displays page upon successful login.-->
<?php include 'employeeheader.php'; ?>
<body>

      <h1>Employee Login Confirmation </h1><br>
      <h4>Welcome, <?php echo $_SESSION['user_name']; ?>!</h4><br>
    
      <?php include '../footer.php'; ?>
  </body>

</html>