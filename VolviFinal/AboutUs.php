<?php
include('header.css');
?>
<html>
	<body>
		<style>
		/*Adding a background image*/
			html { 
			background: url(volvi1.jpg) no-repeat center center fixed; 
			background-size: cover;
			}
		</style>
	
	<link href="https://fonts.googleapis.com/css?family=Laila" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

	<h1 style="font-family:Kaushan Script; text-align: center;  font-size:50px; color:#800053; margin-top: 90px;">About Us</h1><br><br>

		<p>
			Volunteer Visitor is a web platform to help those who want to volunteer with a short term of commitment
			and help Nursing Homes to find the perfect volunteer for their activities. Our goal is to be the bridge 
			reducing the amount of time spent on the application process and make sure everyone who is willing to 
			volunteer finds the appropriate opportunity to volunteer. 
			Nursing Homes – we support all Nursing Homes across the country by offering them a complete database of 
			volunteers, consultancy, training and guides how to plan an effective event for the Nursing homes. 
			Volunteers – we offer to the volunteer tools where they can find the perfect event to fit their routing,
			also tools to keep track of their volunteer activities and profile. The volunteer receives all information
			relevant on volunteering.</p>
			<h2>Our Vision</h2>
			<p>
			Is it a society where everyone can volunteer no matter how much time they have in their life, bringing them
			the benefits of volunteering.</p>
			<h2>Our Values</h2>
			<p>
			Respect everyone on their differences giving them the same opportunities and support.
			<b style= color:#800053;><br>Acceptance</b>
			Make sure everyone has positive interactions and be valued for who they are.
			<b style= color:#800053;><br>Integrity</b>
			Being professional on high standards, working always openly and fairly with all members and supporters.
			<b style= color:#800053;> <br>Commitment</b>
			We recognize that relationship is based on commitment and we strongly commit to our goals and relations created 
			on this platform, Volunteer Visitor is about persistence, loyalty and love.</p><br><br><br>
	<style>
	p{
		font-family: Laila;
		font-size: 20px;
		margin-left: 20%;
		margin-right: 20%;
	}
	
	h2{
		font-family: Kaushan Script;
		text-align: center;
		font-size: 25px;
		color: #800053;
	}
		</style>
	</body>

	<footer>
	<ul class="team-members">
		<li>
			<div class="team-ellipse team-elton">
			<div class="team-txt">
				<h3>Elton Carlos</h3>
				<h5>Front-End Research</h5>
				<p><a href="https://www.linkedin.com/in/eltoncarlosdomingues/">LinkedIn</a></p>
			</div>
			</div>
		</li>
		<li>
			<div class="team-ellipse team-jamile">
			<div class="team-txt">
				<h3>Jamile Maciel</h3>
				<h5>Back-end Development</h5>
				<p><a href="https://www.linkedin.com/in/jamile-m-cunha/">LinkedIn</a></p>
			</div>
			</div>
		</li>
		<li>
			<div class="team-ellipse team-fernando">
			<div class="team-txt">
				<h3>Fernando Tenorio</h3>
				<h5>Android Development</h5>
				<p> <a href="https://www.linkedin.com/in/fernando-tenorio/">LinkedIn</a></p>
			</div>
			</div>
		</li>
		<li>
			<div class="team-ellipse team-ailime">
			<div class="team-txt">
				<h3>Ailime Maciel</h3>
				<h5>Front-End Development</h5>
				<p><a href="https://www.linkedin.com/in/ailimemaciel/">LinkedIn</a></p>
			</div>
			</div>
		</li>
		<li>
			<div class="team-ellipse team-ronaldo">
			<div class="team-txt">
				<h3>Ronaldo Tavares</h3>
				<h5>Research and Documentation</h5>
				<p><a href="https://www.linkedin.com/in/ronaldo-tavares-professional/">LinkedIn</a></p>
			</div>
			</div>
		</li>
	</ul>

	<style>
	.team-members {
		margin: 20px 0 0 0;
		padding: 0;
		display: inline-block;
		text-align: center;
		width: 100%;
	}

	.team-members:after,
	.team-ellipse:before {
		display: block;
	}

	.team-members:after {
		clear: both;
	}

	.team-members li {
		width: 220px;
		height: 220px;
		display: inline-block;
		margin: 10px;
	}

	.team-ellipse {
		width: 100%;
		height: 100%;
		border-radius: 50%;
		overflow: hidden;
		position: relative;
		cursor: default;
		box-shadow: 
		inset 0 0 0 16px rgba(255,255,255,0.6),
		0 1px 2px rgba(0,0,0,0.1);
		transition: all 0.4s ease-in-out;
	}

	.team-elton { 
		background-image: url(elton.jpg);
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}

	.team-jamile { 
		background-image: url(jamile.jpg);
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}

	.team-fernando { 
		background-image: url(fernando.jpg);
		background-size: 100% 100%;
		background-repeat: no-repeat;	
	}

	.team-ailime { 
		background-image: url(ailime.jpg);
		background-size: 100% 100%;
		background-repeat: no-repeat;	
	}

	.team-ronaldo { 
		background-image: url(ronaldo.jpg);
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}
	
	.team-txt {
		position: absolute;
		background: #1db0db;
		border-radius: 50%;
		overflow: hidden;
		transition: all 0.4s ease-in-out;
		transform: scale(0);
	}
	
	.team-txt h3 {
		color: white;
		text-transform: uppercase;
		letter-spacing: 2px;
		font-size: 22px;
		margin: 0 15px;
		padding: 45px 0 0 0;
		height: 50px;
		font-family:  Arial;
		text-shadow: 0 0 1px grey, 0 1px 2px rgba(0,0,0,0.3);
	}

	.team-txt h5 {
		color: #fff;
		text-transform: uppercase;
		letter-spacing: 2px;
		height: 70px;
		font-family: Arial;
		text-shadow: 0 0 1px grey, 0 1px 2px rgba(0,0,0,0.3);
	}

	.team-txt p {
		color: #fff;
		padding: 10px 5px;
		margin: 0 30px;
		font-size: 12px;
		border-top: 2px solid rgba(255,255,255,0.5);
		opacity: 0;
		transition: all 1s ease-in-out 0.4s;
	}
	
	.team-txt p a {
		display: block;
		color: white;
		text-transform: uppercase;
		font-size: 12px;
		padding-top: 4px;
		font-family: Arial;
	}

	.team-ellipse:hover {
		box-shadow: inset 0 0 0 1px rgba(255,255,255,0.1), 0 1px 2px rgba(0,0,0,0.1);
	}

	.team-ellipse:hover .team-txt {
		transform: scale(1);
		opacity: 1;
	}

	.team-ellipse:hover .team-txt p {
		opacity: 1;
	}
	</style>
</footer>
</html>