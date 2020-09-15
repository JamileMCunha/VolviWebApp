<?php
include('sidenav2.css');
include('header.css');
?>
<?php 
session_start();?>
<html>
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	
<body>

<div class="transbox">
<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Editing Home Profile</legend> <br>

<?php
if (isset($_SESSION["HomeName"])){
echo '<b><h1> Hello<i> <b>'.$_SESSION["HomeName"].' </i> </b>this is your profile</h1>';} ?>
<br>
<?php
include('db.php');
	$HomeName = ''; 
if( isset( $_GET['HomeName'])) {
    $ph  = $_GET['HomeName']; 

$stmt = $dbh->prepare("SELECT * FROM homedb WHERE HomeName= :ph");
$stmt->bindValue(':ph', $ph);
$stmt->execute();
include('errordb.php');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$HomeName = $row['HomeName'];
$HomePhone = $row['HomePhone'];
$HomeAddress = $row['HomeAddress'];
$HomeEmail = $row['HomeEmail'];
$HomePassword = $row['HomePassword'];
$HomeAbout = $row['HomeAbout'];
} 


if ($_POST) {

	$HomeName = $_POST['HomeName'];
	$HomePhone = $_POST['HomePhone'];
	$HomeAddress = $_POST['HomeAddress'];
	$HomeEmail = $_POST['HomeEmail'];
	$HomePassword = $_POST['HomePassword'];
	$HomeAbout = $_POST['HomeAbout'];
	
include ('db.php');

	$sql = "UPDATE homedb SET HomePhone='".$HomePhone."', HomeAddress='".$HomeAddress."', HomeEmail='".$HomeEmail."', HomePassword='".$HomePassword."', HomeAbout='".$HomeAbout."' WHERE HomeName= '".$HomeName."'";	
		

		
	if ($dbh->query($sql)) {
	echo "<script type= 'text/javascript'>alert('Your Profile Was Inserted Successfully') ;</script>";
	}else{
		echo "<script type= 'text/javascript'>alert('Your Profile Was Not Successfully Inserted.');</script>";
			}

			$dbh = null; }

?>


<div align='center'>
<form action="editHomeProfile.php" method="post">

<h2>Home Name: <input type="text" name="HomeName" value="<?php echo $HomeName; ?>"  readonly/> <br><br>
Home Phone: <input type="text" name="HomePhone" value="<?php echo $HomePhone; ?>">   <br><br>
Home Address: <input type="text" name="HomeAddress" value="<?php echo $HomeAddress; ?>" > <br><br>  
Home Email: <input type="text" name="HomeEmail" value="<?php echo $HomeEmail; ?>" > <br><br>
Home Password: <input type="password" name="HomePassword" value="<?php echo $HomePassword; ?>"  > <br><br>
Home About: <input type="text" name="HomeAbout" value="<?php echo $HomeAbout; ?>" > <br><br></h2>

<br><br>
<input type="hidden" name="ph" value="<?php echo $ph; ?>" />
		 <input type="submit" name="update2" value="Update">
		 <br>
		 
		 <a href="loggedhome.php"><h5>Home Profile</h5></a>
		 
		 
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
	border-radius:5px;
}

div.transbox p {
	margin: 5%;
	font-weight: bold;
	color: #000000;
}

h1{
	color: #800053;
	text-align: center;
	font-family: Kaushan Script;
	font-size:30px;	  
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

h5{
	text-align: center;
	font-family: Kaushan Script;
	display: inline-block;
	font-size: 30px;
	position: absolut;
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