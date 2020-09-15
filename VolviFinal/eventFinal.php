<?php
include('header.css');
?>
<html>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<body>
 <div class="transbox">

 <legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Search for an Event</legend> <br>
<div align='center'>
<form action="eventFinal.php" method="post"  >
    <tr>
      <input type="text" name="Find" placeholder= "Search For Home Name">
  <input type="submit" name="search" value="Find">

   </tr>
</form>
</body>

<table border=3 cellpadding="4">
    <tr>
        <th>Volvi Home Name</th>
        <th>Event Name</th>
        <th>Size </th>
		<th>Duration</th>
		<th>Date and Time    </th>
		<th>Visitor Role</th>
		<th>More Info </th>
		<th>Volvi Home Email</th>
		<th>Want to Join? </th>
										
    </tr>


<?php

include("db.php");

if (isset($_POST["Find"])) {
$Find = $_POST['Find'];

echo  'You have search for: ';
echo $Find;


$stmt = $dbh->prepare("SELECT * FROM event WHERE EventHouseName LIKE '%$Find%'");
$stmt->bindValue(1, '%$Find%', PDO::PARAM_INT);
$stmt->execute();
include('errordb.php');

if (!$stmt->rowCount() == 0) {
	while ($row = $stmt->fetch()){
		echo "\t<tr><td>".$row['EventHouseName']."</td>
		<td>".$row['EventName']."</td><td>".$row['EventSize']."</td>
		<td>".$row['EventDuration']."</td><td>".$row['EventDate']."</td>
		<td>".$row['EventRole']."</td><td>".$row['EventInfo']." </td>
		<td>".$row['EventEmail']." </td>   
		
		<td>  "."<a href='sendEmail.php' style='color:rgba(0, 162, 209, 0.9)'><h4> Send Email </a></h4>"."</td></tr>\n";
	}

}else {
	echo ' and unfortunately there is no houses with that name, please search again.';

}}
?>
</table>
</div>
 <a href="loggedvisitor.php"><h5>Back To Profile</a>

<style>

div.transbox {
	margin-left: 10%;
	border: none;
	background-image: linear-gradient(to top, #800053 3%,  white, white 25%);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: absolute;
	width: 80%;
	border-radius:5%;
}

div.transbox p {
	margin: 5%;
	font-weight: bold;
	color: #000000;
}

h5{
	font-family: Kaushan Script;
	display: inline-block;
	font-size: 30px;
	position: absolut;
	margin-left: 45%;
}

legend{
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 25%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
	
td, th {
	text-align: right;
	padding: 20px;
	font-size: 18px;
	font-family: Raleway;
	color: black;
}

</style>
</body>
</html>