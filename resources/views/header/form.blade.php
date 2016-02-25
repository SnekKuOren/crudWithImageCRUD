<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	@if(Session::has('success'))
		{!!Session::get('success')!!}
	@endif

	{!!Form::open(array('url' => 'header/post', 'files' => true))!!}
		<input type="text" name="title" placeholder="Title">
		@if($errors->has('title'))
			{!!$errors->first('title')!!}
		@endif
		<br>
		<input type="text" name="sub_title" placeholder="Sub Title">
		@if($errors->has('sub_title'))
			{!!$errors->first('sub_title')!!}
		@endif
		<br>
		<input type="file" name="image">
		@if($errors->has('image'))
			{!!$errors->first('image')!!}
		@endif
		<br>
		<input type="submit" value="Submit">
	</form>
	{!!Form::close()!!}
</body>
</html>