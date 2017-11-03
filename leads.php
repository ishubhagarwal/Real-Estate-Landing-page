<?php session_start();
include('layouts/config.php');
	if(array_key_exists('email',$_SESSION) && !empty($_SESSION['email'])){
	}else{
		echo '<script> window.location.href = "login.php" </script>';
	}

				// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		$q = "select * from lead order by created_at desc";

		$res = mysqli_query($con,$q) or die($q);

		$res_count = mysqli_num_rows($res);


?>
<?php include('layouts/header.php'); ?>
<div class="row mw-100 px-5">
	<div class="col-12">
		<?php if($res_count < 1) { ?>
		<h1>No leads found</h1>
		<?php }else{ ?>
		<p class="buttonstyle"><a href="export-leads.php" class="button">Export Leads to Excel</a>&nbsp;&nbsp;<a href="logout.php" class="button">Logout</a></p>
		<table class="table table-bordered table-hover table-responsive">
			<thead class="table-inverse">
				<tr>
					<th>#</th>
					<th>Date</th>
					<th>Name</th>
					<th>Email</th>
					<th>Contact No</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=1;
				while($row=mysqli_fetch_array($res)){ ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
				</tr>
				<?php
					$i++;
				}?>
			</tbody>
		</table>
		<?php
		 } ?>
	</div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


</body>
</html>
