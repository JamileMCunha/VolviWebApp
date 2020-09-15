<?php
include('sidenav.css');
include('header.css');
?>
<?php
session_start();?>
<body>
<div class="transbox">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<div align="center"> 
<?php   

if (isset($_SESSION["Username"])){
echo '<h1> Welcome<i> <b>'.$_SESSION["Username"].'</i> </b></h1>';}?>
<br>
</div>

<style>
div.transbox {
	margin-left: 25%;
	border: none;
	background-image: url("volvi6.jpg");
	background-repeat: no-repeat;
	background-position:center;
	box-shadow: 0 8px 18px 0 rgba(0, 0, 0, 0.4), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-top: 10px;
	position: absolute;
	margin-right: 25%;
	min-height: 85%;
	min-width: 70%;
}

div.transbox p {
	margin: 5%;
	font-weight: bold;
	color: #000000;
}

h1{
	color: #800053;
	font-size: 45px;
	text-shadow: 2px 2px #c7d1e5;
	font-family:Kaushan Script;
	text-align: center;
	text-decoration: none;

</style>
</body>
</html>
