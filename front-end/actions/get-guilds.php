<?php

if ( isset($_POST['submit']) ) {

    // Profile need to be completed
    if(is_profile_missing_something()) {
        $form_error = 'Please complete your profile before submiting an application. You will need to add a Twitter, Discord username and a profile description. You can do that by clicking <a href="/dashboard-profile">here</a>.';
    }

    // Verify if you already applied 
    if(is_user_already_applied($user['id_user'], $guild['id_user'])) {
        $form_error = 'You already applied with this guild.';
    }

    // Need to be log in
    if(!$user || $user['type']!='player') {
        $form_error = 'Please log in with a player account.';
    }

    if(empty($form_error)) { 
        if(new_application($user['id_user'], $guild['id_user'])) {
            $form_success = 'Great! Your application was sent.';
        }
        else {
            $form_error = 'An error occured, please try again later.';
        }
    }

}
?>