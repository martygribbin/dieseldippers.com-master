<?php
// Get Data	
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);

$message = strip_tags($_POST['message']);

// Send Message
mail( "info@dieseldippers.com", "Contact Form Submission",
"Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $url\nMessage: $message\n",
"From: Dieseldippers Query/Suggestion <forms@example.net>" );
?>