<!DOCTYPE HTML>
<html>
<head>
<style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>

<?php
// define variables and set to empty values
$bamaErr = $gErr = $osuErr = $wiscErr = $ndErr = "";
$spreadBama = $spreadG = $spreadOSU = $spreadWisc = $spreadND = $over_underBama = $over_underG = $over_underOSU = $over_underWisc = $over_underND = $website = "";
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "ncaapicks";
         // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["spreadBama"])) {
		$bamaErr = "Alabama vs LSU pick is required";
	} else {
		$spreadBama = test_input($_POST["spreadBama"]);
	}
	if (empty($_POST["over_underBama"])) {
		$bamaErr = "Alabama vs LSU pick is required";
	} else {
		$over_underBama = test_input($_POST["over_underBama"]);
	}

	if (empty($_POST["spreadG"])) {
		$gErr = "Georgia vs South Carolina pick is required";
	} else {
		$spreadG = test_input($_POST["spreadG"]);
	}
	if (empty($_POST["over_underG"])) {
		$gErr = "Georgia vs South Carolina pick is required";
	} else {
		$over_underG = test_input($_POST["over_underG"]);
	}

	if (empty($_POST["spreadOSU"])) {
		$osuErr = "Ohio State vs Iowa pick is required";
	} else {
		$spreadOSU = test_input($_POST["spreadOSU"]);
	}
	if (empty($_POST["over_underOSU"])) {
		$osuErr = "Ohio State vs Iowa pick is required";
	} else {
		$over_underOSU = test_input($_POST["over_underOSU"]);
	}

	if (empty($_POST["spreadWisc"])) {
		$wiscErr = "Wisconsin vs Indiana pick is required";
	} else {
		$spreadWisc = test_input($_POST["spreadWisc"]);
	}
	if (empty($_POST["over_underWisc"])) {
		$wiscErr = "Ohio State vs Iowa pick is required";
	} else {
		$over_underWisc = test_input($_POST["over_underWisc"]);
	}

	if (empty($_POST["spreadND"])) {
		$ndErr = "Notre Dame pick is required";
	} else {
		$spreadND = test_input($_POST["spreadND"]);
	}
	if (empty($_POST["over_underND"])) {
		$osuErr = "Ohio State vs Iowa pick is required";
	} else {
		$over_underND = test_input($_POST["over_underND"]);
	}
	/////////////////////////////////////////////////////////////
	/*if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
		}
	}
	if (empty($_POST["website"])) {
		$website = "";
	} else {
		$website = test_input($_POST["website"]);
		// check if URL address syntax is valid
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
			$websiteErr = "Invalid URL";
		}
	}
	if (empty($_POST["comment"])) {
		$comment = "";
	} else {
		$comment = test_input($_POST["comment"]);
	}
	if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	} else {
		$gender = test_input($_POST["gender"]);
	}*/

	if( $bamaErr == '' && $gErr == '' && $osuErr == '' && $wiscErr == '' && $ndErr){
		$sql = "INSERT INTO picks (spreadBama, spreadND, spreadG, spreadWisc, spreadOSU, over_underND, over_underBama, over_underWisc, over_underG, over_underOSU) VALUES ('$spreadBama', '$spreadND', '$spreadG', '$spreadWisc', '$spreadOSU', '$over_underND', '$over_underBama', '$over_underWisc', '$over_underG', '$over_underOSU')";
		echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully". "<br/>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }   
    }
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);//get rid of the backslashes
	$data = htmlspecialchars($data);
	return $data;
}
    ?>

<h2>NCAA Football Week 10 Pick'Em</h2>
<p>
	<span class="error">* required field.</span>
</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<div>
	<h3> #1 Alabama vs #19 LSU
		<span class="error">
		* <?php echo $bamaErr;?>
		</span>
	</h3>
	Alabama:
	<input type="radio" name="spreadBama" value="Alabama -21 (-110)" />-21 (-110)<br />
	LSU:
	<input type="radio" name="spreadBama" value="LSU +21 (-110)" />+21 (-110)<br />
	Over: 
	<input type="radio" name="over_underBama" value="Over 65.5(-110)" />65.5 (-110)<br />
	Under:
	<input type="radio" name="over_underBama" value="Under 65.5 (-110)" />65.5 (-110)<br />
</div>
<br />
<br />
<div>
	<h3> #2 Georgia vs South Carolina
		<span class="error">
		* <?php echo $gErr;?>
		</span>
	</h3>
	Georgia:
	<input type="radio" name="spreadG" value="Georgia -24 (-110)" />-24 (-110)<br />
	South Carolina:
	<input type="radio" name="spreadG" value="South Carolina +24 (-110)" />+24 (-110)<br />
	Over: 
	<input type="radio" name="over_underG" value="Over 56.5(-115)" />56.5 (-115)<br />
	Under:
	<input type="radio" name="over_underG" value="Under 56.5 (-105)" />56.5 (-105)<br />
</div>
<br />
<br />
<div>
	<h3> #3 Ohio State vs Iowa
		<span class="error">
		* <?php echo $osuErr;?>
		</span>
	</h3>
	Ohio State:
	<input type="radio" name="spreadOSU" value="Ohio State -16 (-110)" />-16 (-110)<br />
	Iowa:
	<input type="radio" name="spreadOSU" value="Iowa +16 (-110)" />+16 (-110)<br />
	Over: 
	<input type="radio" name="over_underOSU" value="Over 62.5(-110)" />62.5 (-110)<br />
	Under:
	<input type="radio" name="over_underOSU" value="Under 62.5 (-110)" />62.5 (-110)<br />
</div>
<br />
<br />
<div>
	<h3> #4 Wisconsin vs Indiana
		<span class="error">
		* <?php echo $wiscErr;?>
		</span>
	</h3>
	Wisconsin:
	<input type="radio" name="spreadWisc" value="Wisonsin -10 (-110)" />-10 (-110)<br />
	Indiana:
	<input type="radio" name="spreadWisc" value="Indiana +10 (-110)" />+10 (-110)<br />
	Over: 
	<input type="radio" name="over_underWisc" value="Over 50.5(-110)" />50.5 (-120)<br />
	Under:
	<input type="radio" name="over_underWisc" value="Under 50.5 (-110)" />50.5 (+100)<br />
</div>
<br />
<br />
<div>
	<h3> #5 Notre Dame vs Wake Forest
		<span class="error">
		* <?php echo $ndErr;?>
		</span>
	</h3>
	Notre Dame:
	<input type="radio" name="spreadND" value="Notre Dame -13 (-110)" />-13 (-110)<br />
	Wake Forest:
	<input type="radio" name="spreadND" value="Wake Forest +13 (-110)" />+13 (-110)<br />
	Over: 
	<input type="radio" name="over_underND" value="Over 56.5(-110)" />58.5 (-110)<br />
	Under:
	<input type="radio" name="over_underND" value="Under 56.5 (-110)" />58.5 (-110)<br />
</div>
<br />
<br />
<!--
E-mail:
<input type="text" name="email" />
<span class="error">
* <?php //echo $emailErr;?>
</span>
<br />
<br />
Website:
<input type="text" name="website" />
<span class="error">
<?php //echo $websiteErr;?>
</span>
<br />
<br />
Comment:
<textarea name="comment" rows="5" cols="40"></textarea>
<br />
<br />
Gender:
<input type="radio" name="gender" value="female" />Female
<input type="radio" name="gender" value="male" />Male
<span class="error">
* <?php //echo $genderErr;?>
</span>
<br />
<br />
-->
<input type="submit" name="submit" value="Submit" />
</form>
<?php
	echo "<h2>Your Picks:</h2>";
	echo "<h3>Alabama vs LSU Game: <br></h3>";
	echo $spreadBama;
	echo "<br>";
	echo $over_underBama;
	echo "<br>";
	echo "<h3>Georgia vs South Carolina Game: <br></h3>";
	echo $spreadG;
	echo "<br>";
	echo $over_underG;
	echo "<br>";
	echo "<h3>Ohio State vs Iowa Game: <br></h3>";
	echo $spreadOSU;
	echo "<br>";
	echo $over_underOSU;
	echo "<br>";
	echo "<h3>Wisconsin vs Indiana Game: <br></h3>";
	echo $spreadWisc;
	echo "<br>";
	echo $over_underWisc;
	echo "<br>";
	echo "<h3>Notre Dame vs Wake Forest Game: <br></h3>";
	echo $spreadND;
	echo "<br>";
	echo $over_underND;
	/*
	$sql = "SELECT id, name, message FROM MyGuests";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<br/>";
		while($row = $result->fetch_assoc()) {
			echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["message"]. "<br>";
        }
	} else {
		echo "0 results";  
    }
	*/
?>
</body>
</html>