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
$pick1Err = $pick2Err = $pick3Err = $pick4Err = $pick5Err = $nameErr = "";
$spread1 = $spread2 = $spread3 = $spread4 = $spread5 = $over_under1 = $over_under2 = $over_under3 = $over_under4 = $over_under5 = "";
$name = "User";
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "ncaapicks";
         // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			$nameErr = "Only letters and white space allowed";
		}
	}
	if (empty($_POST["spread1"])) {
		$pick1Err = "Pick is required";
	} else {
		$spread1 = test_input($_POST["spread1"]);
	}
	if (empty($_POST["over_under1"])) {
		$pick1Err = "Pick is required";
	} else {
		$over_under1 = test_input($_POST["over_under1"]);
	}

	if (empty($_POST["spread2"])) {
		$pick2Err = "Pick is required";
	} else {
		$spread2 = test_input($_POST["spread2"]);
	}
	if (empty($_POST["over_under2"])) {
		$pick2Err = "Pick is required";
	} else {
		$over_under2 = test_input($_POST["over_under2"]);
	}

	if (empty($_POST["spread3"])) {
		$pick3Err = "Pick is required";
	} else {
		$spread3 = test_input($_POST["spread3"]);
	}
	if (empty($_POST["over_under3"])) {
		$pick3Err = "Pick is required";
	} else {
		$over_under3 = test_input($_POST["over_under3"]);
	}

	if (empty($_POST["spread4"])) {
		$pick4Err = "Pick is required";
	} else {
		$spread4 = test_input($_POST["spread4"]);
	}
	if (empty($_POST["over_under4"])) {
		$pick4Err = "Pick is required";
	} else {
		$over_under4 = test_input($_POST["over_under4"]);
	}

	if (empty($_POST["spread5"])) {
		$pick5Err = "Pick is required";
	} else {
		$spread5 = test_input($_POST["spread5"]);
	}
	if (empty($_POST["over_under5"])) {
		$pick5Err = "Pick is required";
	} else {
		$over_under5 = test_input($_POST["over_under5"]);
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

	/*if( $bamaErr == '' && $gErr == '' && $osuErr == '' && $wiscErr == '' && $ndErr == '' && $nameErr == ''){
		$sql = "INSERT INTO picks (spread1, spread5, spread2, spread4, spread3, over_under5, over_under1, over_under4, over_under2, over_under3, name) VALUES ('$spread1', '$spread5', '$spread2', '$spread4', '$spread3', '$over_under5', '$over_under1', '$over_under4', '$over_under2', '$over_under3', '$name')";
		//echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully". "<br/>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }*/

    if( $pick1Err == '' && $pick2Err == '' && $pick3Err == '' && $pick4Err == '' && $pick5Err == '' && $nameErr == ''){
		$sql = "INSERT INTO picks (spread1, spread5, spread2, spread4, spread3, over_under5, over_under1, over_under4, over_under2, over_under3, name) VALUES ('$spread1', '$spread5', '$spread2', '$spread4', '$spread3', '$over_under5', '$over_under1', '$over_under4', '$over_under2', '$over_under3', '$name')";
		//echo $sql;
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
	Name:
	<input type="text" name="name">
	<span class="error">
		* <?php echo $nameErr;?>
	</span>
	<br>
	<br>
	<h3> #1 Alabama vs #19 LSU
		<span class="error">
		* <?php echo $pick1Err;?>
		</span>
	</h3>
	Alabama:
	<input type="radio" name="spread1" value="Alabama -21 (-110)" />-21 (-110)<br />
	LSU:
	<input type="radio" name="spread1" value="LSU +21 (-110)" />+21 (-110)<br />
	Over:
	<input type="radio" name="over_under1" value="Over 48.5(-110)" />48.5 (-110)<br />
	Under:
	<input type="radio" name="over_under1" value="Under 48.5 (-110)" />48.5 (-110)<br />
</div>
<br />
<br />
<div>
	<h3> #2 Georgia vs South Carolina
		<span class="error">
		* <?php echo $pick2Err;?>
		</span>
	</h3>
	Georgia:
	<input type="radio" name="spread2" value="Georgia -24 (-110)" />-24 (-110)<br />
	South Carolina:
	<input type="radio" name="spread2" value="South Carolina +24 (-110)" />+24 (-110)<br />
	Over:
	<input type="radio" name="over_under2" value="Over 45.5(-110)" />45.5 (-110)<br />
	Under:
	<input type="radio" name="over_under2" value="Under 45.5 (-110)" />45.5 (-110)<br />
</div>
<br />
<br />
<div>
	<h3> #3 Ohio State vs Iowa
		<span class="error">
		* <?php echo $pick3Err;?>
		</span>
	</h3>
	Ohio State:
	<input type="radio" name="spread3" value="Ohio State -16 (-110)" />-16 (-110)<br />
	Iowa:
	<input type="radio" name="spread3" value="Iowa +16 (-110)" />+16 (-110)<br />
	Over:
	<input type="radio" name="over_under3" value="Over 52(-110)" />52 (-110)<br />
	Under:
	<input type="radio" name="over_under3" value="Under 52 (-110)" />52 (-110)<br />
</div>
<br />
<br />
<div>
	<h3> #4 Wisconsin vs Indiana
		<span class="error">
		* <?php echo $pick4Err;?>
		</span>
	</h3>
	Wisconsin:
	<input type="radio" name="spread4" value="Wisonsin -10 (-110)" />-10 (-110)<br />
	Indiana:
	<input type="radio" name="spread4" value="Indiana +10 (-110)" />+10 (-110)<br />
	Over:
	<input type="radio" name="over_under4" value="Over 50.5(-110)" />48.5 (-120)<br />
	Under:
	<input type="radio" name="over_under4" value="Under 50.5 (-110)" />48.5 (+100)<br />
</div>
<br />
<br />
<div>
	<h3> #5 Notre Dame vs Wake Forest
		<span class="error">
		* <?php echo $pick5Err;?>
		</span>
	</h3>
	Notre Dame:
	<input type="radio" name="spread5" value="Notre Dame -13 (-110)" />-13 (-110)<br />
	Wake Forest:
	<input type="radio" name="spread5" value="Wake Forest +13 (-110)" />+13 (-110)<br />
	Over:
	<input type="radio" name="over_under5" value="Over 56.5(-110)" />55.5 (-110)<br />
	Under:
	<input type="radio" name="over_under5" value="Under 56.5 (-110)" />55.5 (-110)<br />
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
	echo "<h2>$name, your picks are:</h2>";
	echo "<h3>Alabama vs LSU Game: <br></h3>";
	echo $spread1;
	echo "<br>";
	echo $over_under1;
	echo "<br>";
	echo "<h3>Georgia vs South Carolina Game: <br></h3>";
	echo $spread2;
	echo "<br>";
	echo $over_under2;
	echo "<br>";
	echo "<h3>Ohio State vs Iowa Game: <br></h3>";
	echo $spread3;
	echo "<br>";
	echo $over_under3;
	echo "<br>";
	echo "<h3>Wisconsin vs Indiana Game: <br></h3>";
	echo $spread4;
	echo "<br>";
	echo $over_under4;
	echo "<br>";
	echo "<h3>Notre Dame vs Wake Forest Game: <br></h3>";
	echo $spread5;
	echo "<br>";
	echo $over_under5;
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
