<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="style/style.css" />
		<title>Home</title>
	</head>

	<body>
		<div class="w3-row">
			<?php include("menu.html"); ?>
		</div>
		<h1 class="underline">Sports</h1>
		<div class="w3-row-padding">
			<div class="w3-half">
				<p>This is a website about our favorite sports</p>
				<p>This website discusses <em>MLB</em> and <em>NFL</em> news</p>
				<img alt="Sports Logo" src="images/mlbnfl.jpg" />
			</div>
			<div class="w3-half">
				<h1>On this site, you can find:</h1>
				<ul>
					<li><strong>MLB</strong> News</li>
					<li><strong>NFL</strong> News</li>
					<li>Our Favorite MLB Teams</li>
					<li>Our Favorite NFL Teams</li>
				</ul>
			</div>
		</div>
		<div class="w3-row">
			<?php include("footer.html"); ?>
		</div>
	</body>

</html>