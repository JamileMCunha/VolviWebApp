<?php
include('sidenav2.css');
include('header.css');
?>
<?php 
session_start();?>
<html>
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<head>
	<div class="transbox">
	</head>
<body>


<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Events</legend> <br>

<?php
echo "<table>";
 echo "<tr><td>Volvi Home Name<br></td>";
 echo  "<td>Event Name</td>";
  echo "<td>Event Size</td><br>";
  echo "<td>Duration</td><br>";
  echo "<td>Date and Time</td><br>";
  echo "<td>Visitor Role</td><br>";
  echo "<td>More Info</td></tr>";

$EventHouseName = $_SESSION["HomeName"];
  
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

include('db.php');
try {$host = '127.0.0.1';
        $dbname = 'volvi';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $DBH->prepare("SELECT EventHouseName,EventName, EventSize, EventDuration, EventDate, EventRole, EventInfo
FROM event a
WHERE  EXISTS ( SELECT HomeName FROM homedb b WHERE a.EventHouseName = b.HomeName ) AND EventHouseName = '". $EventHouseName ."'"); 
//database select shows only events from the home that is logged in   
   $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
include('errordb.php');
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$DBH = null;
echo "</table>";
?> 
</div>

<style>
/* The box that holds the content*/
div.transbox {
	margin-left: 25%;
	border: none;
    background-image: linear-gradient(to top, #800053 6%,  white, white 50%);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: absolute;
	border-radius:5px;
	margin-right: 25%;
	min-width: 70%;
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
	
/*Editing the table */
td {
	text-align: right;
	padding: 15px;
	font-size: 18px;
	font-family: Raleway;
	white-space: normal; 
}

/*The Small blue box on the top of the page */
legend{	
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 8%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style>
</body>
</html>

