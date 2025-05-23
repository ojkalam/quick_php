
<?php
include_once "inc/header.php";

// Initialize the session and set the user session if needed
Session::set("user", "Kalam");
$users = $su->getAllUsers();
// Display a message if no users found
if (empty($users)) {
    echo "<div class='alert alert-warning'>No users found.</div>";
}

if (isset($_POST['submit'])) {
    // Example insert logic; You need to adapt it for your use case
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Assuming $su is your service class and insertUser is the function to insert data
    $inserted = $su->insertUser($name, $email, $password);
}

if (isset($inserted)) {
    echo "<div class='alert alert-success'>$inserted</div>";
}
?>
<div class="container" style="width: 90%; margin: auto;">
	<h1 class="text-center">User Database Application</h1>
	<h2><i class="fa fa-users" aria-hidden="true"></i> User List</h2>

	<!-- Table to display the list of users -->
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Check if we have users and loop through them to display each row
			if (!empty($users)) {
				foreach ($users as $user) {
					echo "<tr>";
					echo "<td>" . htmlspecialchars($user['id']) . "</td>";
					echo "<td>" . htmlspecialchars($user['name']) . "</td>";
					echo "<td>" . htmlspecialchars($user['email']) . "</td>";
					echo "</tr>";
				}
			}
			?>
		</tbody>
	</table>

	<h2><i class="fa fa-bell-o" aria-hidden="true"></i> User Insert</h2>

	<!-- Form -->
	<form action="" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input type="text" name="name" id="name" class="form-control" required>
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" name="email" id="email" class="form-control" required>
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" id="password" class="form-control" required>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="submit" class="btn btn-primary">Register</button>
			</div>
		</div>
	</form>
</div>
<?php
include_once "inc/footer.php";
?>
