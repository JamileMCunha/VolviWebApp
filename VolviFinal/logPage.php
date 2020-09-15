<?php

session_start();

$Username = "";
$Password = "";

if($_POST)
{
	$Username = $_POST  ['Username'];
	$Password = $_POST ['Password'];

		try {
        $host = '127.0.0.1';
        $dbname = 'volvi';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$q = $DBH->prepare("select * from users where  Username = :Username ");
		$q->bindValue(':Username', $Username);

		$q->execute();

		$row = $q->fetch(PDO::FETCH_ASSOC);
		 
		if ($q->rowCount() > 0) {
			
				$Email = $row['Email'];
				$_SESSION["Username"] = $Username;
				$_SESSION["Email"] = $Email;
				$_SESSION["Phone"] = $Phone;
				$_SESSION["Password"] = $Password;
				$_SESSION["Address"] = $Address;
				$_SESSION["DoB"] = $DoB;
				$_SESSION["Photo"] = $Photo;
				$_SESSION["Vetting"] = $Vetting;
				$_SESSION["About"] = $About;

				header('Location:  loggedvisitor.php');
	exit();
		
			
		} else {
		    $message= 'Sorry your log in details are not correct';
		}
	} catch(PDOException $e) {echo $e->getMessage();}
	
}
?>

<html>
<head>
<form class='form-style' action="logPage.php" method="post"> 


  <div class='top'>
    <h2>Welcome to Volvi</h2>
  </div>
      Username:<br> 
     <input type="text" name="Username" value="<?php echo $Username; ?>"/><br><br> 
   Password:<br> 
    <input type="password" name="Password" value="<?php echo $Password; ?>"/><br><br> 
    <input type="submit" name="submit" value="Login"> 
</form> 

</div>
<span onclick="location.href = 'index.php';"document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

<script>
//close
$('#close').on('click', function(){
  $('.login').hide('fast');
});
</script>
<style>
/*import font from google fonts to have more options and not only the safe ones */
@import url('https://fonts.googleapis.com/css?family=Kaushan+Script');

body {	
	background: #222222 url('volvi7.jpg') no-repeat top center fixed;
	background-size: cover;
	font-family: 'Kaushan Script';
}

h2 {
	color: #73004b;
	font-size: 30px;
	font-weight: 400;
	text-align: center;
}

.form-style {
	width: 300px;
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -100px 0px 0px -150px;
	background: #FFFFFF;
	box-shadow: 0px 0px 0px 9999px rgba(0,0,0,0.6);
	animation-fill-mode: both;
	animation-duration: 1s;
	animation-name: bounceInDown;
	border-radius: 9px;
}

.user, .pw{
  border: 1px solid #c0c1c4;
  transition: all 0.3s linear; 
}

.user:hover, .pw:hover{
  background: #c0c1c4;
  border-left: 5px solid #fbe449;   
}

input[type="text"], input[type="password"] {
	width: 290px;
	padding: 20px 0px;
	background: transparent;
	border: 0;
	outline: none;
	color: black;
	margin: 0 auto;
	text-indent: 20px;
	font-weight: bold;
}

label {
	display: block;
	position: absolute;
	margin-top: 2px;
	width: 6px;
	height: 6px;
	border-radius: 2px;
	content: "";
	transition: all 0.5s ease-in-out;
	cursor: pointer;
	border: 10px solid  1db0db;
	box-shadow: 0px 0px 0px 2px #ccc;
}

input[type="submit"] {
	background: #1db0db;
	border: 0;
	height: 30px;
	border-radius: 3px;
	color: white;
	font-weight: bold;
	padding: 0px 25px;
	cursor: pointer;
	transition: background 0.3s ease-in-out;
	margin-left: 105px;
}

.close {
	position: absolute;
	right: 35px;
	top: 15px;
	font-size: 40px;
	font-weight: bold;
	color: #f1f1f1;
}

.close:hover,
.close:focus {
	color: #f44336;
	cursor: pointer;
}

@keyframes bounceInDown{
0% {opacity: 0;	transform: translateY(-2000px);}
60% {opacity: 1;transform: translateY(30px);}
80% {transform: translateY(-10px);}
100% {transform: translateY(0);}

</style>
</body>
</html>