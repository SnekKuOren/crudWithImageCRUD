<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
</head>
<body>

	<!--if user submit, message class will appear-->
	@if(Session::has('message'))
		<span style="color:green">{!!Session::get('message')!!}</span>
	@endif
	
	{!!Form::open(array('url' => 'insert'))!!}
		<!--add validator, edit also for validator-->
		<input type="text" name="first_name" placeholder="First Name">
		<!-- @if($errors->has('first_name'))	<span style="color: red;">{!!$errors->first('first_name');!!}</span> @endif OR -->
		 
		<?php
		//error validation for first name
		if($errors->has('first_name')){
			echo $errors->first('first_name');
		}
		?>
		<br>
		<input type="text" name="last_name" placeholder="Last Name">
		<?php
		//error validation for last name
		if($errors->has('last_name')){
			echo $errors->first('last_name');
		}
		?>
		<br>
		<textarea name="address" placeholder="Address"></textarea>
		<?php
		//error validation for address
		if($errors->has('address')){
			echo $errors->first('address');
		}
		?>
		<br>
		<input type="submit" value="Submit">
	{!!Form::close()!!}

</body>
</html>