<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Contact Us || The Meeks</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />

	<meta name="description" content="Send a message to The Meeks."/>

    <meta name="keywords" content="The Meeks, band, music, tours, rock, instruments"/>

    <link href='http://fonts.googleapis.com/css?family=Merienda|Sancreek' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/combined.css" />

	<!--[if lt IE 9]>
	<script src="dist/html5shiv.js"></script>
	<![endif]-->

</head>

<body>
	<div id="container">
	<header>
		<h1>The Meeks</h1>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="tours.html">Upcoming Tours</a></li>
				<li><a href="about.html">About Us</a></li>
				<li><a href="contact.php">Contact Us</a></li>

			</ul>
		</nav>
	</header>
		
	<article>

		<h1>Contact Us</h1>

		<?php

				if(isset($_POST['email'])) {
		     
		    // EDIT THE 2 LINES BELOW AS REQUIRED
		    $email_to = "Gavin.McGruddy@hotmail.com";
		    $email_subject = "Feedback from The Meeks Website";

		    // validation expected data exists
		    if(!isset($_POST['first_name']) ||
		        !isset($_POST['last_name']) ||
		        !isset($_POST['email']) ||
		        !isset($_POST['telephone']) ||
		        !isset($_POST['comments'])) {
		        
		    }
		     
		    $first_name = $_POST['first_name']; // required
		    $last_name = $_POST['last_name']; // required
		    $email_from = $_POST['email']; // required
		    $telephone = $_POST['telephone']; // not required
		    $comments = $_POST['comments']; // required
		     
		    $email_msg = "";
		    $first_name_msg = "";
		    $last_name_msg = "";
		    $phone_msg = "";

		    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		  if(!preg_match($email_exp,$email_from)) {
		    $email_msg .= 'Please enter a valid email address.<br />';
		  }
		    $string_exp = "/^[A-Za-z .'-]+$/";
		  if(!preg_match($string_exp,$first_name)) {

		    $first_name_msg .= 'Please enter a valid first name.<br />';
		  }
		  if(!preg_match($string_exp,$last_name)) {
		    $last_name_msg .= 'Please enter a valid last name.<br />';
		  }
		  if(strlen($comments) < 5) {
		    $comments_msg .= 'Please send us some comments.<br />';
		  }
		  if(!$email_msg && !$first_name_msg && !$last_name_msg && !$comments_msg) {

			$email_message = "Form details below.\n\n";
		     
		    function clean_string($string) {
		      $bad = array("content-type","bcc:","to:","cc:","href");
		      return str_replace($bad,"",$string);
		    }
		     
			    $email_message .= "First Name: ".clean_string($first_name)."\n";
			    $email_message .= "Last Name: ".clean_string($last_name)."\n";
			    $email_message .= "Email: ".clean_string($email_from)."\n";
			    $email_message .= "Telephone: ".clean_string($telephone)."\n";
			    $email_message .= "Comments: ".clean_string($comments)."\n";
		     
		     
				// create email headers
				$headers = 'From: '.$email_from."\r\n".
				'Reply-To: '.$email_from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
				mail($email_to, $email_subject, $email_message, $headers); 

				$first_name = ""; // required
			    $last_name = ""; // required
			    $email_from = ""; // required
			    $telephone = ""; // not required
			    $comments = ""; // required

		  }
		     
	}

		?>

		<form method="post" action="contact.php">
		
		<p><!-- Normal -->
			<label for="first_name">First Name</label>
			<input name="first_name" id="first_name" type="text" placeholder="Enter your first name here..." 
			required pattern="[a-zA-Z ]{3,30}" value="<?php echo $first_name; ?>" /> <br/>
			
		</p>

		<div class="error"><?php echo $first_name_msg; ?></div>

		<p><!-- Normal -->
			<label for="last_name">Last Name</label>
			<input name="last_name" id="last_name" type="text" placeholder="Enter your last name here..." 
			required pattern="[a-zA-Z ]{3,30}" value="<?php echo $last_name; ?>" /> <br/>
			
		</p>

		<div class="error"><?php echo $last_name_msg; ?></div>

		<p><!-- Telephone -->
			<label for="telephone">Phone</label>
			<input name="telephone" id="telephone" type="tel" value="<?php echo $telephone; ?>" /> <br/>
		</p>
		
		<p><!-- Email -->
			<label for="email">Email</label>
			<input name="email" id="email" type="email" required autocomplete="off" value="<?php echo $email_from; ?>" /> <br/>
			
		</p>

		<div class="error"><?php echo $email_msg; ?></div>
		

		<p>
		<label for="comments">Comments:</label>
		<textarea id="comments" name="comments" rows="6" cols="18"><?php echo $comments; ?></textarea>
			
		</p> 
		<div class="error"><?php echo $comments_msg; ?></div>
		<br />
		
		<div id="submit">
			<input id="submitBtn" type="submit" name="submit" value="Submit" />
		</div>

		<div id="clearDiv"></div>
		
	</form>	


	<img id="bandPic" src='images/contactUs.jpg' alt='Band Picture' />



	</article>
		
	<footer>
		<p>&#169; 2013 Proven Web</p>
	</footer>
</div>
</body>