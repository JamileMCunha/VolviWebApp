<?php
include('header.css');
?>

<?php
session_start();

$FullNameErr = "";
$FullName = "";
$UsernameErr = "";
$Username = "";
$PhoneErr = "";
$Phone = "";
$AddressErr = "";
$Address = "";
$EmailErr = "";
$Email = "";
$DoBErr = "";
$DoB = "";
$AboutErr = "";
$About = "";
$PasswordErr = "";
$Password = "";
$PhotoErr = "";
$Photo = "";
$VettingErr = "";
$Vetting = "";


if($_POST){

    $FullName = $_POST['FullName'];
	$Username = $_POST['Username'];
	$Phone = $_POST['Phone'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$DoB = $_POST['DoB'];
	$Password = $_POST['Password'];
	$Photo = $_POST['Photo'];
	$About = $_POST['About'];
	$Vetting = $_POST['Vetting'];


	if (empty($FullNameErr) && empty($User_IDErr) && empty($UsernameErr) && empty($AddressErr) && empty($EmailErr)  && empty($PasswordErr) && empty($PhotoErr)) 	{

	  try {
        $host = '127.0.0.1';
        $dbname = 'volvi';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$checkUserStmt = $DBH->prepare("select * from users where Username = ?" );
		$checkUserStmt->bindParam(1, $Username);
		$checkUserStmt->execute();

		if ($checkUserStmt->rowCount() == 0) { //no user with this $username exists


			$sql = "INSERT INTO users (FullName, Username, Phone, Address, Email, Password, Photo, DoB, About, Vetting) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$sth = $DBH->prepare($sql);


			$sth->bindParam(1, $FullName);
			$sth->bindParam(2, $Username);
			$sth->bindParam(3, $Phone);
			$sth->bindParam(4, $Address);
			$sth->bindParam(5, $Email);
			$sth->bindParam(6, $Password);
			$sth->bindParam(7, $Photo);
			$sth->bindParam(8, $DoB);
			$sth->bindParam(9, $About);
		 	$sth->bindParam(10, $Vetting);

			
			$sth->execute();
			
			$_SESSION["Username"] = $Username;
			$_SESSION["Email"] = $Email;

			
			echo "<script>alert('Successfully Updated!'); window.location = './loggedvisitor.php';</script>"; 
			exit();
		}
		else
			echo "<script>alert('Sorry, this username is already taken, please try again.'); window.location = './visitor.php';</script>";
		
		 } catch(PDOException $e) {echo $e->getMessage();}
	}
}
?>

<html>
	<header>
		<div id="parallax">
			<section>
				<div class="parallax-one">
				<h2>Visiting is Love</h2>
				</div>
			</section>
			
			<section>
				<div class="block">
				<div id="S1"> Before you Start</div>
				<p>We are glad that you are willing to volunteer but before we need you to read below,
					we want you to know everything about this amazing experience of volunteering. 
					The benefits of volunteering<br>
				-    You will be the difference<br>
				-    A real citizen helping society<br>
				-    You will make a lot of friends<br>
				-    Get ready to learn new amazing skills<br>
				-    To experience the wonders of helping for your own satisfaction<br>
				-    Personal growth and development<br><br>
					<b>Think about your time</b><br>
					Our goals are to offer you the perfect event to fit on your routine, the topics 
					below will help you to decide the perfect opportunity for you<br>
				-    Think about your time, like how much time you could spend on volunteering and then 
				look for the perfect opportunity for you.<br>
				-    Most of the events are designed for a short period of commitment but sometimes the 
				require more time, so check the events description before you apply.<br>
				-    Do a plan of your routine, you are the best to say, how, when and where you can be 
				available.<br>
				-    Know yourself, skills, talents and interests it helps a lot when deciding to volunteer.<br>

					Others factors<br>

				-    Do you like meeting new people, be in a group or individual activities?<br>
				-    Do you like listening to people? Elderly people love talking, sometimes they just need
				someone to listen to them.<br>
				-    Think about the transport, how you will get to the event, always choose the best for you.<br>
				-    Always considerate your own skills, they can be very useful.<br></p>
				</div>
			</section>
	 
			<section>
				<div class="parallax-two">
				<h2>Visiting is Share</h2>
				</div>
			</section>

			<section>
				<div class="block">
				<div id="S2">The experience</div>
				<p>Volunteering has proven to have numerous benefits on the lives of both who 
					helps and who is helped. Many websites bring the following as the main benefits of volunteering: <br>
					- It helps improve a community,<br>
					- It can help strengthen a resume and college applications<br>
					- It can be a way to meet new friends<br>
					- It always accelerates personal development<br>
					When someone volunteers they feel useful and important to others and feeling useful is one of 
					the most gratifying feelings a human being can have. PhD Bernard Bonner (n.d.) supports the idea 
					of the importance of being useful by saying: So when we examine the idea of the importance in being 
					useful, we learn that it gets down to discovering ourselves fully and sharing that with the people 
					we meet. Never for a moment doubt how powerful your presence in
					others’ lives can be! If you choose to inject warmth, laughter, joy, peace, or safety into another 
					person’s day, these traits can become hallmarks of your life and the cornerstone of what you
					provide to others. (J. Bonner, n.d.) Another advantage of volunteering is that it has no age 
					restrictions, anyone can be a volunteer. 
					</p>
				</div>
			</section>

			<section>
				<div class="parallax-three">
				<h2>Visiting is Giving</h2>
				</div>
			</section>

			<section>
				<div class="block">
				<div id="S3">How Does it Work</div>
				<p>To be part of Volvi it is very simple and easy.
				<br>- Register yourself on a visitor account adding basic personal information
				<br>- After that on your home page you can check the events that are going on
					or you can search for an especific event.
				<br>- After that you have all the information about the event such as Nursing Home name,
					role, date, time, duration. You can send an application to the Nursing home that will 
					be placing the event.
				<br>- The Nursing Home will receive you application and send you an email with the confirmation
				<br><br>Then you can enjoy your time making other people happy.
			
				
				
				
				</p>
				</div>
			</section>
		</div>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Kaushan+Script');
		@import url('https://fonts.googleapis.com/css?family=Laila');

		#S1, #S2, #S3 {font-family: 'Kaushan Script', cursive;  color:#73004b; 
		padding:0; margin:0; text-align: center;font-size:50px;
		}
		#parallax h2 {font-family: 'Kaushan Script', cursive; font-size:70px; letter-spacing:10px; 
		text-align:center; color:white; font-weight:400; opacity:0.9 
		}
		#parallax p {font-family: 'Laila', serif; color:black; padding:0; margin:0;
		}
		#parallax .block {background: white; padding: 60px; width:820px; margin:0 auto; text-align:justify;
		}

		#parallax .parallax-one {padding-top: 200px; padding-bottom: 200px; overflow: hidden; position: relative; 
		width: 100%; background-image: url(volvi9.jpg); background-attachment: fixed; background-size: cover;
		-moz-background-size: cover; -webkit-background-size: cover; background-repeat: no-repeat; background-position: top center;
		}					
		#parallax .parallax-two {padding-top: 200px; padding-bottom: 200px; overflow: hidden; position: relative; 
		width: 100%; background-image: url(volvi10.jpg); background-attachment: fixed; background-size: cover; 
		-moz-background-size: cover; -webkit-background-size: cover; background-repeat: no-repeat; background-position: center center;
		}					
		#parallax .parallax-three {padding-top: 200px; padding-bottom: 200px; overflow: hidden; position: relative; width: 100%; 
		background-image: url(volvi11.jpg); background-attachment: fixed; background-size: cover; -moz-background-size: cover; 
		-webkit-background-size: cover; background-repeat: no-repeat; background-position: center center;
		}
	</style>

		<script>
	// Get the modal
			var modal = document.getElementById('id01');
	// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			if (event.target == modal) {
			modal.style.display = "none";
			}
			}

			function pop1(){
			window.open('terms.php','popwin','width=825, height=500');
			}
		</script>
	</header>

	<link rel="stylesheet" href="styleFooter.css">

	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	
		<button id="S4" onclick="document.getElementById('id01').style.display='block'" style="width:auto; 
		font-family:Kaushan Script; text-align: center; font-size:30px; margin-left: 400px; 
		background-color: #00a2d1;">Become a Volvi Visitor</button>
	
		<button onclick="location.href='logPage.php'" style="width:auto; font-family:Kaushan Script;
		text-align: center; font-size:30px; margin-left: 200px; background-color: #00a2d1;"> Log In </button>

	<body>
		<div id="id01" class="modal">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<div class="container">
		<form class='form-style' action="visitor.php" method="post">
			<h1 style="font-family:Kaushan Script; text-align: center";> Sign Up</h1>
			<p><b><center>Please fill in this form to create an account</center></b></p>
			<hr>
		<label for="name"><b>FullName</b></label>
			<input type="text" name="FullName" value="<?php echo $FullName; ?>"  required/>
			<span class = "error"><?php echo $FullNameErr;?></span>
		<label for="username"><b>Username</b></label>
			<input type="text" name="Username" value="<?php echo $Username; ?>"  required/>
			<span class = "error"><?php echo $UsernameErr;?></span>
		<label for="phone"><b>Phone</b></label>
			<input type="text" name="Phone" value="<?php echo $Phone; ?>"  required/>
			<span class = "error"><?php echo $PhoneErr;?></span>
		<label for="address"><b>Address</b></label>
			<input type="text" name="Address" value="<?php echo $Address; ?>"  required/>
			<span class = "error"><?php echo $AddressErr;?></span>
		<label for="email"><b>Email</b></label>
			<input type="text" name="Email" value="<?php echo $Email; ?>"  required/>
			<span class = "error"><?php echo $EmailErr;?></span>
		<label for="dob"><b>Date of Birth</b></label>
			<input type="date" name="DoB"  value="<?php echo $DoB; ?>"  required/>
		<label for="profilepic"><b>Profile Picture</b></label>
			<input type="file" name="Photo" value="<?php echo $Photo; ?>"  required/>
			<span class = "error"><?php echo $PhotoErr;?></span>
		<label for="Vetting"><b>Garda Vetting?</b></label>
			<input type="radio" name="Vetting" value="Y" <?php echo $Vetting =="Y";{ echo "checked";}?>/> Yes 
			<input type="radio" name="Vetting" value="N" <?php echo $Vetting =="N";{ echo "checked";}?>/> No <br><br>
			<span class = "error"><?php echo $VettingErr;?></span>
				<br><br>
		<label for="About"><b>Talk About You</b></label><br>
			<textarea name="About" value="<?php echo $About; ?>" style="margin: 0px; width: 398px; height: 160px;"  required></textarea>
				<br><br>
		<label for="psw"><b>Password</b></label>
			<input type="password" name="Password" value="<?php echo $Password; ?>"  required/>
			<span class = "error"><?php echo $PasswordErr;?></span>
		<p><center><b>By creating an account you agree to our <a href="#" onclick="pop1()" style="color:white">Terms & Privacy</a></p>
		</center></b>
		<div class="clearfix">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
			<button type="submit" class="signupbtn" name='submit'>Sign Up</button>
			</div>
		</div>
		</form>
		</div>
	</body>
</html>