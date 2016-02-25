<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Show Data</title>
</head>
<body>
	@if(Session::has('success'))
	{!!Session::get('success')!!}
	@endif

	<table border="1px">
		<tr>
			<td>Title</td>
			<td>Sub Title</td>
			<td>Image</td>
			<td>Action</td>
		</tr>
		<?php
		foreach ($model as $value) {

		?>
		<tr>
			<td><?php echo $value->title; ?></td>
			<td><?php echo $value->sub_title; ?></td>
			<td><img src="<?php echo url('uploads/logo') ?>/<?php echo $value->image; ?>" width="100px" alt=""></td>
			<td><a href="<?php echo url('header/editform') ?>/<?php echo $value->id; ?>">Edit</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>