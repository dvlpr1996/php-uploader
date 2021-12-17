<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File uploader</title>
	<meta name="designer" content="Nima jahan bakhshian">
	<meta name="language" content="en">
	<meta name="description" content="upload and compress images with php">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="shortcut icon" href="assets/img/icon.ico" type="image/x-icon" sizes="16x16 32x32">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- [if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif] -->
</head>

<body>

	<div class="container">

		<div class="uploader-header">
			<h1>file uploader</h1>
			<p>
				upload your images to compress them
			</p>
			<p>
				or upload css js files to minify them
			</p>
		</div>

		<div class="uploader-wrapper">
			<div class="uploader">
				<form action="process/action.php" method="POST" id="uploader" enctype="multipart/form-data">
					<i class="fa fa-upload"></i>
					<input type="file" name="user-file" class="input">

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
				<span>original size : <?= $original_size ?? 0 ?> KB</span>
				<span>optimize size : <?= $optimize_size ?? 0 ?> KB</span>
				<a href="http://localhost/dev/uploader/index.php?action=download">
					<i class="fa fa-download" title="download optimize images"></i>
					<a>
						<span>
							<a href="http://localhost/dev/uploader/index.php?action=cancel">
								<i class="fa fa-remove" title="cancel"></i>
							</a>
						</span>
			</div>
		</div>

	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
	<noscript>your browser does not support the javascript</noscript>
</body>

</html>