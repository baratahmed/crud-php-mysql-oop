<?php 
include 'inc/header.php';
include 'config.php';
include 'Database.php';
?>
<?php 
	$db = new Database();
	$query = "SELECT * FROM tbl_user";
	$read = $db->select($query);
?>
<?php
	if (isset($_GET['msg'])) {
		echo "<span style='color:green'>".$_GET['msg']."</span>";
	}
?>
<table class="tblone">
	<tr>
		<th width="10%">Serial No</th>
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="25%">Skill</th>
		<th width="15%">Action</th>
	</tr>
	<?php 
	$count = 1;
	if($read){?>
		<?php while($row = $read->fetch_assoc()){?>
	<tr>
		<td><?php echo $count++;?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['skill'];?></td>
		<td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
	</tr>
	<?php } ?>
    <?php } else{?>
    No Data Found!!!
    <?php }?>
</table>
<a href="create.php">Insert Data</a>
<?php include 'inc/footer.php'; ?>