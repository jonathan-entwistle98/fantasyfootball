<?php
session_start();
//if (isset($_POST['Submit'])) {
//    header("Location: http://example.com/myOtherPage.php");
//    die();
//}
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
                <div id = "menuItems">   

                <a href="index.php"><button id="button1" class = "topButtons">Home</button></a>
                <a href="info.php"><button id="button2" class = "topButtons">Rules of the Game</button></a>
                </div>
            </div>

            <div id = "Content">

                <br>

                <div id = "leftContentIndex">
					<h2>Log In</h2>

						

				   <form name="form1" id="mainForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validate1()">
					   Username: <input type="text" id="usernameLogin" name="usernameLogin"> <br><br>
					   Password: <input type="password" id="passwordLogin"  name="passwordLogin"><br><br> 
					   <input type="submit" id="submit" value="Log In" name="submit1">
				   </form>
				   <br><br>
				   
				   <form name="form2" id="registerForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validate2()">
					   Username: <input type="text" id="usernameRegister" name="usernameRegister"> <br><br>
					   Email: <input type="text" id="emailRegister"  name="emailRegister"><br><br> 
					   Password: <input type="password" id="passwordRegister"  name="passwordRegister"><br><br> 
					   Re-enter Password: <input type="password" id="passwordReEnteredRegister"  name="passwordReEnteredRegister"><br><br> 
					   <input type="submit" id="submit" value="Register" name="submit2">
				   </form>
				   <br><br><br><br>
					<!-- Connects to database and inserts $_POST['username'] and     $_POST['email']-->
					<?php

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

						if (isset($_POST['uniqid']) AND $_POST['uniqid'] == $_SESSION['uniqid']) {
							echo '<script type="text/javascript"> console.log("Kappa1")</script><br>';
							// can't submit again
						} else {
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
							if(isset($_POST['usernameLogin'])){
								$nameLogin = htmlspecialchars($_POST['usernameLogin']);
								$passwordLogin = htmlspecialchars($_POST['passwordLogin']);

								$sqlCheckPassword = "SELECT Password FROM user WHERE Name ='$nameLogin'";
								
								$_SESSION['uniqid'] = $_POST['uniqid'];
							
								$result = mysqli_query($con, $sqlCheckPassword);
							
								if (empty($result)) {
									 echo "result is empty";
								}
								
								echo "$passwordLogin <br>";
								$resultpassword = current(mysqli_fetch_assoc($result));
								echo($resultpassword);
								
								if($passwordLogin == $resultpassword){
									// if(isset($_POST['submit1']){
									 if (!empty($_POST['submit1'])) {
										 $_SESSION['username'] = $_POST['usernameLogin'];
										 $_SESSION['password'] = $_POST['passwordLogin'];
										 header("Location: loggedInHome.php");
										 die();
									 }
								}
							}
							
							
							if(isset($_POST['usernameRegister'])){
								$name  = $_POST['usernameRegister'];
								$email = $_POST['emailRegister'];
								$password = $_POST['passwordRegister'];

								$sqlRegister = "INSERT INTO user (Name, Email, Password) VALUES ('$name', '$email', '$password')";

								if (!mysqli_query(                                                                                                                                                                                                                                                      $con, $sqlRegister)) {
									echo '<script type="text/javascript"> console.log("Not Inserted");</script>';

								} else {
									echo '<script type="text/javascript"> console.log("User data Inserted");</script>';

								}

								$_SESSION['uniqid'] = $_POST['uniqid'];
							}

						   // if (isset($_POST['submit2'])) {
							if (!empty($_POST['submit2'])) {
								$_SESSION['username'] = $_POST['usernameRegister'];
								$_SESSION['email']    = $_POST['emailRegister'];
								$_SESSION['password']    = $_POST['passwordRegister'];
								header("Location: loggedInHome.php");
								die();
							}
						}
					?>
                </div>

                <div id = "rightContent">
                    <div>
                    <p>
                        <h2 style="text-align: center; vertical-align: middle;">Choose your own fantasy team!</h2>
                    </p>
                    </div>
                    <div id = "bottomRightImage">
                        <div class="slideshow-container">
                            <div class="mySlides fade">
                                <img src="https://cdn.pixabay.com/photo/2017/08/04/18/40/football-2580983__340.jpg" style="width:100%" alt="Player takes free kick">
                            </div>

                            <div class="mySlides fade">
                                <img src="https://cdn.pixabay.com/photo/2014/10/14/20/24/the-ball-488700__340.jpg" style="width:100%" alt="Football Image">
                            </div>

                            <div class="mySlides fade">
                                <img src="https://cdn.pixabay.com/photo/2014/03/18/20/21/man-290186__340.jpg" style="width:100%" alt="Fans in the stadium">
                            </div>

                            <div class="mySlides fade">
                                <img src="https://cdn.pixabay.com/photo/2015/05/28/16/37/sport-788105__340.jpg" style= "width:100%; height:275px" alt="Football Boots">
                            </div>
                        </div>
                        <br>

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
                    <a href="index.php" class="footerButtons">Home</a> 
                    <a href="info.php" class="footerButtons">Rules of the Game</a>  
                </div>

            </div>    
        </div>


        <script type="text/javascript">
            
            var slideIndex = 0;
            showSlides();

            function currentSlide(n){
                slideIndex = n;                              
            }

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none"; 
                }
                slideIndex++;
                if (slideIndex> slides.length) {slideIndex = 1} 
                slides[slideIndex-1].style.display = "block";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }

            function validate1() {
                var x = document.forms["form1"]["usernameLogin"].value;
				var z = document.forms["form1"]["passwordLogin"].value;
                if (x == "" || z == "") {
                    alert("Please enter your name and password");
                    return false;
                }
				else{
					return true;
				}
            }
			
			function validate2() {
				var w = document.forms["form2"]["usernameRegister"].value;
                var x = document.forms["form2"]["emailRegister"].value;
				var y = document.forms["form2"]["passwordRegister"].value;
				var z = document.forms["form2"]["passwordReEnteredRegister"].value;
                if (w == "" || x == "" || y == "" || z == "") {
                    alert("Please enter your email address, name and password");
                    return false;
                }
				else if(y != z){
					alert("Your password does not match the re-entered password");
                    return false;
				}
				else{
					return true;
				}
            }

        </script>
    </body>
</html>