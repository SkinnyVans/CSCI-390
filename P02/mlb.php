<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="style/style.css" />
		<title>MLB</title>
	</head>

	<body>
		<div>
			<?php include("menu.html"); ?>
		</div>
		<div class="w3-row-padding">
			<section>
				<div class="w3-third">
					<h1 class="underline">MLB</h1>
					<h2>This page discusses <em>MLB</em> news and our favorite teams</h2>
					<img alt="MLB Logo" src="images/mlb.png" class="noborder" />
				</div>
			</section>
			<section>
				<div class="w3-third">
					<h2>Our favorite <em>MLB Teams</em>:</h2>
					<ol>
						<li class="whitetext"><code>Cincinnati Reds</code></li>
						<li class="whitetext"><code>New York Yankees</code></li>
					</ol>
				</div>
			</section>
			<section>
				<div class="w3-third">
					<h1 class="bigfont">MLB News</h1>
					<video width="320" height="240" controls>
						<source src="videos/Martinezs fourHR game.mp4" type="video/mp4" />
					</video>
					<p class="videocomment">JD Martinez hits four home runs in one game</p>
					<video width="320" height="240" controls>
						<source src="videos/Must C Stanton crushes camera.mp4" type="video/mp4" />
					</video>
					<p class="videocomment">Giancarlo Stanton hits 53rd home run of the year</p>
				</div>
			</section>
		</div>
		<div class="w3-row">
			<?php include("footer.html"); ?>
		</div>
	</body>

</html>