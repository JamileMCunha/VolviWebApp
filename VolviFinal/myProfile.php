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
<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">My Profile</legend> <br>
<div align='left'>
<?php   
if (isset($_SESSION["Username"])){
echo '<b><h1> Welcome<i> <b>'.$_SESSION["Username"].'</i> </b></h1>';}?>

<?php
$Username = $_SESSION["Username"];

include('db.php');
$stmt = $dbh->prepare("SELECT * FROM users WHERE Username= '".$Username."'");
$stmt->execute();
include('errordb.php');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
foreach($rows as $row){
echo"<tr><td >Full Name: ";
echo $row['FullName'];
echo "<br><br></td>";
echo"<td ><b>Username: </b>";
echo $row['Username'];
echo "<br> <br></td></tr>";
echo"<tr><td><b>My Phone: </b>";
echo $row['Phone'];
echo "<br> <br></td>";
echo"<td><b>Address: </b>";
echo $row['Address'];
echo "<br> <br></td></tr>";
echo"<tr><td><b>Email: </b>";
echo $row['Email'];
echo "<br> <br></td>";
echo"<td><b>Date Of Birth: </b>";
echo $row['DoB'];
echo "<br> <br></td></tr>";
echo"<tr><td><b>About You: </b>";
echo $row['About'];
echo "<br> <br></td>";
echo"<td><b>Password: </b>";
echo $row['Password'];
echo "<br> <br></td></tr>";
echo"<tr><td><b>Photo: ";
//echo $row['Photo'];
echo print $row['Photo'];
echo "<br> <br></td>";
echo"<td><b>Vetting: </b>";
echo $row['Vetting'];
echo"</td></tr>";
}

echo "</table>";
echo "<h2><a href=loggedvisitor.php><b>Back</a></h2>";

echo "<h2><a href=editProfile.php?Username=".$row['Username']."><b>Edit Here</a></h2>";
?>
<style>

div.transbox {
	margin-left: 23%;
	border: none;
	background-image: linear-gradient(to top, #800053 6%,  white, white 30%);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: relative;
	width: 75%;
	border-radius:5px; 
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

h2 {
	 text-align: left;
	 font-family: Kaushan Script;
	 display: inline-block;
	 font-size: 30px;
	 padding-left: 20%;	 
}

td, tr {
	text-align: right;
	border-collapse: separate;
	padding: 20px;
	font-size: 18px;
	font-family: Raleway;
	white-space: normal; 
}

legend{
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 12%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
	
</style>
</div>
</body>
</html>