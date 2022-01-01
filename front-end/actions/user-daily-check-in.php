<?php
    if ( !defined('ACTION_LOAD') ) { die ( header('Location: /not-found') ); }
    
    //check_a, check_b, check_c, check_d, check_e
	if ( isset($_POST['switch_value_check_a']) ) {
        if(empty($form_error)) { 
            if(update_check_in($player['id_player'], $_POST['switch_value_check_a'])) {
                $form_success = 'Great! Your check-in was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
	if ( isset($_POST['switch_value_check_b']) ) {
        if(empty($form_error)) { 
            if(update_check_in($player['id_player'], $_POST['switch_value_check_b'])) {
                $form_success = 'Great! Your check-in was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
	if ( isset($_POST['switch_value_check_c']) ) {
        if(empty($form_error)) { 
            if(update_check_in($player['id_player'], $_POST['switch_value_check_c'])) {
                $form_success = 'Great! Your check-in was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
	if ( isset($_POST['switch_value_check_d']) ) {
        if(empty($form_error)) { 
            if(update_check_in($player['id_player'], $_POST['switch_value_check_d'])) {
                $form_success = 'Great! Your check-in was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
	if ( isset($_POST['switch_value_check_e']) ) {
        if(empty($form_error)) { 
            if(update_check_in($player['id_player'], $_POST['switch_value_check_e'])) {
                $form_success = 'Great! Your check-in was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
	if ( isset($_POST['switch_value_check_f']) ) {
        if(empty($form_error)) { 
            if(update_check_in($player['id_player'], $_POST['switch_value_check_f'])) {
                $form_success = 'Great! Your check-in was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
?>