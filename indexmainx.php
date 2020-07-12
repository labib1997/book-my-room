<?php 

include('config/db_connect.php');
		
$sql = 'select renterid, address from renter ';
//fetch resulting result as arrows
$result = mysqli_query($conn, $sql);
$viewx = mysqli_fetch_all($result, MYSQLI_ASSOC);
//free result from memory
mysqli_free_result($result);

mysqli_close($conn);

?>	

<!DOCTYPE html>
<html>
	
<?php include('templates/headerx.php'); ?>
<h4 class="center grey-text">CHOOSE THE RIGHT HOME FOR YOU</h4>
<div class="container">
	<div class="row"> 
	<?php foreach ($viewx as $viewy){ ?>
		<div class="col s6 md4">
			<div class="card z-depth-0">
			<img src="img/iconhouse.png"class="iconhouse">
				<div class="card-content center">
					<h6> <?php echo htmlspecialchars($viewy['renterid']); ?></h6>
					<div><?php echo htmlspecialchars($viewy['address']); ?></div>
				</div>
				<div class="card-action right-align">
				<a class="brand-text" href="loginx.php" echo "you have to login first">details about flat</a>
				</div>
			</div>
		</div>	
	 <?php } ?>
	
	</div>
</div>
<?php include('templates/footer.php'); ?>

</html>