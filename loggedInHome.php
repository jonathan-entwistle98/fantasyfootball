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
                    <a href="index.php"><button id="button1" class = "topButtons"><b style="font-size: 15px">Home</b></button></a>
                      
					<a id="logOutButton" href="logout.php">Log Out</a>
			   </div>
                
            </div>

            <div id = "Content">

                <br>

                <div id = "leftContent">

					<!-- Connects to database and retrieves $_POST['username'] and $_POST['email']-->
					<?php
							
                        if (isset($_SESSION['username'])) {
                            $name = $_SESSION['username'];
                         //   echo "<h3>Hello $name </h3>";
                        }

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
                        
                        $readSql = "SELECT * FROM Squads WHERE Username = '".$name."'";

                        if ($result = mysqli_query($con, $readSql)) {
                            echo '<script type="text/javascript"> console.log("Query executed");</script>';
                            if ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                echo '<script type="text/javascript"> console.log("'.$row[2].'");</script>';
                                $displayUsername = $row[0];
                                $displayGoalkeeper = $row[1];
                                $displayLeftBack = $row[2];
                                $displayCenterBack1 = $row[3];
                                $displayCenterBack2 = $row[4];
                                $displayRightBack = $row[5];
                                $displayLeftMid = $row[6];
                                $displayCenterMid = $row[7];
                                $displayRightMid = $row[8];
                                $displayLeftWing = $row[9];
                                $displayCenterForward = $row[10];
                                $displayRightWing = $row[11];
                            }
                            else{
                                echo '<script type="text/javascript"> console.log("Row Query failed");</script>';
                            }
                        } else {
                            echo '<script type="text/javascript"> console.log("Query failed");</script>';
                        }

                    ?>
						
						<form id="searchPlayer" method="post">
                       <h2 id="searchForAPlayer"> Search for a player: </h2><br><input type="text" id="playerSearch" name="playerSearch" onkeyup="filterPlayers()">
						</form>
                    <span id="playerAndPosition">
                        <div id="playerDataContainer">
                        </div>
                        <div id="positionChoiceAndSubmit">
                        </div>
                    </span>
                </div>

                <div id = "rightContent">
					<div id = "topRight">
						<span id="savedSquad"> <h2>Saved Squad </h2>
						</span>
						<div id = "displaySquad">
						</div>
						<h3 id="playerCosts">Total Player Costs: 0</h3>
					</div>
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
                    <a href="index.php" class="footerButtons"><b>Home</b></a> 
                </div>

            </div>    
        </div>

        
        <script type="text/javascript">
		
			function filterPlayers(){
				
				//first delete any old cards from previously inputted names
				var deleteElements = document.getElementsByClassName("playerCards");
				var deletePositionSelect = document.getElementsByClassName("positionFormLayout");
				for(var k=0; k<deleteElements.length; k++){
					deleteElements[k].outerHTML = "";
					delete deleteElements[k];
					deletePositionSelect[k].outerHTML = "";
					delete deletePositionSelect[k];
				}
				
				//adding new player cards
				var typedInPlayerText = document.getElementById("playerSearch").value;
				if($.trim(typedInPlayerText) != ''){
					$.post('name.php',{lastName: typedInPlayerText}, function(data){
                        if(data){
                            console.log("hi there " + data);

                            var playerSplit = data.split("££");
                            console.log("length " + playerSplit.length);
                            for(var i=0; i<playerSplit.length; i++){
                                var dataSplit = playerSplit[i].split("!!");

                                var playerFirstName = dataSplit[0];
                                var playerLastName = dataSplit[1];
                                var playerRating = dataSplit[2];
                                var playerHeadshot = dataSplit[3];
                                var playerID = dataSplit[4];
								var playerPosition = dataSplit[5];
								var playerHeight = dataSplit[6];
								var playerAge = dataSplit[7];
								var playerAcceleration = dataSplit[8];
								var playerAgility = dataSplit[9];
								var playerBalance = dataSplit[10];
								var playerBallControl = dataSplit[11];
								var playerFoot = dataSplit[12];
								var playerSkillMoves = dataSplit[13];
								var playerCrossing = dataSplit[14];
								var playerDribbling = dataSplit[15];
								var playerFinishing = dataSplit[16];
								var playerHeading = dataSplit[17];
								var playerLongPassing = dataSplit[18];
								var playerLongshots = dataSplit[19];
								var playerMarking = dataSplit[20];
								var playerPositioning = dataSplit[21];
								var playerShortPassing = dataSplit[22];
								var playerShotPower = dataSplit[23];
								var playerSlidingTackle = dataSplit[24];
								var playerStamina = dataSplit[25];
								var playerStrength = dataSplit[26];
								var playerVision = dataSplit[27];
								var playerWeakFoot = dataSplit[28];

                                console.log("player id is: " + playerID); 
                                console.log("first name: " + playerFirstName);
                                console.log("last name: " + playerLastName);
                                console.log("rating: " + playerRating);

                                var playerDataContainer = document.getElementById("playerDataContainer");
                                var div = document.createElement("button");
                                div.setAttribute("id", "playerData"+(i+1));
								div.setAttribute("class", "playerCards");
								div.setAttribute("onclick", "advancedPlayerData(this)");
                                playerDataContainer.appendChild(div); 
                                
								var secretDivPlayerData = document.createElement("div");
								secretDivPlayerData.setAttribute("id", (i+1)+ playerID+"%%"+playerFirstName+ " "+playerLastName+"%%"+playerRating+"%%"+playerHeight+"%%"+playerAge+"%%"+playerAcceleration+"%%"+playerAgility+"%%"+playerBalance+"%%"+playerBallControl+"%%"+playerFoot+"%%"+playerSkillMoves+"%%"+playerCrossing+"%%"+playerDribbling+"%%"+playerFinishing+"%%"+playerHeading+"%%"+playerLongPassing+"%%"+playerLongshots+"%%"+playerMarking+"%%"+playerPositioning+"%%"+playerShortPassing+"%%"+playerShotPower+"%%"+playerSlidingTackle+"%%"+playerStamina+"%%"+playerStrength+"%%"+playerVision+"%%"+playerWeakFoot);
								secretDivPlayerData.setAttribute("style", "display: none");
                                var class1 = document.createElement("div");
                                class1.setAttribute("class", "playerDataFirstName");
                                var class2 = document.createElement("div");
                                class2.setAttribute("class", "playerDataLastName");
                                var class3 = document.createElement("span");
                                class3.setAttribute("class", "playerDataRating");
                                var class4 = document.createElement("img");
                                class4.setAttribute("class", "playerDataHeadshots");
								var class5 = document.createElement("span");
                                class5.setAttribute("class", "playerDataPosition");
                                
								div.appendChild(secretDivPlayerData);
                                div.appendChild(class1);
                                div.appendChild(class2);
                                div.appendChild(class3);
                                div.appendChild(class4);
								div.appendChild(class5);
								
                                var playerSelectForm = document.createElement("form");
								playerSelectForm.setAttribute('id',(i+1)+ playerID+"%%"+playerFirstName+ " "+playerLastName+"%%"+playerRating);
								playerSelectForm.setAttribute('class', 'positionFormLayout');
								playerSelectForm.setAttribute('method',"post");
								playerSelectForm.setAttribute('action',"playerSelect.php");
								
								var positionContainer = document.getElementById("positionChoiceAndSubmit");
								var selectPositionText = document.createTextNode("Position: ");
								playerSelectForm.appendChild(selectPositionText);
								var arrayPositions = ["Goalkeeper", "Left Back", "Center Back 1", "Center Back 2", "Right Back", "Left Mid", "Center Mid", "Right Mid", "Left Wing", "Center Forward", "Right Wing"];
								var selectList = document.createElement("select");
								selectList.setAttribute('name', 'positionSelectList');
								selectList.id = "selectPosition";
								for (var j = 0; j < arrayPositions.length; j++) {
								 var option = document.createElement("option");
								 option.value = arrayPositions[j];
								 option.text = arrayPositions[j];
								 selectList.appendChild(option);
								}
								var hiddenId = document.createElement("INPUT");
								hiddenId.setAttribute("type","hidden");
								hiddenId.setAttribute("name", "hiddenIdName");
								hiddenId.setAttribute("value", (i+1)+ playerID+"%%"+playerFirstName+ " "+playerLastName+"%%"+playerRating);
								var submitPlayer = document.createElement("INPUT");
								submitPlayer.setAttribute("type", "submit");
								submitPlayer.setAttribute("value", "Add to Squad");
								submitPlayer.setAttribute("class", "addPlayerButton");
								
								playerSelectForm.appendChild(hiddenId);
								playerSelectForm.appendChild(selectList);
								playerSelectForm.appendChild(submitPlayer);
								positionContainer.appendChild(playerSelectForm);
								
                                document.getElementsByClassName("playerDataFirstName")[i].innerHTML = playerFirstName;
                                document.getElementsByClassName("playerDataLastName")[i].innerHTML = playerLastName;
                                document.getElementsByClassName("playerDataRating")[i].innerHTML = playerRating;
                                document.getElementsByClassName("playerDataHeadshots")[i].src = playerHeadshot;
								document.getElementsByClassName("playerDataPosition")[i].innerHTML = playerPosition;
                            }
                        }
					 
					});
				}
				
			}
			
			function advancedPlayerData(button){
				
				button.style.backgroundColor = '#d6b951';
				
				var playerAdvancedDetails = button.childNodes[0].id;
				var playerDetailSplit = playerAdvancedDetails.split("%%");
				
				var id = playerDetailSplit[0];
				var name = playerDetailSplit[1];
				var rating = playerDetailSplit[2];
				var height = playerDetailSplit[3];
				var age = playerDetailSplit[4];
				var acceleration = playerDetailSplit[5];
				var agility = playerDetailSplit[6];
				var balance = playerDetailSplit[7];
				var ballcontrol = playerDetailSplit[8];
				var foot = playerDetailSplit[9];
				var skillMoves = playerDetailSplit[10];
				var crossing = playerDetailSplit[11];
				var dribbling = playerDetailSplit[12];
				var finishing = playerDetailSplit[13];
				var headingaccuracy = playerDetailSplit[14];
				var longpassing = playerDetailSplit[15];
				var longshots = playerDetailSplit[16];
				var marking = playerDetailSplit[17];
				var positioning = playerDetailSplit[18];
				var shortpassing = playerDetailSplit[19];
				var shotpower = playerDetailSplit[20];
				var slidingtackle = playerDetailSplit[21];
				var stamina = playerDetailSplit[22];
				var strength = playerDetailSplit[23];
				var vision = playerDetailSplit[24];
				var weakfoot = playerDetailSplit[25];
				
				var childNode = document.createElement("div");
				childNode.setAttribute("id", "playerDetails");
				var spanToIncreaseFontSize = document.createElement("div");
				spanToIncreaseFontSize.setAttribute("id", "playerDetailsAdvanced");
				spanToIncreaseFontSize.style.fontSize = "24px";
				spanToIncreaseFontSize.style.fontWeight = "Bold";
				var childText = document.createTextNode("Player Details - " + name);
				spanToIncreaseFontSize.appendChild(childText);
				childNode.appendChild(spanToIncreaseFontSize);
				document.getElementById("rightContent").appendChild(childNode);
	
				console.log("advanced details: " +playerAdvancedDetails);
	
				var childNode2 = document.createElement("div");
				childNode2.setAttribute("id", "playerAdvancedDetails");
				
				var divConatainer0 = document.createElement("p");
				
				var childText0 = document.createTextNode("Height: " + height + "cm ");
				var childText0Span = document.createElement("span");
				childText0Span.setAttribute("class", "advancedDetails");
				childText0Span.setAttribute("id", "advancedDetails0");
				childText0Span.appendChild(childText0);
				
				var childText1 = document.createTextNode("Age: " + age);
				var childText1Span = document.createElement("span");
				childText1Span.setAttribute("class", "advancedDetails");
				childText1Span.setAttribute("id", "advancedDetails1");
				childText1Span.appendChild(childText1);
				
				var childText2 = document.createTextNode("Pace: " + acceleration);
				var childText2Span = document.createElement("span");
				childText2Span.setAttribute("class", "advancedDetails");
				childText2Span.setAttribute("id", "advancedDetails2");
				childText2Span.appendChild(childText2);
				
				var divConatainer1 = document.createElement("p");
				
				var childText3 = document.createTextNode("Agility: " + agility);
				var childText3Span = document.createElement("span");
				childText3Span.setAttribute("class", "advancedDetails");
				childText3Span.setAttribute("id", "advancedDetails3");
				childText3Span.appendChild(childText3);
				
				var childText4 = document.createTextNode("Balance: " + balance);
				var childText4Span = document.createElement("span");
				childText4Span.setAttribute("class", "advancedDetails");
				childText4Span.setAttribute("id", "advancedDetails4");
				childText4Span.appendChild(childText4);
				
				var childText5 = document.createTextNode("Ball Control: " + ballcontrol);
				var childText5Span = document.createElement("span");
				childText5Span.setAttribute("class", "advancedDetails");
				childText5Span.setAttribute("id", "advancedDetails5");
				childText5Span.appendChild(childText5);
				
				var divConatainer2 = document.createElement("p");
				
				var childText6 = document.createTextNode("Dominant Foot: " + foot);
				var childText6Span = document.createElement("span");
				childText6Span.setAttribute("class", "advancedDetails");
				childText6Span.setAttribute("id", "advancedDetails6");
				childText6Span.appendChild(childText6);
				
				var childText7 = document.createTextNode("Skill Moves: " + skillMoves);
				var childText7Span = document.createElement("span");
				childText7Span.setAttribute("class", "advancedDetails");
				childText7Span.setAttribute("id", "advancedDetails7");
				childText7Span.appendChild(childText7);
				
				var childText8 = document.createTextNode("Crossing: " + crossing);
				var childText8Span = document.createElement("span");
				childText8Span.setAttribute("class", "advancedDetails");
				childText8Span.setAttribute("id", "advancedDetails8");
				childText8Span.appendChild(childText8);
				
				var divConatainer3 = document.createElement("p");
				
				var childText9 = document.createTextNode("Dribbling: " + dribbling);
				var childText9Span = document.createElement("span");
				childText9Span.setAttribute("class", "advancedDetails");
				childText9Span.setAttribute("id", "advancedDetails9");
				childText9Span.appendChild(childText9);
				
				var childText10 = document.createTextNode("Finishing: " + finishing);
				var childText10Span = document.createElement("span");
				childText10Span.setAttribute("class", "advancedDetails");
				childText10Span.setAttribute("id", "advancedDetails10");
				childText10Span.appendChild(childText10);
				
				var childText11 = document.createTextNode("Heading: " + headingaccuracy);
				var childText11Span = document.createElement("span");
				childText11Span.setAttribute("class", "advancedDetails");
				childText11Span.setAttribute("id", "advancedDetails11");
				childText11Span.appendChild(childText11);
				
				var divConatainer4 = document.createElement("p");
				
				var childText12 = document.createTextNode("Long Passing: " + longpassing);
				var childText12Span = document.createElement("span");
				childText12Span.setAttribute("class", "advancedDetails");
				childText12Span.setAttribute("id", "advancedDetails12");
				childText12Span.appendChild(childText12);
				
				var childText13 = document.createTextNode("Long Shots: " + longshots);
				var childText13Span = document.createElement("span");
				childText13Span.setAttribute("class", "advancedDetails");
				childText13Span.setAttribute("id", "advancedDetails13");
				childText13Span.appendChild(childText13);
				
				var childText14 = document.createTextNode("Marking: " + marking);
				var childText14Span = document.createElement("span");
				childText14Span.setAttribute("class", "advancedDetails");
				childText14Span.setAttribute("id", "advancedDetails14");
				childText14Span.appendChild(childText14);
				
				var divConatainer5 = document.createElement("p");
				
				var childText15 = document.createTextNode("Positioning: " + positioning);
				var childText15Span = document.createElement("span");
				childText15Span.setAttribute("class", "advancedDetails");
				childText15Span.setAttribute("id", "advancedDetails15");
				childText15Span.appendChild(childText15);
				
				var childText16 = document.createTextNode("Short Passing: " + shortpassing);
				var childText16Span = document.createElement("span");
				childText16Span.setAttribute("class", "advancedDetails");
				childText16Span.setAttribute("id", "advancedDetails16");
				childText16Span.appendChild(childText16);
				
				var childText17 = document.createTextNode("Shot Power: " + shotpower);
				var childText17Span = document.createElement("span");
				childText17Span.setAttribute("class", "advancedDetails");
				childText17Span.setAttribute("id", "advancedDetails17");
				childText17Span.appendChild(childText17);
				
				var divConatainer6 = document.createElement("p");
				
				var childText18 = document.createTextNode("Sliding Tackle: " + slidingtackle);
				var childText18Span = document.createElement("span");
				childText18Span.setAttribute("class", "advancedDetails");
				childText18Span.setAttribute("id", "advancedDetails18");
				childText18Span.appendChild(childText18);
				
				var childText19 = document.createTextNode("Stamina: " + stamina);
				var childText19Span = document.createElement("span");
				childText19Span.setAttribute("class", "advancedDetails");
				childText19Span.setAttribute("id", "advancedDetails19");
				childText19Span.appendChild(childText19);
				
				var childText20 = document.createTextNode("Strength: " + strength);
				var childText20Span = document.createElement("span");
				childText20Span.setAttribute("class", "advancedDetails");
				childText20Span.setAttribute("id", "advancedDetails20");
				childText20Span.appendChild(childText20);
				
				var divConatainer7 = document.createElement("p");
				
				var childText21 = document.createTextNode("Vision: " + vision);
				var childText21Span = document.createElement("span");
				childText21Span.setAttribute("class", "advancedDetails");
				childText21Span.setAttribute("id", "advancedDetails21");
				childText21Span.appendChild(childText21);
				
				var childText22 = document.createTextNode("Weak Foot: " + weakfoot);
				var childText22Span = document.createElement("span");
				childText22Span.setAttribute("class", "advancedDetails");
				childText22Span.setAttribute("id", "advancedDetails22");
				childText22Span.appendChild(childText22);
				
				divConatainer0.appendChild(childText0Span);
				divConatainer0.appendChild(childText1Span);
				divConatainer0.appendChild(childText6Span);
				
				divConatainer1.appendChild(childText3Span);
				divConatainer1.appendChild(childText4Span);
				divConatainer1.appendChild(childText5Span);
				divConatainer1.appendChild(childText9Span);
				
				divConatainer3.appendChild(childText17Span);
				divConatainer3.appendChild(childText10Span);
				divConatainer3.appendChild(childText13Span);
				divConatainer3.appendChild(childText11Span);
				
				divConatainer4.appendChild(childText21Span);
				divConatainer4.appendChild(childText12Span);
				divConatainer4.appendChild(childText16Span);
				divConatainer4.appendChild(childText8Span);
				
				divConatainer5.appendChild(childText15Span);
				divConatainer5.appendChild(childText14Span);
				divConatainer5.appendChild(childText18Span);
				
				divConatainer6.appendChild(childText2Span);
				divConatainer6.appendChild(childText19Span);
				divConatainer6.appendChild(childText20Span);
				
				divConatainer7.appendChild(childText7Span);
				divConatainer7.appendChild(childText22Span);
				
				childNode2.appendChild(divConatainer0);
				childNode2.appendChild(divConatainer1);
				childNode2.appendChild(divConatainer3);
				childNode2.appendChild(divConatainer4);
				childNode2.appendChild(divConatainer5);
				childNode2.appendChild(divConatainer6);
				childNode2.appendChild(divConatainer7);
				/*
				childNode2.appendChild(childText0Span);
				childNode2.appendChild(childText1Span);
				childNode2.appendChild(childText2Span);
				childNode2.appendChild(childText3Span);
				childNode2.appendChild(childText4Span);
				childNode2.appendChild(childText5Span);
				childNode2.appendChild(childText6Span);
				childNode2.appendChild(childText7Span);
				childNode2.appendChild(childText8Span);
				childNode2.appendChild(childText9Span);
				childNode2.appendChild(childText10Span);
				childNode2.appendChild(childText11Span);
				childNode2.appendChild(childText12Span);
				childNode2.appendChild(childText13Span);
				childNode2.appendChild(childText14Span);
				childNode2.appendChild(childText15Span);
				childNode2.appendChild(childText16Span);
				childNode2.appendChild(childText17Span);
				childNode2.appendChild(childText18Span);
				childNode2.appendChild(childText19Span);
				childNode2.appendChild(childText20Span);
				childNode2.appendChild(childText21Span);
				childNode2.appendChild(childText22Span);
				*/
				
				childNode.appendChild(childNode2);
			}
			
			var playerCosts = 0;
			
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

            $displayUsername = $row[0];
                                $displayGoalkeeper = $row[1];
                                $displayLeftBack = $row[2];
                                $displayCenterBack1 = $row[3];
                                $displayCenterBack2 = $row[4];
                                $displayRightBack = $row[5];
                                $displayLeftMid = $row[6];
                                $displayCenterMid = $row[7];
                                $displayRightMid = $row[8];
                                $displayLeftWing = $row[9];
                                $displayCenterForward = $row[10];
                                $displayRightWing = $row[11];
								
			$feeGoalkeeper = (pow(intval(explode('%%', $displayGoalkeeper)[2]), 10)/pow(45, 10))* 90000;
			$feeLeftBack = (pow(intval(explode('%%', $displayLeftBack)[2]), 10)/pow(45, 10))* 90000;
			$feeCenterBack1 = (pow(intval(explode('%%', $displayCenterBack1)[2]), 10)/pow(45, 10))* 90000;
			$feeCenterBack2 = (pow(intval(explode('%%', $displayCenterBack2)[2]), 10)/pow(45, 10))* 90000;
			$feeRightBack = (pow(intval(explode('%%', $displayRightBack)[2]), 10)/pow(45, 10))* 90000;
			$feeLeftMid = (pow(intval(explode('%%', $displayLeftMid)[2]), 10)/pow(45, 10))* 90000;
			$feeCenterMid = (pow(intval(explode('%%', $displayCenterMid)[2]), 10)/pow(45, 10))* 90000;
			$feeRightMid = (pow(intval(explode('%%', $displayRightMid)[2]), 10)/pow(45, 10))* 90000;
			$feeLeftWing = (pow(intval(explode('%%', $displayLeftWing)[2]), 10)/pow(45, 10))* 90000;
			$feeCenterForward = (pow(intval(explode('%%', $displayCenterForward)[2]), 10)/pow(45, 10))* 90000;
			$feeRightWing = (pow(intval(explode('%%', $displayRightWing)[2]), 10)/pow(45, 10))* 90000;
			
			$totalRating = intval(explode('%%', $displayGoalkeeper)[2]) + intval(explode('%%', $displayLeftBack)[2]) + intval(explode('%%', $displayCenterBack1)[2]) + intval(explode('%%', $displayCenterBack2)[2]) + intval(explode('%%', $displayRightBack)[2]) + intval(explode('%%', $displayLeftMid)[2]) + intval(explode('%%', $displayCenterMid)[2]) + intval(explode('%%', $displayRightMid)[2]) + intval(explode('%%', $displayLeftWing)[2]) + intval(explode('%%', $displayCenterForward)[2]) + intval(explode('%%', $displayRightWing)[2]);
			$totalFee = $feeGoalkeeper + $feeLeftBack + $feeCenterBack1 + $feeCenterBack2 + $feeRightBack + $feeLeftMid + $feeCenterMid + $feeRightMid + $feeLeftWing + $feeCenterForward + $feeRightWing;
			$roundedTotalFee = round($totalFee,2);
			$moneyFormatFee = (string)number_format($totalFee, 2, '.', ',');
			
			echo '<script type="text/javascript"> console.log("Total Rating: '.$moneyFormatFee.'");</script>';
			echo '<script type="text/javascript"> document.getElementById("playerCosts").innerHTML = "Player Costs: £'.$moneyFormatFee.'";</script>';			
			echo '<script type="text/javascript"> document.getElementById("savedSquad").innerHTML += "<h3 id=avgRating>Average Rating: '.round(($totalRating/11)).'</h3>";</script>';
			echo '<script type="text/javascript"> console.log("Average Rating: '.($totalRating/11).'");</script>';
								

            if($displayGoalkeeper){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Goalkeeper: '.explode('%%', $displayGoalkeeper)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }

            if($displayLeftBack){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Left Back: '.explode('%%', $displayLeftBack)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }

            if($displayCenterBack1){    
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Center Back 1: '.explode('%%', $displayCenterBack1)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }

            if($displayCenterBack2){    
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Center Back 1: '.explode('%%', $displayCenterBack2)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }   

            if($displayRightBack){    
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Right Back: '.explode('%%', $displayRightBack)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }    

            if($displayLeftMid){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Left Mid: '.explode('%%', $displayLeftMid)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }    

            if($displayCenterMid){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Center Mid: '.explode('%%', $displayCenterMid)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }    

            if($displayRightMid){    
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Right Mid: '.explode('%%', $displayRightMid)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }    

            if($displayLeftWing){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Left Wing: '.explode('%%', $displayLeftWing)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }    

            if($displayCenterForward){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Center Forward: '.explode('%%', $displayCenterForward)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }    

            if($displayRightWing){
                echo '<script type="text/javascript"> var childNode = document.createElement("P"); var childText = document.createTextNode("Right Wing: '.explode('%%', $displayRightWing)[1].'"); childNode.appendChild(childText); document.getElementById("displaySquad").appendChild(childNode);</script>';
            }
        ?>
        
    </body>
</html>