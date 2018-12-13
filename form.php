<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Form</title>
	</head>
	<body>
		<form neme="form" method="post" action="save.php" enctype="multipart/form-data">
			<label>Name</label><input type="text"name="Name" /><br/>
			<label>Price</label><input type="text"name="Price"/><br/>
			<label>Info</label><textarea name="Info" placeholder="รายละเอียดโปรโมชั่น" class="contact-message form-control" id="Info"></textarea><br/>
			<label>image_promotion</label><input type="file"name="Image"/><br/>
			<input type="submit" name="save" value="save" />
			<a href="find.php">Find</a>
		</form>
	</body>
</html>



