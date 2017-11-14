<!--
<!DOCTYPE HTML>
<html>
<head>
<style>
        .error {
            color: #FF0000;
        }
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 40%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            color: white;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 2px 16px;
            background-color: lightblue;
            color: white;
        }

        .modal-body {
            padding: 2px 16px;
            height: 300px;
            overflow: scroll;
        }

        .modal-footer {
            padding: 2px 16px;
            background-color: lightblue;
            color: white;
  }
</style>
</head>
-->

<?php include 'header.php';?>

<?php include 'navbar.php';?>

<body>

<?php
// define variables and set to empty values
$pick1Err = $pick2Err = $pick3Err = $pick4Err = $pick5Err = $nameErr = "";
$spread1 = $spread2 = $spread3 = $spread4 = $spread5 = $over_under1 = $over_under2 = $over_under3 = $over_under4 = $over_under5 = "";
$name = "User";
$servername = "localhost";
$username = "hartsonj";
$password = "";
$dbname = "picks";
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
  if( $pick1Err == '' && $pick2Err == '' && $pick3Err == '' && $pick4Err == '' && $pick5Err == '' && $nameErr == ''){
  	$sql = "INSERT INTO ncaaf_picks (spread1, spread5, spread2, spread4, spread3, over_under5, over_under1, over_under4, over_under2, over_under3, name) VALUES ('$spread1', '$spread5', '$spread2', '$spread4', '$spread3', '$over_under5', '$over_under1', '$over_under4', '$over_under2', '$over_under3', '$name')";
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
    
<div class="container">

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3">NCAA Football Week 12 Pick'Em</h1>
      <!--<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>-->
    </div>
  </div>

<!--<h2>NCAA Football Week 10 Pick'Em</h2>-->
<p>
	<span class="error">* required field.</span>
</p>
<!--<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">-->
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
<!--</form>-->
<input type="submit" id ="myBtn" name="submit" class="btn btn-success btn-sm" value="Place Bet" />

</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <form method="post" action="/P03/sportsbetting.php">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Place Your Bets</h2>
      Name:
    	<input type="text" name="name">
    	<span class="error">
    		*     	</span>
    	<br>
    	<br>
    </div>
    <div class="modal-body">
      <div>
        <h3> #1 Alabama vs #19 LSU
          <span class="error">
          *           </span>
        </h3>
        Alabama:
        <input type="radio" name="spread1" value="Alabama -21 (-110)"/>-21 (-110)<br />
        LSU:
        <input type="radio" name="spread1" value="LSU +21 (-110)"/>+21 (-110)<br />
        Over:
        <input type="radio" name="over_under1" value="Over 48.5 (-110)"/>48.5 (-110)<br />
        Under:
        <input type="radio" name="over_under1" value="Under 48.5 (-110)"/>48.5 (-110)<br />
      </div>
      <br />
      <br />
      <div>
        <h3> #2 Georgia vs South Carolina
          <span class="error">
          *           </span>
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
          *           </span>
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
          *           </span>
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
          *           </span>
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
      </div>
    <div class="modal-footer">
      <input type="submit" name="submit" value="Submit Bets">
    </div>
  </form>
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function() {
      modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>

<div class="container">

<?php
	if( $pick1Err == '' && $pick2Err == '' && $pick3Err == '' && $pick4Err == '' && $pick5Err == '' && $nameErr == ''){
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
	}
?>

</div>
</body>

<?php include 'footer.php';?>
