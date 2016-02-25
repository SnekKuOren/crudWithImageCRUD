<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Show data</title>
</head>
<body>

	@if(Session::has('updatemsg'))
		<span style="color:green">{!!Session::get('updatemsg')!!}</span>
	@endif

	@if(Session::has('deletemsg'))
		<span style="color:green">{!!Session::get('deletemsg')!!}</span>
	@endif
	
	<table border="1px">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Action</th>
		</tr>
	<?php 
		foreach ($datas as $value) {
	?>
		<tr>
			<td><?php echo $value->first_name; ?></td>
			<td><?php echo $value->last_name; ?></td>
			<td><?php echo $value->address; ?></td>
			<td><a href="<?php echo url('editform'); ?>/<?php echo $value->id; ?>">Edit</a> | 
			<a href="<?php echo url('delete')?>/<?php echo $value->id; ?>">Delete</a></td>
		</tr>
	<?php } ?>
	</table>
</body>
</html>