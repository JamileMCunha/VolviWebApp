<?php

include ('header.css')

?>

<html>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<body>
<div class="transbox">
 <legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Whats Going On</legend> <br> 
<div align='center'>

<!––  code below after changed for an online domain, it will allow to share on facebook ––> 

 <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
  
  <script>
  
	(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<div class="fb-share-button" 
    data-href="https://www.your-domain.com/your-page.html"  
    data-layout="button_count">
  </div>
 
<div>
<body>
<div align='center'>
<form action="Event.php" method="post"  >
    <tr>
      <input type="text" name="Find" placeholder= "Search For Home Name">
  <input type="submit" name="search" value="Find An Event">

   </tr>
</form>


<table border=3 cellpadding="4">
    <tr>
        <th>Volvi Home Name    </th>
        <th>Event Name    </th>
        <th>Size  </th>
		<th>Duration  </th>
		<th>Date and Time </th>
		<th>Visitor Role </th>
		<th>More Info </th>
			<hr>							
    </tr>


<?php

include("db.php");

if (isset($_POST["Find"])) {
$Find = $_POST['Find'];

echo 'You have search for: ';
echo $Find;


$stmt = $dbh->prepare("SELECT * FROM event WHERE EventHouseName LIKE '%$Find%'");
$stmt->bindValue(1, '%$Find%', PDO::PARAM_INT);
$stmt->execute();
include('errordb.php');

if (!$stmt->rowCount() == 0) {
	while ($row = $stmt->fetch()){
		echo "\t<tr><td>".$row['EventHouseName']."</td><td>".$row['EventName']."</td><td>".$row['EventSize']."</td><td>".$row['EventDuration']."</td><td>".$row['EventDate']."</td><td>".$row['EventRole']."</td><td>".$row['EventInfo']."</td></tr>\n";
	}

}else {
	echo ' and unfortunately there is no houses with that name, please search again.';

}}
?>
</table>

</div>
<style>

div.transbox {
	margin-left: 10%;
	border: none;
    background-image: linear-gradient(to top, #800053 6%,  white, white 50%);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: absolute;
	border-radius:5px;
	margin-right: 25%;
	min-width: 80%;
	min-height: 70%
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

td {
	text-align: right;
	padding: 15px;
	font-size: 18px;
	font-family: Raleway;
	white-space: normal; 

}

legend{	
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 18%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>
</body>
</html>
