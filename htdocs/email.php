<?php

		// return "success"; die(); // Remove this line in live site, it is only for testing
		
		if($_REQUEST['name'] == '' || $_REQUEST['numberOfGuest'] == '' || $_REQUEST['eventAttending'] == '' || $_REQUEST['message'] == ''):
			return "error";
		endif;
		
		// RSVP Sender Form email address
		$sender_email = 'sender_email@domain.com';

		// receiver email address
		$to = 'receiver_email@domain.com';
		
		// prepare header
		$header = 'From: '. $_REQUEST['name'] . ' <'. $sender_email .'>'. "\r\n";
		$header .= 'Reply-To:  '. $_REQUEST['name'] . ' <'. $sender_email .'>'. "\r\n";
		// $header .= 'Cc:  ' . 'example@domain.com' . "\r\n";
		// $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
		$header .= 'X-Mailer: PHP/' . phpversion();
		
		// Contact Subject
		$subject = "Feedback From RSVP";
		
		// Contact Message
		$message = $_REQUEST['message'];
		
		// Send contact information
		$mail = mail( $to, $subject , $message, $header );
		
		return $mail ? "success" : "error";