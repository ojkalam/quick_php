<?php
include_once "inc/header.php";
Session::set("user","Kalam");
?>
	<?php

		if (isset($_POST['submit'])) {
			$inserted = $su->insertName($_POST);
		}
		if (isset($inserted)) {
			echo $inserted;
		}

	?>
	
	<h2><i class="fa fa-bell-o" aria-hidden="true"></i> User - Interface</h2>
	
	<form action="" method="post">
		
		<input type="text" name="name" >
		<input type="submit" class="btn btn-primary" name="submit">

	</form>
<?php
include_once "inc/footer.php";
?>