<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File uploader</title>
	<meta name="designer" content="nima jahan bakhshian">
	<meta name="language" content="en">
	<meta name="description" content="upload and compress images with php">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- todo : fav icon  -->

	<!-- [if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif] -->

</head>

<body>

	<div class="container">

		<div class="uploader-header">
			<h1>file uploader</h1>
			<p>upload your images to compress them</p>
		</div>

		<div class="uplaoder-wrapper">
			<div class="uploader">
				<form action="process/action.php" method="POST" id="uploader" enctype="multipart/form-data">
					<i class="fa fa-upload"></i>
					<input type="file" name="user-file">

					<div class="uploader-text">
						<h3>
							Drag and drop a images or click here
						</h3>
					</div>

				</form>
			</div>

			<button type="submit" name="upload-btn" class="btn btn-upload" value="upload-btn" form="uploader">
				upload
			</button>

		</div>

		<div class="uploader-info">

			<div class="uploader-content">
				<span>original size : 888888 kB</span>
				<span>optimize size : 888888 kB</span>
				<span><i class="fa fa-download" title="download optimize images"></i></span>
				<span><i class="fa fa-remove" title="cancel"></i></span>
			</div>

		</div>

	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
	<noscript>your browser does not support the javascript</noscript>
	<script>

	</script>
</body>

</html>