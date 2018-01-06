<?php include 'adminheader.php';

	/*Displays the manager information available in a
	table. */

	//connect to database
	include '../databaseConnect.php';

    //get tables for employee
    $query = "SELECT *
                     FROM manager";
    $result = $db->prepare($query);
    $result->execute();
    $managers = $result->fetchAll();
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
	<p><b>The following manager information is in the system:</b></p>

	<table>
	<tbody>
		<tr>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		</tr>

		<!--display info for each employee-->
		<?php foreach ($managers as $manager) : ?>
			<tr>
			<td><?php echo $manager['manager_FName']; ?></td>
			<td><?php echo $manager['manager_LName']; ?></td>
			<td><?php echo $manager['manager_Email']; ?></td>
			<td><?php echo $manager['manager_Username']; ?></td>
			</tr>
		<?php endforeach; ?></p>

	</tbody>
	</table>
</body>
</html>