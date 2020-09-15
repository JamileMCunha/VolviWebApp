<?php
include('header.css');
?>

<?php
session_start();


$HomeNameErr = "";
$HomeName = "";
$HomeAddressErr = "";
$HomeAddress = "";
$HomePhoneErr = "";
$HomePhone = "";
$HomeEmailErr = "";
$HomeEmail = "";
$HomePasswordErr = "";
$HomePassword = "";
$HomeAboutErr = "";
$HomeAbout = "";




if($_POST){

    $HomeName = $_POST['HomeName'];
	$HomeAddress = $_POST['HomeAddress'];
	$HomePhone = $_POST['HomePhone'];
	$HomeEmail = $_POST['HomeEmail'];
	$HomePassword = $_POST['HomePassword'];
	$HomeAbout = $_POST['HomeAbout'];



	if (empty($HomeNameErr) && empty($HomeAddressErr) && empty($HomePhoneErr) && empty($HomeEmailErr) && empty($HomePasswordErr)  && empty($HomeAboutErr)) 	{

	  try {
        $host = '127.0.0.1';
        $dbname = 'volvi';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$checkUserStmt = $DBH->prepare("select * from homedb where HomeName = ?" );
		$checkUserStmt->bindParam(1, $HomeName);
		$checkUserStmt->execute();

		if ($checkUserStmt->rowCount() == 0) { //no user with this $HomeName exists



			$sql = "INSERT INTO homedb (HomeName, HomeAddress, HomePhone, HomeEmail, HomePassword, HomeAbout) VALUES ( ?, ?, ?, ?, ?, ?)";
			$sth = $DBH->prepare($sql);


			$sth->bindParam(1, $HomeName);
			$sth->bindParam(2, $HomeAddress);
			$sth->bindParam(3, $HomePhone);
			$sth->bindParam(4, $HomeEmail);
			$sth->bindParam(5, $HomePassword);
			$sth->bindParam(6, $HomeAbout);


			$sth->execute();

			$_SESSION["HomeName"] = $HomeName;
			$_SESSION["HomeEmail"] = $HomeEmail;


			echo "<script>alert('Successfully Updated!'); window.location = './loggedhome.php';</script>";
			exit();
		}
		else
			echo "<script>alert('Sorry, this home name is already taken, please try again.'); window.location = './HomeCare.php';</script>";

		 } catch(PDOException $e) {echo $e->getMessage();}
	}
}
?>

<html>
	<header>
			<div id="parallax">
			<section>
				<div class="parallax-one">
					<h2>Visiting is Inspiring</h2>
				</div>
			</section>

			<section>
				<div class="block">
					<div id="S1">Find Your Perfect Visitor</div><br>
					<p>We have a database with volunteers across Ireland, young people willing
						to volunteer and help elderly people, our website offers you a platform where
						you can register your Nursing Home and share your events, keep track of them and
						invite volunteers any time.<br>
						-    Advertise your event<br>
						-    Find and Recruit volunteers<br>
						-    Find support to realize your event<br>
						-    See what other Nursing Homes are doing<br>
</p>
				</div>
			</section>

			<section>
				<div class="parallax-two">
					<h2>Visiting is Support</h2>
				</div>
			</section>

			<section>
				<div class="block">
				<div id="S2">Be Part of It</div>
					<p>Be part of this new community and help us to build a better society,
					registering with us, you will have the opportunity to be part of a group
					of Volunteers, Professionals, Nursing Homes and Citizens fighting for a
					better life quelity.</p><br>
				</div>
			</section>
			</div>

		<style>
		@import url('https://fonts.googleapis.com/css?family=Kaushan+Script');
		@import url('https://fonts.googleapis.com/css?family=Laila');

		#S1, #S2 {font-family: 'Kaushan Script', cursive;  color:#73004b;
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
		width: 100%; background-image: url(volvi2.jpg); background-attachment: fixed; background-size: cover;
		-moz-background-size: cover; -webkit-background-size: cover; background-repeat: no-repeat; background-position: top center;
		}
		#parallax .parallax-two {padding-top: 200px; padding-bottom: 200px; overflow: hidden; position: relative;
		width: 100%; background-image: url(volvi3.jpg); background-attachment: fixed; background-size: cover;
		-moz-background-size: cover; -webkit-background-size: cover; background-repeat: no-repeat; background-position: center center;
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

	<body>
		<!Creating the Sign in popup page>

		<link rel="stylesheet" href="styleFooter.css">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

			<button id="S3" onclick="document.getElementById('id01').style.display='block'" style="width:auto;
			font-family:Kaushan Script; text-align: center; font-size:30px; margin-left: 400px;
			background-color: #00a2d1;">Register your Home</button>

			<button onclick="location.href='logPageHome.php'" style="width:auto; font-family:Kaushan Script;
			text-align: center; font-size:30px; margin-left: 200px; background-color: #00a2d1;"> Log In </button>

			<div id="id01" class="modal">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<div class="container">
		<form class='form-style' action="HomeCare.php" method="post">
			<h1 style="font-family:Kaushan Script; text-align: center";> Register your Home</h1>
					<p><b><center>Please fill in this form to create an account</center></b></p>
					<hr>
				<label for="name"><b>Home Name</b></label>
					<input type="text" name="HomeName" value="<?php echo $HomeName; ?>" placeholder="Please Enter Name Without Space"  required/>
					<span class = "error"><?php echo $HomeNameErr;?></span>
				<label for="phone"><b>Phone</b></label>
					<input type="text" name="HomePhone" value="<?php echo $HomePhone; ?>"  required/>
					<span class = "error"><?php echo $HomePhoneErr;?></span>
				<label for="address"><b>Address</b></label>
					<input type="text" name="HomeAddress" value="<?php echo $HomeAddress; ?>"  required/>
					<span class = "error"><?php echo $HomeAddressErr;?></span>
				<label for="email"><b>Email</b></label>
					<input type="text" name="HomeEmail" value="<?php echo $HomeEmail; ?>"  required/>
					<span class = "error"><?php echo $HomeEmailErr;?></span>
						<br><br>
				<label for="About"><b>Talk About Your Home</b></label><br>
					<textarea name="HomeAbout" value="<?php echo $HomeAbout; ?>" style="margin: 0px; width: 398px; height: 160px;"  required></textarea>
						<br><br>
				<label for="psw"><b>Password</b></label>
					<input type="password" name="HomePassword" value="<?php echo $HomePassword; ?>"  required/>
					<span class = "error"><?php echo $HomePasswordErr;?></span>
						<p><center><b>By creating an account you agree to our <a href="#" onclick="pop1()" style="color:white">Terms & Privacy</a></p>
		</center></b>
					<div class="clearfix">
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					<button type="submit" class="signupbtn" name='submit'>Sign Up</button>
					</div>
				</div>
				</form>
	</body>
</html>