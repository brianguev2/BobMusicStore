<?php include 'adminheader.php';

	/*Displays the account information available in a
	table. */

	//connect to database
	include '../databaseConnect.php';
	global $db;

    //get tables for admin
    $query = "SELECT *
                     FROM account";
    $result = $db->prepare($query);
    $result->execute();
    $accounts = $result->fetchAll();
    $result->closeCursor();

?>

<html>
<head>
	<style>
		td
		{
			border-style: inset;
			padding-left: 10px;
			padding-right: 10px;
		}
	</style>
</head>

<body>
	<p><b>The following account information is in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		</tr>


		<!--display info for each admin-->
		<?php foreach ($accounts as $account) : ?>
			<tr>
			<td><?php echo $account['a_FName']; ?></td>
			<td><?php echo $account['a_LName']; ?></td>
			<td><?php echo $account['a_Email']; ?></td>
			<td><?php echo $account['a_Username']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>

</body>
</html>