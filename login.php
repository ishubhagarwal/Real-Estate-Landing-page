<?php session_start();
include('layouts/config.php');
include('layouts/header.php');

?>

<div class="row mw-100 mx-0" id="loginform">
	<div class="col-md-12 ">
		<h3 class="text-center">Type your login information</h3>
		<form method="post" action="login.php">
			<fieldset class="form-group">
				<input type="text" class="form-control" name="email" placeholder="Email" required="true">
			</fieldset>
			<fieldset class="form-group">

				<input type="password" class="form-control" name="password" placeholder="Password" required="true">
			</fieldset>
			<fieldset class="form-group">

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</fieldset>
		</form>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>


<?php

	$email = $password = "";


	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$pass = $_POST['password'];


		$q = "select id from login where (email= '$email' and password = '$pass')";

		$res = $con->query($q);

		if ( $res->num_rows > 0 ) {

			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;

			echo '<script> window.location.href = "leads.php" </script>';
		}else{
			echo 'No records found';
		}


	}

?>