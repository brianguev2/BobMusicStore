<?php include 'adminheader.php';

	/*Displays the admin information available in a
	table. */

	//connect to database
	include '../databaseConnect.php';
	global $db;

    //get tables for admin
    $queryAdmins = "SELECT *
                     FROM admins";
    $result = $db->prepare($queryAdmins);
    $result->execute();
    $admins = $result->fetchAll();
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
	<p><b>The following admin information is in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		</tr>


		<!--display info for each admin-->
		<?php foreach ($admins as $admin) : ?>
			<tr>
			<td><?php echo $admin['admin_FName']; ?></td>
			<td><?php echo $admin['admin_LName']; ?></td>
			<td><?php echo $admin['admin_Email']; ?></td>
			<td><?php echo $admin['admin_Username']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>

</body>
</html>
