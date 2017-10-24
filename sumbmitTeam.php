<?php
	if($_POST){}
		$con = mysqli_connect('localhost', 'jje1g16', 'jje1g16');
		$_SESSION["connect"] = $con;
		if (!$con) {
			echo '<script type="text/javascript"> console.log("Not connected to database server");</script>';

		} else {
			echo '<script type="text/javascript"> console.log("Database connected");</script>';

		}

		if (!mysqli_select_db($con, 'ug_jje1g16')) {
			echo '<script type="text/javascript"> console.log("Database not selected");</script>';

		}

		$name  = $_SESSION['username'];
		
		$formation = $_POST['formationList'];
		$goalkeeper = $_POST['goalkeeperList'];
		$defenderList1 = $_POST['defenderList1'];
		$defenderList2 = $_POST['defenderList2'];
		$defenderList3 = $_POST['defenderList3'];
		$defenderList4 = $_POST['defenderList4'];
		$midfielderList1 = $_POST['midfielderList1'];
		$midfielderList2 = $_POST['midfielderList2'];
		$midfielderList3 = $_POST['midfielderList3'];
		$midfielderList4 = $_POST['midfielderList4'];
		$attackerList1 = $_POST['attackerList1'];
		$attackerList2 = $_POST['attackerList2'];
		
		$sql = "INSERT INTO usersquad (formation, goalkeeper, defender1, defender2, defender3, defender4, midfielder1, midfielder2, midfielder3, midfielder4, attacker1, attacker2, Name)
		VALUES ('$formation', '$goalkeeper', '$defenderList1', '$defenderList2', '$defenderList3', '$defenderList4', '$midfielderList1', '$midfielderList2', '$midfielderList3', '$midfielderList4', '$attackerList1', '$attackerList2', '$name')";
		
		if (mysqli_query($con, $sql)) {
			echo '<script type="text/javascript"> console.log("User data Inserted");</script>';
		} else {
			echo '<script type="text/javascript"> console.log("Not Inserted");</script>';
		}

		header("Location: loggedInHome.php");
		exit();
	}

?>