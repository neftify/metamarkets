<?php
    if ( !defined('ACTION_LOAD') ) { die ( header('Location: /not-found') ); }
    
    // Did he already submited a request
    $request_for_withdraw = get_axie_withdraw('count', array(
        0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "eth_ronin_address", "command" => "=", "value" => $lender_ronin_address),
        1 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "status", "command" => "=", "value" => 'PENDING'),
    ));

    // Are Axies locked false = no, true = yes
    $are_axies_locked = are_axies_locked($lender['axie_lock_period']);

	if ( isset($_POST['withdraw-axie']) && $request_for_withdraw<=0 && !$are_axies_locked ) {

        if(empty($form_error)) { 
            if(new_axie_withdraw($lender_ronin_address, 'all')) {
                send_axie_withdraw_started($lender['id_lender']);
                $form_success = 'Great! Your Axie withdraw was submitted.';
                
                // Lets refresh the data
                $request_for_withdraw = get_axie_withdraw('count', array(
                    0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "eth_ronin_address", "command" => "=", "value" => $lender_ronin_address),
                    1 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "status", "command" => "=", "value" => 'PENDING'),
                ));
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }

    }

    if ( isset($_POST['cancel-withdraw-axie']) && $request_for_withdraw>0 && !$are_axies_locked ) {

        if(empty($_POST['withdraw-id'])) {
			$form_error = 'Please enter a withdraw id to continue.';
        }

        $withdraw = get_withdraw_by_id($_POST['withdraw-id']);

        //Not this lender id or withdraw is not pending
        if($lender_ronin_address!=$withdraw['eth_ronin_address'] || $withdraw['status']!='PENDING') {
			$form_error = 'Please try again.';
        }

        if(empty($form_error)) { 
            if(update_axie_withdraw_status($withdraw['id_withdraw'], 'CANCELLED')) {
                $form_success = 'Great! The axie withdraw was marked as cancelled.';
                
                // Lets refresh the data
                $request_for_withdraw = get_axie_withdraw('count', array(
                    0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "eth_ronin_address", "command" => "=", "value" => $lender_ronin_address),
                    1 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "status", "command" => "=", "value" => 'PENDING'),
                ));
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }
    }
?>