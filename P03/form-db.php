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

// create database and table
/*
$sql = "CREATE DATABASE test;"
$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	comment VARCHAR(400),
	website VARCHAR(50),
	gender VARCHAR (30)
	)";
*/

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$servername = "localhost";
$username = "root";
$password = "student";
$dbname = "test";
         // Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
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
	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
		// check if e-mail address is well-formed
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
		}
	}
	if (empty($_POST["website"])) {
		$websiteErr = "";
	} else {
		$website = test_input($_POST["website"]);
		// check if URL address syntax is valid
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website) || (empty($_POST["website"]))) {
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
	}
	if( $genderErr == '' && $websiteErr == '' && $emailErr == '' && $nameErr == ''){
		$sql = "INSERT INTO MyGuests (name, comment, email, gender, website) VALUES ('$name', '$comment', '$email', '$gender', '$website')";
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

<h2>PHP Form Validation Example</h2>
<p>
	<span class="error">* required field.</span>
</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
Name:
<input type="text" name="name" />
<span class="error">
* <?php echo $nameErr;?>
</span>
<br />
<br />
E-mail:
<input type="text" name="email" />
<span class="error">
* <?php echo $emailErr;?>
</span>
<br />
<br />
Website:
<input type="text" name="website" />
<span class="error">
<?php echo $websiteErr;?>
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
* <?php echo $genderErr;?>
</span>
<br />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

<table border='1' cellpadding='5'>
<tr>
<th><a href='form-db.php?sort=id'>Id</a></th>
<th><a href='form-db.php?sort=name'>Name</a></th>
<th><a href='form-db.php?sort=email'>Email</a></th>
<th><a href='form-db.php?sort=website'>Website</a></th>
<th><a href='form-db.php?sort=gender'>Gender</a></th>
</tr>

<?php
	echo "<h2>Your Input:</h2>";

	/*echo "<table border='1' cellpadding='5'>";
		echo "<tr>";
			echo "<td>" . $name . "</td>";
			echo "<td>" . $email . "</td>";
			echo "<td>" . $website . "</td>";
			echo "<td>" . $comment . "</td>";
			echo "<td>" . $gender . "</td>";
		echo "</tr>";
	echo "</table>";

	echo $name;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $website;
	echo "<br>";
	echo $comment;
	echo "<br>";
	echo $gender;*/
	$sql = "SELECT * FROM MyGuests";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<br/>";
		while($row = $result->fetch_assoc()) {
				echo "<tr>";
					echo "<td>" . $row["id"] . "</td>";
					echo "<td>" . $row["name"] . "</td>";
					echo "<td>" . $row["email"] . "</td>";
					echo "<td>" . $row["website"] . "</td>";
					echo "<td>" . $row["gender"] . "</td>";
				echo "</tr>";
			//echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["message"]. "<br>";
        }
	}


	if ($_GET['sort'] == 'id')
	{
	    $sql .= " ORDER BY id";
	}
	elseif ($_GET['sort'] == 'name')
	{
	    $sql .= " ORDER BY name";
	}
	elseif ($_GET['sort'] == 'email')
	{
	    $sql .= " ORDER BY email";
	}
	elseif($_GET['sort'] == 'website')
	{
	    $sql .= " ORDER BY website";
	}
	elseif($_GET['sort'] == 'gender')
	{
	    $sql .= " ORDER BY gender";
	}

	
?>
</table>
</body>
</html>