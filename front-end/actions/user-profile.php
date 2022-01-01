<?php
    if ( !defined('ACTION_LOAD') ) { die ( header('Location: /not-found') ); }
    
	if ( isset($_POST['submit-email']) ) {

        //Verify if there is not an user with the same email, also confirm is not the same user
		if(get_lender_by_email($_POST['email']) && get_lender_by_email($_POST['email'])['eth_ronin_address']!=$lender['eth_ronin_address']) {
			$form_error = 'The email address is already in use.';
		}

		if(!is_email($_POST['email'])) {
			$form_error = 'The email address entered is not valid.';
        }

		if(empty($_POST['email'])) {
			$form_error = 'Please enter a new email address.';
        }

        if(empty($form_error)) { 
            if(update_lender_email($_POST['email'], $lender['eth_ronin_address'])) {
                // Lets load the new settings and refresh the lender data; you can also use: header("Refresh:2");
                new_record('Lender Email Update', '{id_lender:'.$lender['id_lender'].',old_email:"'.$lender['email'].'",new_email:"'.$_POST['email'].'"}');
                
                $lender = is_login_lender();
                $form_success = 'Great! Your email was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }

    }

	if ( isset($_POST['switch_value']) ) {

        if(empty($form_error)) { 
            if(update_lender_email_notifications($_POST['switch_value'], $lender['eth_ronin_address'])) {
                $form_success = 'Great! Your alerts was updated.';
                // Lets load the new settings and refresh the lender data; you can also use: header("Refresh:2");
                $lender = is_login_lender();
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
        
    }
?>