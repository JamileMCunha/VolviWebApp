<?php
session_start();


$EventNameErr = "";
$EventName = "";
$EventSizeErr = "";
$EventSize = "";
$EventDurationErr = "";
$EventDuration = "";
$EventDateErr = "";
$EventDate = "";
$EventRoleErr = "";
$EventRole = "";
$EventInfoErr = "";
$EventInfo = "";
$EventHouseNameErr = "";
$EventHouseName = "";




if($_POST){

    $EventName = $_POST['EventName'];
	$EventSize = $_POST['EventSize'];
	$EventDuration = $_POST['EventDuration'];
	$EventDate = $_POST['EventDate'];
	$EventRole = $_POST['EventRole'];
	$EventInfo = $_POST['EventInfo'];
	$EventHouseName = $_POST['EventHouseName'];


	if (empty($EventNameErr) && empty($EventSizeErr) && empty($EventDurationErr) && empty($EventDateErr) && empty($EventRoleErr)  && empty($EventInfoErr)) 	{

	  try {
        $host = '127.0.0.1';
        $dbname = 'volvi';
        $user = 'root';
        $pass = '';
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

		$checkUserStmt = $DBH->prepare("select * from event where EventName = ?" );
		$checkUserStmt->bindParam(1, $EventName);
		$checkUserStmt->execute();

		if ($checkUserStmt->rowCount() == 0) { //no $EventName exists with this name

		

			$sql = "INSERT INTO event (EventName, EventSize, EventDuration, EventDate, EventRole, EventInfo, EventHouseName) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
			$sth = $DBH->prepare($sql);


			$sth->bindParam(1, $EventName);
			$sth->bindParam(2, $EventSize);
			$sth->bindParam(3, $EventDuration);
			$sth->bindParam(4, $EventDate);
			$sth->bindParam(5, $EventRole);
			$sth->bindParam(6, $EventInfo);
			$sth->bindParam(7, $EventHouseName);
			
			
			$sth->execute();
			
			$_SESSION["EventName"] = $EventName;

			
			echo "<script>alert('Successfully Updated!'); window.location = './loggedhome.php';</script>"; 
			exit();
		}
		else
			echo "<script>alert('Sorry, this home name is already taken, please try again.'); window.location = './########';</script>";
		
		 } catch(PDOException $e) {echo $e->getMessage();}
	}
}
?>
<html><body>
<div class="transbox">
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Add an Event</legend> <br>


 <form class='form-style' action="addEvent.php" method="post">
      <h1 style="font-family:Kaushan Script; text-align: center" > Register A New Event</h1>
      <h2 style="font-family:Raleway; text-align: center"><center>Please fill in this form to create a new event</h2>
      <br>
	  <hr>
	  <br>
	  
	        <label for="EventHouseName"><b>Your Volvi Home Name:</b></label>
	     <input type="text" name="EventHouseName" value="<?php echo $EventHouseName; ?>"  required/>
         <span class = "error"><?php echo $EventHouseNameErr;?></span>
		 <br><br>
      <label for="EventName"><b>Event Name:</b></label>
	     <input type="text" name="EventName" value="<?php echo $EventName; ?>"  required/>
         <span class = "error"><?php echo $EventNameErr;?></span>
	  	 <br><br>
	  <label for="EventSize"><b>Event Size:</b></label>
    	 <input type="text" name="EventSize" value="<?php echo $EventSize; ?>"  required/>
         <span class = "error"><?php echo $EventSizeErr;?></span>
		 <br><br>
	  <label for="EventDuration"><b>Duration:</b></label>
      	 <input type="time" name="EventDuration" value="<?php echo $EventDuration; ?>"  required/>
         <span class = "error"><?php echo $EventDurationErr;?></span>
		 	<br><br>
	  <label for="EventDate"><b>Date and Time:</b></label>
      	 <input type="datetime-local" name="EventDate" value="<?php echo $EventDate; ?>"  required/>
         <span class = "error"><?php echo $EventDateErr;?></span>
		 	<br><br>
		<label for="EventRole"><b>Visitor Role:</b></label>
    	 <input type="text" name="EventRole" value="<?php echo $EventRole; ?>"  required/>
         <span class = "error"><?php echo $EventRoleErr;?></span>
		 
	  	  <br><br>
	  <label for="EventInfo"><b>Talk About Your Event:</b></label>
		 <textarea name="EventInfo" value="<?php echo $EventInfo; ?>" style="margin: 0px; width: 300px; height: 100px;"  required></textarea>
	     <br><br>
	  <hr>
	      
      <p><center><b>By creating this event you agree to our <a href="#" onclick="pop1()" style="color: White">Terms & Privacy</a></p></center></b>
<hr>
      <div class="clearfix">
        <button type="button" onclick="location.href='loggedhome.php'"><b>Cancel</button>
        <button type="submit" class="signupbtn" name='submit'><b>Create it</button>
</center>
    </div>
    </div>
  </form>
  <style>
div.transbox {
	margin-left: 10%;
	border: none;
	background: -webkit-linear-gradient(left, #990063, #1db0db);
	background: linear-gradient(to right, #990063, #1db0db);
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: absolute;
	width: 80%;
	border-radius:15px;
	height: 108%;
}

div.transbox p {
	margin: 5%;
	font-weight: bold;
	color: #000000;
}

label{
	font-family: Raleway;
	color: white !important;
	text-align: c;
	font-size: 18px;
	margin-left: 3%;
}


legend{
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 25%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

h1, h2{
	color:white;
}

/*Styling the components of the form*/
input[type=text], select, textarea, [type=time], [type=text] {  
	border: 1px solid #ccc;
	border-radius: 4px;
	resize: vertical;
}

</style>
</body>
</html>
