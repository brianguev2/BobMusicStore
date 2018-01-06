<?php include 'adminheader.php'; ?>
<!--The form to create a new employee account.
Info posted is sent to employeeaccountconfirm.php-->

<!DOCTYPE html>
<html>
	<body>
			<h1>Create Employee Account </h1>
			<form method="POST" action="employeeaccountconfirm.php">
			<h4>First Name:</h4>
			<input type="text" name="firstname"><br>
			<h4>Last Name:</h4>
			<input type="text" name="lastname"><br>
			<h4>Phone:</h4>
			<input type="text" name="phone"><br>
			<h4>Address:</h4>
			<input type="text" name="address"><br>
			<h4>Date of Birth:</h4>
			<input type="text" name="dob"><br><br>
			<h4>Username:</h4>
			<input type="text" name="username"><br><br>
			<h4>Password:</h4>
			<input type="password" name="pass"><br><br>
			<h4>SSN:</h4>
			<input type="text" name="ssn"><br><br>
			<input id="button" type="submit" name="submit" value="Register">
			</form>
		
			<?php include '../footer.php'; ?>
	</body>

</html>
