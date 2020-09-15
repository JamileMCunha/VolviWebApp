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
<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">My House Profile </legend> <br>
<div align='left'>
<?php   
if (isset($_SESSION["HomeName"])){
echo '<b><h1> Welcome<i> <b>'.$_SESSION["HomeName"].'</i> </b></h1>';}?>
<br>
<?php
$HomeName = $_SESSION["HomeName"];

include('db.php');
$stmt = $dbh->prepare("SELECT * FROM homedb WHERE HomeName= '".$HomeName."'");
$stmt->execute();
include('errordb.php');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
foreach($rows as $row){

echo"<b><h3>Home Name: </b><i>";
echo $row['HomeName'];
echo "<br> <br>";
echo"<b></i>My Phone: </b><i>";
echo $row['HomePhone'];
echo "<br> <br>";
echo"<b></i>Address: </b><i>";
echo $row['HomeAddress'];
echo "<br> <br>";
echo"<b></i>Email: </b><i>";
echo $row['HomeEmail'];
echo "<br> <br>";
echo"<b></i>About Your House: </b><i>";
echo $row['HomeAbout'];
echo "<br> <br>";
echo"<b></i>Password: </b><i>";
echo $row['HomePassword'];
echo "</h3>";

}

echo "</table>";


echo "<h2><a href=loggedhome.php><b>Back</a></h2>";

echo "<h2><a href=editHomeProfile.php?HomeName=".$row['HomeName']."><b>Edit Here</a></h2>";

?>
<style>

div.transbox {
	margin-left: 23%;
	background-image: linear-gradient(to top, #800053 6%,  white, white 50%);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: relative;
	border-radius:5px;
	width: 75%;
	height:500px;
}

div.transbox p {
	margin: 5%;
	font-weight: bold;
	color: #000000;
}

h1 {
	color: #800053;
	text-align: center;
	font-family: Kaushan Script;  
}

h3 {
	text-align: left;
	border-collapse: separate;
	padding: 20px;
	font-size: 18px;
	font-family: Raleway;
	white-space: nowrap; 

}
h2 {
	 text-align: left;
	 font-family: Kaushan Script;
	 display: inline-block;
	 font-size: 30px;
	 padding-left: 20%;	
}

legend{
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 17%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>
</div>
</body>
</html>