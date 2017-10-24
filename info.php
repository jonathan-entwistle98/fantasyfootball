<?php
session_start();
?>
<html>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="test.css"/>

        <style>
            * {box-sizing:border-box}

            .slideshow-container {
              position: relative;
              max-width: 1000px;
              margin: 0px;
            }

            .mySlides {
                display: none;
            }

            /* Position the "next button" to the right */
            .next {
              right: 0;
              border-radius: 3px 0 0 3px;
            }

            /* Caption text */
            .text {
              bottom: 8px;
              width: 100%;
              text-align: center;
              color: #f2f2f2;
              font-size: 15px;
              padding: 8px 12px;
              position: absolute;
              
            }

            /* Number text (1/3 etc) */
            .numbertext {
              padding: 8px 12px;
              position: absolute;
              color: #f2f2f2;
              font-size: 12px;
              top: 0;
            }
            
            .dot{
              cursor:pointer;
              height: 13px;
              width: 13px;
              margin: 0 2px;
              background-color: #bbb;
              border-radius: 50%;
              display: inline-block;
              transition: background-color 0.6s ease;
            }
            
            /* Fade animation */
            .fade {
              -webkit-animation-name: fade;
              -webkit-animation-duration: 1.5s;
              animation-duration: 1.5s;
              animation-name: fade;
            }

            @-webkit-keyframes fade {
              from {opacity: .4} 
              to {opacity: 1}
            }

            @keyframes fade {
              from {opacity: .4} 
              to {opacity: 1}
            }
        </style>
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
                    
                    <div id = "leftContent">
                        <div>
                        <p> 
                            <h2>Register or Log In</h2><br><br>
                            
                            
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
                            
                                if(isset($_POST['uniqid']) AND $_POST['uniqid'] == $_SESSION['uniqid']){
                                    echo '<script type="text/javascript"> console.log("Kappa1")</script><br>';
                                    // can't submit again
                                }
                                else{
                                    
                                    echo '<script type="text/javascript"> console.log("msqli_connect called");</script>';
                                    
									 $con = $_SESSION["connect"];
                                    
                                    if(!$con){
                                   	echo '<script type="text/javascript"> console.log("Not connected to database server");</script>';

				    }else{
					echo '<script type="text/javascript"> console.log("Kappa123");</script>';
	
				    }
                            
                                    if(!mysqli_select_db($con,'ug_jje1g16')){
                                   	echo '<script type="text/javascript"> console.log("Database not selected");</script>';

				    }
                            
                                    $name = $_POST['username'];
                                    $email = $_POST['email'];
                            
                                    $sql = "INSERT INTO user (Name, Email) VALUES ('$name', '$email')";
                            
                                    if(!mysqli_query($con,$sql)){
					echo '<script type="text/javascript"> console.log("Not Inserted");</script>';

                                    }
                                    else{
                                        echo '<script type="text/javascript"> console.log("User data Inserted");</script>';

                                    }
                                    
                                    
                                    
                                    
                                    $_SESSION['uniqid'] = $_POST['uniqid'];
                                }
                            
                            ?>    
                            
                           <form name="form1" id="mainForm" method="post" action="" onsubmit="window.location.href='loggedInHome.php'">
                              <input type="hidden" name="uniqid" value="<?php echo uniqid();?>" />
                              Username: <input type="text" name="username"><br>
                              Email: <input type="text" name="email"><br>  
                              <input type="submit" value="Submit">
                            </form>
                        
                        </div>
                    </div>
                    
                    <div id = "rightContent">
                        <div>
                        <p>
                        <h2>Choose your own fantasy team!
                        </p>
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
                        </script>

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
                    <div>
                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        <a href="index.html"class="footerButtons">Home</a> <a href="maps.html"class="footerButtons">Maps</a> <a href="reviews.html"class="footerButtons">Reviews</a> <a href="about.html"class="footerButtons">About</a>
                    </div>
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
    
    </script>
	</body>
	
</html>

