<?php
  session_start();
  //connecting to the Server
  include '../dbh.php';

  if($_SESSION['user_name']){
  }else{
    //redirect if user is not logged in
    header("location: homepage.php");
  }
  //get user input from paymentInfo.php
  $cardFullName = mysqli_real_escape_string($db, $_POST['cardFullName']);
  $cardSecurityCode = mysqli_real_escape_string($db, $_POST['cvv']);
  $cardNumber = mysqli_real_escape_string($db,$_POST['cardNumber']);
  $cardMonth = mysqli_real_escape_string($db,$_POST['cardMonth']);
  $cardYear = mysqli_real_escape_string($db,$_POST['cardYear']);
  $cardExpires = $cardMonth . "/" . $cardYear;
  $orderID = $_SESSION['o_ID'];

  //update the orders table with the user's info
  $query = mysqli_query($db,"SELECT * FROM orders");
  $db->query("UPDATE orders SET o_Name= '$cardFullName', o_cardNumber = '$cardNumber',
    o_cardExpires = '$cardExpires', cvv ='$cardSecurityCode'  WHERE o_ID='$orderID'");
    header("Location: orderConfirmation.php?id=$orderID");
?>
