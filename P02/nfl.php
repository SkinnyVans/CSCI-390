<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="style/style.css" />
		<title>NFL</title>
	</head>

	<body>
		<div>
			<?php include("menu.html"); ?>
		</div>
		<div class="w3-row-padding">
			<section>
				<div class="w3-third">
					<h1 class="underline">NFL</h1>
					<h2>This page discusses <em>NFL</em> news and our favorite teams</h2>
					<img alt="NFL Logo" src="images/nfl.png" class="noborder"/>
				</div>
			</section>
			<section>
				<div class="w3-third">
					<h2>Our favorite <em>NFL Teams</em>:</h2>
					<ol>
						<li class="whitetext"><code>Indianapolis Colts</code></li>
						<li class="whitetext"><code>Tampa Bay Buccaneers</code></li>
						<li class="whitetext"><code>Buffalo Bills</code></li>
					</ol>
				</div>
			</section>
			<section>
				<div class="w3-third">
					<h1 class="bigfont">NFL News</h1>
					<video width="320" height="240" controls>
						<source src="videos/NFL offseason in 155 seconds.mp4" type="video/mp4" />
					</video>
					<p class="videocomment">NFL offseason summary</p>
				</div>
			</section>
		</div>
		<div class="w3-row">
			<?php include("footer.html"); ?>
		</div>
	</body>

</html>