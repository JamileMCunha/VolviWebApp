
<?php

session_start();

?>

<?php
if(isset($_POST['email'])) {
 
    // The 2 lines bellow it will show on the sent email
    $email_to = "volvi@gmail.com";
    $email_subject = "You Have A Volvi Visitor Applied Form.";
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['address']) ||
        !isset($_POST['email']) ||
		!isset($_POST['email2']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['DoB']) ||
        !isset($_POST['Vetting']) ||
        !isset($_POST['about'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name']; // required
    $address = $_POST['address']; // required
    $email_from = $_POST['email']; // required
	$email2 = $_POST['email2']; // required
    $telephone = $_POST['telephone']; // not required
    $DoB = $_POST['DoB']; // not required
    $about = $_POST['about']; // required
    $Vetting = $_POST['Vetting']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
   // $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
   // $error_message .= 'The Full Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$address)) {
//    $error_message .= 'The address you entered does not appear to be valid.<br />';
  }
 
  if(strlen($about) < 2) {
    //$error_message .= 'The About you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Full Name: ".clean_string($first_name)."\n";
    $email_message .= "Address: ".clean_string($address)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";  //The form will be send to this email
	$email_message .= "My Email : ".clean_string($email2)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
	$email_message .= "Date Of Birth: ".clean_string($DoB)."\n";
    $email_message .= "About You: ".clean_string($about)."\n";
	$email_message .= "Vetting: ".clean_string($Vetting)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for choosing to help our Nursing Home. We will be in touch with you very soon.
 
<?php
 
}
?>
<html><body>
<div class="transbox">
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<legend style="font-family:Kaushan Script; margin-left: 50px; font-size:25px;">Contact the Home</legend> <br>

<form name="contactform" method="post" action="sendEmail.php">
<table width="650px">

<h2>Participation Form</h2>

<tr>
 <td valign="top">
  <label for="first_name">Full Name </label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="address">Your Address </label>
 </td>
 <td valign="top">
  <input  type="text" name="address" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Volvi Home Email </label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email2">Your Email </label>
 </td>
 <td valign="top">
  <input  type="text" name="email2" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Your Phone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="DoB">Date Of Birth</label>
 </td>
 <td valign="top">
  <input  type="date" name="DoB" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="about"><br><br>Tell Us More About You</label>
 </td>
 <td valign="top">
  <textarea  name="about" maxlength="3000" cols="35" rows="6" placeholder= "Please tell us about you and if you were engaged before with any volunteer job"></textarea>
 </td>
</tr>
<tr>
 <td valign="top">
   <label for="Vetting"><br>Garda Vetting?</label>
 </td>
 <td valign="top"><br>
<input type="radio" name="Vetting" value="Y" /> Yes 
		 <input type="radio" name="Vetting" value="N"/> No <br><br>
   </td>
</tr>
<tr><br>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Submit"><br>   
<a href="eventFinal.php" class="previous"><h6>&laquo; Back to Search Events</a>
 </td>
</tr>
</table>
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

h2{
	font-family: Kaushan Script;
	color: white !important;
	text-align: center;
	font-size: 40px;
}

h6{
	color: white;
	font-family: Kaushan Script;
	text-align: center;
	font-size: 25px;
	text-decoration: none;
}

legend{
	color: white;
	background: rgba(0, 162, 209, 0.9);
	border: none;
	padding: 2px 6px;
	max-width: 17%;
	box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

table td, th{
	max-width: 100%;
	border-bottom: 1px solid #ddd;
}

/*Adding more style to the cells*/
td, th {
	text-align: right;
	border-collapse: separate;
	padding: 10px;
	font-size: 18px;
	font-family: Raleway;
	white-space: nowrap; 
	color: black;
}

td{
	font-family: Raleway;
	color: white !important; /*Making the color stand up from the others td edits*/
	text-align: justify;
}

</style>
</body>
</html>