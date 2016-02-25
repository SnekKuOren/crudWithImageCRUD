<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Form</title>
</head>
<body>

	<!--if user submit, message class will appear-->
	@if(Session::has('message'))
		<span style="color:green">{!!Session::get('message')!!}</span>
	@endif
	
	{!!Form::open(array('url' => ['update', $datas->id]));!!}
		
		<input type="text" name="first_name" value="<?php echo $datas->first_name; ?>" placeholder="First Name">
		
		<br>
		<input type="text" name="last_name" value="<?php echo $datas->last_name; ?>" placeholder="Last Name">
		
		<br>
		<textarea name="address" placeholder="Address"><?php echo $datas->address; ?></textarea>
		
		<br>
		<input type="submit" value="Update">
	{!!Form::close()!!}

</body>
</html>