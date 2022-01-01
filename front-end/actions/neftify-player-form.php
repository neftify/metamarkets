<?php
    if ( !defined('ACTION_LOAD') ) { die ( header('Location: /not-found') ); }

	if ( isset($_POST['submit']) ) {

		if(empty($_POST['first_name'])) {
			$form_error = 'Please enter your first name.';
        }

		if(empty($_POST['last_name'])) {
			$form_error = 'Please enter your last name.';
        }

		if(!is_email($_POST['email'])) {
			$form_error = 'The email address entered is not valid.';
        }

		if(empty($_POST['email'])) {
			$form_error = 'Please enter an email address.';
        }

		if(!is_ronin_address($_POST['ronin'])) {
			$form_error = 'Please enter a valid ronin address.';
        }

		if(empty($_POST['ronin'])) {
			$form_error = 'Please enter the ronin address you are going to receive the payments.';
        }

		if(empty($_POST['discord_name'])) {
			$form_error = 'Please enter your discord name.';
        }

		if(empty($_POST['birth'])) {
			$form_error = 'Please enter your month and year of birth.';
        }

		if(empty($_POST['device'])) {
			$form_error = 'Please choose the device you will be using.';
        }

        if(empty($_POST['message'])) {
			$form_error = 'Please tell us why do you want to be a Nefify Player.';
        }

		// Sanitize
        $_POST['first_name'] = sanitize_xss($_POST['first_name']);
		$_POST['last_name'] = sanitize_xss($_POST['last_name']);
		$_POST['ronin'] = sanitize_xss($_POST['ronin']);
        $_POST['discord_name'] = sanitize_xss($_POST['discord_name']);
		$_POST['birth'] = sanitize_xss($_POST['birth']);
		$_POST['device'] = sanitize_xss($_POST['device']);
        $_POST['message'] = sanitize_xss($_POST['message']);

        if(empty($form_error)) { 
            if(send_player_application_email($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['ronin'], $_POST['discord_name'], $_POST['birth'], $_POST['device'], $_POST['message'])) {
                $form_success = 'Great! We received your application.';

                new_record('New Player Application', '{first_name:"'.$_POST['first_name'].'",last_name:"'.$_POST['last_name'].'",email:"'.$_POST['email'].'",ronin:"'.$_POST['ronin'].'",discord_name:"'.$_POST['discord_name'].'",birth:"'.$_POST['birth'].'",device:"'.$_POST['device'].'",message:"'.$_POST['message'].'"}');
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
?>