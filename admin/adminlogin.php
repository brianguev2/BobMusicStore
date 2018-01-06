<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>E-commerce Website</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="productStyle.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="jumbotron" style="background-color:#CCD1D1;">
            <div class="container text-center">
                <h1>Super Music Town</h1>
                <p>Striving to bring you better products, everyday</p>
            </div>
    </div>
<div style="background-color:#CCD1D1;">
    <div class="container">
       <div class="jumbotron" style="background-color:#337ab7;">
            <h2>Welcome To Bob's Music Store!</h2> 
            <h3>Admin Login </h3>
            <br></br>
            <form method="POST" action="adminconfirm.php">
           <div class="form-group"> <span class="glyphicon glyphicon-user"></span>
        <label for="usr">Username:</label> 
         <input type="text" class="form-control" id="usr" name="username" required>
           </div>
           <div class="form-group"> <div class="form-group"> <span class="glyphicon glyphicon-lock"></span>
                 <label for="pwd">Password:</label>
                 <input type="password" class="form-control" id="pwd" name="pass" required>
           </div>
           <button type="submit" name="submit" class="btn btn-primary active">Log In</button>
           </form>
           </div>
       </div>
       <div class="row">
</div>
</div>
<div class="jumbotron" style="background-color:#CCD1D1;">
<p align="center"><a href="../index.html">Return to Index</a></p>
  
</div>
<div class="container">
</div>
    </body>
</html>
