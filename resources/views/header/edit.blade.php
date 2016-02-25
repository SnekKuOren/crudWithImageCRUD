<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Update Form</title>
</head>
<body>
	
	{!!Form::open(array('url' => ['header/update', $model->id], 'files' => true))!!}
		<input type="text" name="title" value="<?php echo $model->title ?>" placeholder="Title">
		
		<br>
		<input type="text" name="sub_title" value="<?php echo $model->sub_title ?>" placeholder="Sub Title">
		
		<br>
		<input type="file" name="image">
		<img src="<?php echo url('uploads/logo') ?>/<?php echo $model->image; ?>" width="100px" alt="">
		@if($errors->has('image'))

		{!!$errors->first('image')!!}
		@endif
		<br>
		<input type="submit" value="Update">
	</form>
	{!!Form::close()!!}
</body>
</html>