<?php
include('sidenav.css');
include('header.css');
?>
<?php 
session_start();?>
<html>
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	
<body>

<div class="transbox">
<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Editing My Profile</legend> <br>

<?php
if (isset($_SESSION["Username"])){
echo '<b><h1> Hello<i> <b>'.$_SESSION["Username"].'</i> </b>this is your profile</h1>';}?><hr>
<br>
<?php
include('db.php');
	$Username = ''; 
if( isset( $_GET['Username'])) {
    $pus  = $_GET['Username']; 

$stmt = $dbh->prepare("SELECT * FROM users WHERE Username= :pus");
$stmt->bindValue(':pus', $pus);
$stmt->execute();
include('errordb.php');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$Username = $row['Username'];
$FullName = $row['FullName'];
$Phone = $row['Phone'];
$Address = $row['Address'];
$Email = $row['Email'];
$DoB = $row['DoB'];
$Password = $row['Password'];
$Photo = $row['Photo'];
$About = $row['About'];
$Vetting = $row['Vetting'];
} 


if ($_POST) {

	$Username = $_POST['Username'];		
	$FullName = $_POST['FullName'];
	$Phone = $_POST['Phone'];
	$Address = $_POST['Address'];
	$Email = $_POST['Email'];
	$DoB = $_POST['DoB'];
	$Password = $_POST['Password'];
	$Photo = $_POST['Photo'];
	$About = $_POST['About'];
	$Vetting = $_POST['Vetting'];
	
include ('db.php');

	$sql = "UPDATE users SET FullName='".$FullName."', Phone='".$Phone."', Address='".$Address."', Email='".$Email."', DoB='".$DoB."', About='".$About."', Password='".$Password."', Photo='".$Photo."', Vetting='".$Vetting."' WHERE Username= '".$Username."'";	
		

		
	if ($dbh->query($sql)) {
	echo "<script type= 'text/javascript'>alert('Your Profile Was Inserted Successfully') ;</script>";
	}else{
		echo "<script type= 'text/javascript'>alert('Your Profile Was Not Successfully Inserted.');</script>";
			}

			$dbh = null; }

?>
<div align='center'>
<form action="editProfile.php" method="post">

<h2>FullName: <input type="text" name="FullName" value="<?php echo $FullName; ?>" >  <br><br>
Username: <input type="text" name="Username" value="<?php echo $Username; ?>"  readonly/> <br><br>
Phone: <input type="text" name="Phone" value="<?php echo $Phone; ?>" ><br><br>
Address: <input type="text" name="Address" value="<?php echo $Address; ?>" > <br><br>  
Email: <input type="text" name="Email" value="<?php echo $Email; ?>" > <br><br>
Date Of Birth: <input type="date" name="DoB" value="<?php echo $DoB; ?>" > <br><br>	  
Password: <input type="password" name="Password" value="<?php echo $Password; ?>"  > <br><br>
Photo: <input type="file" name="Photo" value="<?php echo $Photo; ?>" > <br><br>  
About You: <input type="text" name="About" value="<?php echo $About; ?>" > <br><br>
Vetting: <input type="radio" name="Vetting" value="Y" <?php echo $Vetting =="Y";{ echo "checked";}?>/> Yes 
		 <input type="radio" name="Vetting" value="N" <?php echo $Vetting =="N";{ echo "checked";}?>/> No <br><br></h2>


<br>

		 <br>
<input type="hidden" name="pus" value="<?php echo $pus; ?>" />
		 <input type="submit" name="update" value="Update">
		 <br>
		 
		 <a href="loggedvisitor.php"><h5>Back</a></h5>	 
		 
</div>
<style>

div.transbox {
	margin-left: 25%;
	border: none;
    background-image: linear-gradient(to top, #800053 6%,  white, white 50%);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: relative;
	margin-right: 25%;
	min-width: 70%;
}

div.transbox p {
	margin: 5%;
	font-weight: bold;
	color: #000000;
}

h1{
	text-align: center;
	font-family: Kaushan Script;
	font-size:30px;	 	 
}

h5{
	text-align: center;
	font-family: Kaushan Script;
	display: inline-block;
	font-size: 30px;
	position: absolut;
}

h2 {
	margin: 5px 0 22px 0;
	text-align: justify;
	border-collapse: separate;
	padding: 20px;
	font-size: 18px;
	font-family: Raleway;
	white-space: nowrap; 
}

legend{
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 25%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>
</body>
</html>
