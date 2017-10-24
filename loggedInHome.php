<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Fantasy Football</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="test.css"/>

    </head>

    <body>

    <div id = "fullContainer">

        <div id = "innerContainer">

            <div id = "header">
                <div id = "menuItemsLoggedIn">   
                    <a href="index.php"><button id="button1" class = "topButtons">Home</button></a>
                    <a href="info.php"><button id="button2" class = "topButtons">Rules of the Game</button></a>
                      
					<a id="logOutButton" href="logout.php">Log Out</a>
			   </div>
                
            </div>

            <div id = "Content">

                <br>

                <div id = "leftContent">
					<h2> Choose your Squad</h2>
					
					<form id="selectTeamForm"  method="post"action="">
						Formation:
						<select id="formationList" name="formationList" style="width: 175px">
							<option value="fourFourTwo"> 4-4-2</option>
							<option value="fourThreeThree"> 4-3-3</option>
							<option value="fourThreeTwoOne"> 4-3-2-1 </option>
						</select>
						<br><br><br>
						Goalkeeper:
						<select id="goalkeeperList" name="goalkeeperList" style="width: 175px">
							<option value="Choose a goalkeeper"></option>
							<option value="David De Gea">De Gea (90)</option>
							<option value="Petr Cech"> Cech (86)</option>
							<option value="Kasper Schmeichel"> Schmeichel (83)</option>
							<option value="Jack Butland"> Butland (81)</option>
						</select>
						<br><br><br>

							Defence:
							<select class="defenderList" id="defenderList1" name="defenderList1" style="width: 175px">
								<option value="Choose a defender" selected></option>
								<option value="Shkodran Mustafi"> Mustafi (87)</option>
								<option value="David Luiz"> Luiz (86)</option>
								<option value="Cesar Azpilicueta"> Azpilicueta (85)</option>
								<option value="Vincent Kompany"> Kompany (85)</option>
								<option value="Gary Cahill"> Cahill (84)</option>
								<option value="Nicolas Otamendi"> Otamendi (83)</option>
								<option value="Tiemoue Bakayoko"> Bakayoko (82)</option>
								<option value="Marouane Fellaini"> Fellaini (79)</option>
							</select>
							<select class="defenderList" id="defenderList2" name="defenderList2" style="width: 175px">
								<option value="Choose a defender"></option>
								<option value="Shkodran Mustafi"> Mustafi (87)</option>
								<option value="David Luiz"> Luiz (86)</option>
								<option value="Cesar Azpilicueta"> Azpilicueta (85)</option>
								<option value="Vincent Kompany"> Kompany (85)</option>
								<option value="Gary Cahill"> Cahill (84)</option>
								<option value="Nicolas Otamendi"> Otamendi (83)</option>
								<option value="Tiemoue Bakayoko"> Bakayoko (82)</option>
								<option value="Marouane Fellaini"> Fellaini (79)</option>
							</select>
							<br><br>
							<div id="secondLineDefence">
								<select class="defenderList" id="defenderList3" name="defenderList3" style="width: 175px">
									<option value="Choose a defender"></option>
									<option value="Shkodran Mustafi"> Mustafi (87)</option>
									<option value="David Luiz"> Luiz (86)</option>
									<option value="Cesar Azpilicueta"> Azpilicueta (85)</option>
									<option value="Vincent Kompany"> Kompany (85)</option>
									<option value="Gary Cahill"> Cahill (84)</option>
									<option value="Nicolas Otamendi"> Otamendi (83)</option>
									<option value="Tiemoue Bakayoko"> Bakayoko (82)</option>
									<option value="Marouane Fellaini"> Fellaini (79)</option>
								</select>
								<select class="defenderList" id="defenderList4" name="defenderList4" style="width: 175px">
									<option value="Choose a defender"></option>
									<option value="Shkodran Mustafi"> Mustafi (87)</option>
									<option value="David Luiz"> Luiz (86)</option>
									<option value="Cesar Azpilicueta"> Azpilicueta (85)</option>
									<option value="Vincent Kompany"> Kompany (85)</option>
									<option value="Gary Cahill"> Cahill (84)</option>
									<option value="Nicolas Otamendi"> Otamendi (83)</option>
									<option value="Tiemoue Bakayoko"> Bakayoko (82)</option>
									<option value="Marouane Fellaini"> Fellaini (79)</option>
								</select>
							</div>

						<br><br>
						Midfield:
						<select class="midfielderList" id="midfielderList1" name="midfielderList1" style="width: 175px">
							<option value="Choose a midfielder"></option>
							<option value="Kevin De Bruyne"> De Bruyne (89)</option>
							<option value="Mesut Ozil"> Ozil (88)</option>
							<option value="Cesc Fabregas"> Fabregas (86)</option>
							<option value="Henrikh Mkhitaryan"> Mkhitaryan (85)</option>
							<option value="Dele Alli"> Alli (84)</option>
							<option value="Anthony Martial"> Martial (82)</option>
							<option value="Jack Wilshere"> Wilshere (81)</option>
							<option value="Danny Drinkwater"> Drinkwater (80)</option>
						</select>
						<select class="midfielderList" id="midfielderList2" name="midfielderList2" style="width: 175px">
							<option value="Choose a midfielder"></option>
							<option value="Kevin De Bruyne"> De Bruyne (89)</option>
							<option value="Mesut Ozil"> Ozil (88)</option>
							<option value="Cesc Fabregas"> Fabregas (86)</option>
							<option value="Henrikh Mkhitaryan"> Mkhitaryan (85)</option>
							<option value="Dele Alli"> Alli (84)</option>
							<option value="Anthony Martial"> Martial (82)</option>
							<option value="Jack Wilshere"> Wilshere (81)</option>
							<option value="Danny Drinkwater"> Drinkwater (80)</option>
						</select>
						<br><br>
						<div id="secondLineMidfield">
							<select class="midfielderList" id="midfielderList3" name="midfielderList3" style="width: 175px">
								<option value="Choose a midfielder"></option>
								<option value="Kevin De Bruyne"> De Bruyne (89)</option>
								<option value="Mesut Ozil"> Ozil (88)</option>
								<option value="Cesc Fabregas"> Fabregas (86)</option>
								<option value="Henrikh Mkhitaryan"> Mkhitaryan (85)</option>
								<option value="Dele Alli"> Alli (84)</option>
								<option value="Anthony Martial"> Martial (82)</option>
								<option value="Jack Wilshere"> Wilshere (81)</option>
								<option value="Danny Drinkwater"> Drinkwater (80)</option>
							</select>
							<select class="midfielderList" id="midfielderList4" name="midfielderList4" style="width: 175px">
								<option value="Choose a midfielder"></option>
								<option value="Kevin De Bruyne"> De Bruyne (89)</option>
								<option value="Mesut Ozil"> Ozil (88)</option>
								<option value="Cesc Fabregas"> Fabregas (86)</option>
								<option value="Henrikh Mkhitaryan"> Mkhitaryan (85)</option>
								<option value="Dele Alli"> Alli (84)</option>
								<option value="Anthony Martial"> Martial (82)</option>
								<option value="Jack Wilshere"> Wilshere (81)</option>
								<option value="Danny Drinkwater"> Drinkwater (80)</option>
							</select>
						</div>
						<br><br>
						Attack:
						<select class="attackerList" id="attackerList1" name="attackerList1" style="width: 175px">
							<option value="Choose an attacker"></option>
							<option value="Sergio Aguero"> Aguero (89)</option>
							<option value="Zlatan Ibrahimovic"> Ibrahimovic (88)</option>
							<option value="Christian Eriksen"> Eriksen (87)</option>
							<option value="Alexandre Lacazette"> Lacazette (85)</option>
							<option value="Alvaro Morata"> Morata (84)</option>
							<option value="Daniel Sturridge"> Sturridge (82)</option>
							<option value="Christian Benteke"> Benteke (81)</option>
							<option value="Jermain Defoe"> Defoe (80)</option>
						</select>
						<select class="attackerList" id="attackerList2" name="attackerList2" style="width: 175px">
							<option value="Choose an attacker"></option>
							<option value="Sergio Aguero"> Aguero (89)</option>
							<option value="Zlatan Ibrahimovic"> Ibrahimovic (88)</option>
							<option value="Christian Eriksen"> Eriksen (87)</option>
							<option value="Alexandre Lacazette"> Lacazette (85)</option>
							<option value="Alvaro Morata"> Morata (84)</option>
							<option value="Daniel Sturridge"> Sturridge (82)</option>
							<option value="Christian Benteke"> Benteke (81)</option>
							<option value="Jermain Defoe"> Defoe (80)</option>
						</select>
						<br><br>
						<h3 id="playerCosts">Player Costs: 0</h3>
						<input type="submit" id="submitTeam" value="Submit Team" name="submitTeam">
					</form>
					
					<!-- Connects to database and retrieves $_POST['username'] and     $_POST['email']-->
					<?php
							
                        if (isset($_SESSION['username'])) {
                            $name = $_SESSION['username'];
                            echo "<h3>Hello $name </h3> <br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                        }




//                                session_start();
//                            
//                                if( $_SESSION['submit'] == $_POST['submit'] && 
//                                     isset($_SESSION['submit'])){
//                                    // user double submitted 
//                                }
//                                else {
//                                    // user submitted once
//                                    $_SESSION['submit'] = $_POST['submit'];        
//                                } 


                        echo '<script type="text/javascript"> console.log("msqli_connect called");</script>';

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
                        
                       
                        
                        $readSql = "SELECT * FROM usersquad";

                        if ($result = mysqli_query($con, $readSql)) {
                            echo '<script type="text/javascript"> console.log("Query executed");</script>';
                            if ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                echo '<script type="text/javascript"> console.log("'.$row[2].'");</script>';
                                $displayFormation = $row[0];
                                $displayGoalkeeper = $row[1];
                                $displayDefender1 = $row[2];
                                $displayDefender2 = $row[3];
                                $displayDefender3 = $row[4];
                                $displayDefender4 = $row[5];
                                $displayMidfielder1 = $row[6];
                                $displayMidfielder2 = $row[7];
                                $displayMidfielder3 = $row[8];
                                $displayMidfielder4 = $row[9];
                                $displayAttacker1 = $row[10];
                                $displayAttacker2 = $row[11];
                                
                               
                                
                            }
                            else{
                                echo '<script type="text/javascript"> console.log("Row Query failed");</script>';
                            }
                        } else {
                            echo '<script type="text/javascript"> console.log("Query failed");</script>';
                        }
                    
                    
						if (!empty($_POST)){
							if (isset($_POST['uniqid']) AND $_POST['uniqid'] == $_SESSION['uniqid']) {
								echo '<script type="text/javascript"> console.log("Kappa1")</script><br>';
								// can't submit again
							} else {
                                
								// echo '<script type="text/javascript"> console.log('.$_SESSION['formation'].');</script>';
								$name  = $_SESSION['username'];
								
								if(isset($_POST['formationList'])){
									$formation = $_POST['formationList'];
									//$_SESSION['formation'] = $formation;
								}
								if(isset($_POST['goalkeeperList'])){
									$goalkeeper = $_POST['goalkeeperList'];
								}
								if(isset($_POST['defenderList1'])){
									$defenderList1 = $_POST['defenderList1'];
								}
								if(isset($_POST['defenderList2'])){
									$defenderList2 = $_POST['defenderList2'];
								}
								if(isset($_POST['defenderList3'])){
									$defenderList3 = $_POST['defenderList3'];
								}
								if(isset($_POST['defenderList4'])){
									$defenderList4 = $_POST['defenderList4'];
								}
								if(isset($_POST['midfielderList1'])){
									$midfielderList1 = $_POST['midfielderList1'];
								}
								if(isset($_POST['midfielderList2'])){
									$midfielderList2 = $_POST['midfielderList2'];
								}
								if(isset($_POST['midfielderList3'])){
									$midfielderList3 = $_POST['midfielderList3'];
								}
								if(isset($_POST['midfielderList4'])){
									$midfielderList4 = $_POST['midfielderList4'];
								}
								if(isset($_POST['attackerList1'])){
									$attackerList1 = $_POST['attackerList1'];
								}
								if(isset($_POST['attackerList2'])){
									$attackerList2 = $_POST['attackerList2'];
								}
								echo "<script type='text/javascript'> console.log('".$formation."');</script>";
                                
								$insertSql = "INSERT INTO usersquad (formation, goalkeeper, defender1, defender2, defender3, defender4, midfielder1, midfielder2, midfielder3, midfielder4, attacker1, attacker2, Name)
											 VALUES ('".$formation."', '".$goalkeeper."', '".$defenderList1."', '".$defenderList2."', '".$defenderList3."', '".$defenderList4."', '".$midfielderList1."', '".$midfielderList2."', '".$midfielderList3."', '".$midfielderList4."', '".$attackerList1."', '".$attackerList2."', '".$name."')";
								
								if (mysqli_query($con, $insertSql)) {
									echo '<script type="text/javascript"> console.log("User data Inserted");</script>';
								} else {
									echo '<script type="text/javascript"> console.log("Not Inserted");</script>';
								}

								$_SESSION['uniqid'] = $_POST['uniqid'];
							}
						}
						
					?>
                </div>

                <div id = "rightContent">
						<h2 style="text-align:center"> Saved Squad </h2>
                </div>
                 <br>

                </div>
                <div id = "divideLine1">
                </div>
                <div id = "divideLine2">
                </div>
                <div id = "divideLine3">
                </div>
                <div id = "footerArea">
                    <a href="index.php" class="footerButtons">Home</a> 
                    <a href="info.php" class="footerButtons">Rules of the Game</a>  
                </div>

            </div>    
        </div>


        <script type="text/javascript">
            function validate1() {
                var x = document.forms["myForm"]["form1"].value;
                if (x == "") {
                    alert("Enter name and email.");
                    return false;
                }
            }
			
			var playerCosts = 0;
			
			document.getElementById('formationList').addEventListener('change', function () {
				var optionFormation = document.getElementById("formationList");
				var formationText = optionFormation.options[optionFormation.selectedIndex].text;
				if(formationText == "4-4-2"){
					
				}
				else if(formationText == "4-3-3"){
					
				}
				else if(formationText == "4-4-1-1"){
					
				}

            });
			var currentSelectedGoalkeeperPrice = 0;
			document.getElementById('goalkeeperList').addEventListener('change', function () {
				var optionGoalkeeper = document.getElementById("goalkeeperList");
				var goalkeeper = optionGoalkeeper.options[optionGoalkeeper.selectedIndex].text;
				if(currentSelectedGoalkeeperPrice > 0){
					playerCosts = playerCosts - currentSelectedGoalkeeperPrice;
				}
				if(goalkeeper == "De Gea (90)"){
					playerCosts = playerCosts + 10000000;
					currentSelectedGoalkeeperPrice = 10000000;
				}else if(goalkeeper == "Cech (86)"){
					playerCosts = playerCosts + 6000000;
					currentSelectedGoalkeeperPrice = 6000000;
				}else if(goalkeeper == "Schmeichel (83)"){
					playerCosts = playerCosts + 3500000;
					currentSelectedGoalkeeperPrice = 3500000;
				}else if(goalkeeper == "Butland (81)"){
					playerCosts = playerCosts + 2000000;
					currentSelectedGoalkeeperPrice = 2000000;
				}
				console.log(playerCosts);
                document.getElementById("playerCosts").innerHTML = "Player Costs: " + playerCosts;
			});
			
			var currentSelectedFirstDefenderPrice = 0;
			var currentSelectedSecondDefenderPrice = 0;
			var currentSelectedThirdDefenderPrice = 0;
			var currentSelectedFourthDefenderPrice = 0;
			var defenderNameArray = [currentSelectedFirstDefenderPrice,currentSelectedSecondDefenderPrice,currentSelectedThirdDefenderPrice,currentSelectedFourthDefenderPrice];
			function defenceCosts(evt) {
				var optionDefender = evt.target;
				var defender = optionDefender.options[optionDefender.selectedIndex].text;
				var currentDefender;
				if(optionDefender.id == "defenderList1"){
					currentDefender = 1;
					if(defenderNameArray[0] > 0){
						playerCosts = playerCosts - defenderNameArray[currentDefender - 1];
					}
				}else if(optionDefender.id == "defenderList2"){
					currentDefender = 2;
					if(defenderNameArray[1] > 0){
						playerCosts = playerCosts - defenderNameArray[currentDefender - 1];
					}
				}else if(optionDefender.id == "defenderList3"){
					currentDefender = 3;
					if(defenderNameArray[2] > 0){
						playerCosts = playerCosts - defenderNameArray[currentDefender - 1];
					}
				}else if(optionDefender.id == "defenderList4"){
					currentDefender = 4;
					if(defenderNameArray[3] > 0){
						playerCosts = playerCosts - defenderNameArray[currentDefender - 1];
					}
				}
				
				if(defender == "Mustafi (87)"){
					playerCosts = playerCosts + 10000000;
					defenderNameArray[currentDefender - 1] = 10000000;
				}else if(defender == "Luiz (86)"){
					playerCosts = playerCosts + 9000000;
					defenderNameArray[currentDefender - 1] = 9000000;
				}else if(defender == "Azpilicueta (85)"){
					playerCosts = playerCosts + 8000000;
					defenderNameArray[currentDefender - 1] = 8000000;
				}else if(defender == "Kompany (85)"){
					playerCosts = playerCosts + 7000000;
					defenderNameArray[currentDefender - 1] = 7000000;
				}else if(defender == "Cahill (84)"){
					playerCosts = playerCosts + 6000000;
					defenderNameArray[currentDefender - 1] = 6000000;
				}else if(defender == "Otamendi (83)"){
					playerCosts = playerCosts + 4500000;
					defenderNameArray[currentDefender - 1] = 4500000;
				}else if(defender == "Bakayoko (82)"){
					playerCosts = playerCosts + 3500000;
					defenderNameArray[currentDefender - 1] = 3500000;
				}else if(defender == "Fellaini (79)"){
					playerCosts = playerCosts + 1500000;
					defenderNameArray[currentDefender - 1] = 1500000;
				}
				console.log(playerCosts);
                document.getElementById("playerCosts").innerHTML = "Player Costs: " + playerCosts;
			};
				

			document.getElementById('defenderList1').addEventListener('change', defenceCosts);
			document.getElementById('defenderList2').addEventListener('change', defenceCosts);
			document.getElementById('defenderList3').addEventListener('change', defenceCosts);
			document.getElementById('defenderList4').addEventListener('change', defenceCosts);
			
			
			
			var currentSelectedFirstMidfielderPrice = 0;
			var currentSelectedSecondMidfielderPrice = 0;
			var currentSelectedThirdMidfielderPrice = 0;
			var currentSelectedFourthMidfielderPrice = 0;
			var midfielderNameArray = [currentSelectedFirstMidfielderPrice,currentSelectedSecondMidfielderPrice,currentSelectedThirdMidfielderPrice,currentSelectedFourthMidfielderPrice];
			function midfieldCosts(evt) {
				
				var optionMidfielder = evt.target;
				var midfielder = optionMidfielder.options[optionMidfielder.selectedIndex].text;
				var currentMidfielder;
				if(optionMidfielder.id == "midfielderList1"){
					currentMidfielder = 1;
					if(midfielderNameArray[0] > 0){
						playerCosts = playerCosts - midfielderNameArray[currentMidfielder - 1];
					}
				}else if(optionMidfielder.id == "midfielderList2"){
					currentMidfielder = 2;
					if(midfielderNameArray[1] > 0){
						playerCosts = playerCosts - midfielderNameArray[currentMidfielder - 1];
					}
				}else if(optionMidfielder.id == "midfielderList3"){
					currentMidfielder = 3;
					if(midfielderNameArray[2] > 0){
						playerCosts = playerCosts - midfielderNameArray[currentMidfielder - 1];
					}
				}else if(optionMidfielder.id == "midfielderList4"){
					currentMidfielder = 4;
					if(midfielderNameArray[3] > 0){
						playerCosts = playerCosts - midfielderNameArray[currentMidfielder - 1];
					}
				}
								
				if(midfielder == "De Bruyne (89)"){
					playerCosts = playerCosts + 10000000;
					midfielderNameArray[currentMidfielder - 1] = 10000000;
				}else if(midfielder == "Ozil (88)"){
					playerCosts = playerCosts + 9000000;
					midfielderNameArray[currentMidfielder - 1] = 9000000;
				}else if(midfielder == "Fabregas (86)"){
					playerCosts = playerCosts + 7000000;
					midfielderNameArray[currentMidfielder - 1] = 7000000;
				}else if(midfielder == "Mkhitaryan (85)"){
					playerCosts = playerCosts + 6000000;
					midfielderNameArray[currentMidfielder - 1] = 6000000;
				}else if(midfielder == "Alli (84)"){
					playerCosts = playerCosts + 5000000;
					midfielderNameArray[currentMidfielder - 1] = 5000000;
				}else if(midfielder == "Martial (83)"){
					playerCosts = playerCosts + 4000000;
					midfielderNameArray[currentMidfielder - 1] = 4000000;
				}else if(midfielder == "Wilshere (81)"){
					playerCosts = playerCosts + 2500000;
					midfielderNameArray[currentMidfielder - 1] = 2500000;
				}else if(midfielder == "Drinkwater (80)"){
					playerCosts = playerCosts + 2000000;
					midfielderNameArray[currentMidfielder - 1] = 2000000;
				}
				console.log(playerCosts);
                document.getElementById("playerCosts").innerHTML = "Player Costs: " + playerCosts;
			};
			
			document.getElementById('midfielderList1').addEventListener('change', midfieldCosts);
			document.getElementById('midfielderList2').addEventListener('change', midfieldCosts);
			document.getElementById('midfielderList3').addEventListener('change', midfieldCosts);
			document.getElementById('midfielderList4').addEventListener('change', midfieldCosts);
			
			
			var currentSelectedFirstAttackerPrice = 0;
			var currentSelectedSecondAttackerPrice = 0;
			var attackerNameArray = [currentSelectedFirstAttackerPrice,currentSelectedSecondAttackerPrice];
			function attackCosts(evt) {
				
				var optionAttacker = evt.target;
				var attacker = optionAttacker.options[optionAttacker.selectedIndex].text;
				var currentAttacker;
				if(optionAttacker.id == "attackerList1"){
					currentAttacker = 1;
					if(attackerNameArray[0] > 0){
						playerCosts = playerCosts - attackerNameArray[currentAttacker - 1];
					}
				}else if(optionAttacker.id == "attackerList2"){
					currentAttacker = 2;
					if(attackerNameArray[1] > 0){
						playerCosts = playerCosts - attackerNameArray[currentAttacker - 1];
					}
				}

				if(attacker == "Aguero (89)"){
					playerCosts = playerCosts + 10000000;
					attackerNameArray[currentAttacker - 1] = 10000000;
				}else if(attacker == "Ibrahimovic (88)"){
					playerCosts = playerCosts + 9000000;
					attackerNameArray[currentAttacker - 1] = 9000000;
				}else if(attacker == "Eriksen (87)"){
					playerCosts = playerCosts + 7000000;
					attackerNameArray[currentAttacker - 1] = 7000000;
				}else if(attacker == "Lacazette (85)"){
					playerCosts = playerCosts + 6000000;
					attackerNameArray[currentAttacker - 1] = 6000000;
				}else if(attacker == "Morata (84)"){
					playerCosts = playerCosts + 5000000;
					attackerNameArray[currentAttacker - 1] = 5000000;
				}else if(attacker == "Sturridge (82)"){
					playerCosts = playerCosts + 3500000;
					attackerNameArray[currentAttacker - 1] = 3500000;
				}else if(attacker == "Benteke (81)"){
					playerCosts = playerCosts + 2500000;
					attackerNameArray[currentAttacker - 1] = 2500000;
				}else if(attacker == "Defoe (80)"){
					playerCosts = playerCosts + 2000000;
					attackerNameArray[currentAttacker - 1] = 2000000;
				}
				console.log(playerCosts);
                document.getElementById("playerCosts").innerHTML = "Player Costs: " + playerCosts;
			};
			
			document.getElementById('attackerList1').addEventListener('change', attackCosts);
			document.getElementById('attackerList2').addEventListener('change', attackCosts);

			
        </script>
        
        <?php
        
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Formation: '.$displayFormation.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
        
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Goalkeeper: '.$displayGoalkeeper.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
        
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Defender 1: '.$displayDefender1.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Defender 2: '.$displayDefender2.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Defender 3: '.$displayDefender3.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Defender 4: '.$displayDefender4.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
        
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Midfielder 1: '.$displayMidfielder1.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Midfielder 2: '.$displayMidfielder2.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Midfielder 3: '.$displayMidfielder3.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Midfielder 4: '.$displayMidfielder4.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
        
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Attacker 1: '.$displayAttacker1.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
            echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Attacker 2: '.$displayAttacker2.'"); childNode.appendChild(childText); document.getElementById("rightContent").appendChild(childNode);</script>';
                                
            echo '<script type="text/javascript"> console.log("AppendChild after");</script>';
        
        ?>
        
    </body>
</html>