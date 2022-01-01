<?php
    if ( !defined('ACTION_LOAD') ) { die ( header('Location: /not-found') ); }
    
	if ( isset($_POST['submit-email']) ) {

        //Verify if there is not an user with the same email, also confirm is not the same user
		if(get_player_by_email($_POST['email']) && get_player_by_email($_POST['email'])['eth_ronin_address']!=$player['eth_ronin_address']) {
			$form_error = 'The email address is already in use.';
		}

		if(!is_email($_POST['email'])) {
			$form_error = 'The email address entered is not valid.';
        }

		if(empty($_POST['email'])) {
			$form_error = 'Please enter a new email address.';
        }

        if(empty($form_error)) { 
            if(update_player_email($_POST['email'], $player['eth_ronin_address'])) {
                // Lets load the new settings and refresh the lender data; you can also use: header("Refresh:2");
                new_record('Player Email Update', '{id_player:'.$player['id_player'].',old_email:"'.$player['email'].'",new_email:"'.$_POST['email'].'"}');
                
                $player = is_login_player();
                $form_success = 'Great! Your email was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }

    }

	if ( isset($_POST['switch_value']) ) {

        if(empty($form_error)) { 
            if(update_player_email_notifications($_POST['switch_value'], $player['eth_ronin_address'])) {
                $form_success = 'Great! Your alerts was updated.';
                // Lets load the new settings and refresh the lender data; you can also use: header("Refresh:2");
                $player = is_login_player();
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
        
    }
?>