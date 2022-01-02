<?php
    if ( !defined('ACTION_LOAD') ) { die ( header('Location: /not-found') ); }
    
	if ( isset($_POST['submit']) ) {

        // save data/precheck
            if(!empty($_POST['about'])) {
                $_SESSION['about'] = $_POST['about'];
            }
            else {
                $_POST['about'] = '';
            }

            if(!empty($_POST['uri'])) {
                $_POST['uri'] = clean_url($_POST['uri']);
            }

            if(empty($_POST['email'])) {
                $_POST['email'] = '';
            }

            // clean all stuff
            $_POST['about'] = sanitize_xss($_POST['about']);
            $_POST['fullname'] = sanitize_xss($_POST['fullname']);
            $_POST['uri'] = sanitize_xss($_POST['uri']);
            $_POST['twitter'] = sanitize_xss($_POST['twitter']);
            $_POST['discord'] = sanitize_xss($_POST['discord']);
            $_POST['medium'] = sanitize_xss($_POST['medium']);

        // lets do all checking verification
		if(get_user_by_uri($_POST['uri']) && $user['uri']!=$_POST['uri']) {
			$form_error = 'That username is already in use, please enter another.';
        }    

		if(!empty($_POST['email']) && !is_email($_POST['email'])) {
			$form_error = 'Please enter a valid email.';
        }

        // lets check all required fields
		if(empty($_POST['uri'])) {
			$form_error = 'Please enter your username.';
        }
		if(empty($_POST['fullname'])) {
			$form_error = 'Please enter your account name.';
        }

		if(!empty($_POST['twitter']) && !is_url($_POST['twitter'], 'twitter.com')) {
			$form_error = 'Please enter a valid twitter url like '.get_twitter_link().'.';
        }

		if(!empty($_POST['medium']) && !is_url($_POST['medium'], 'medium.com')) {
			$form_error = 'Please enter a valid medium url like '.get_medium_link().'.';
        }

        if(is_guild()) {
            if(!empty($_POST['discord']) && !is_url($_POST['discord'])) {
                $form_error = 'Please enter a valid discord url.';
            }
        }

        // lets check image files
        if(!empty($_FILES['file']['name'])) {
            $random1 = substr(number_format(time() * rand(),0,'',''),0,10); 
            $name = $_FILES['file']['name'];
            $targetDir = "uploads/";
        
            $targetFile = $targetDir.basename($_FILES['file']['name']);
            $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            $extensions_arr= array("jpg","jpeg","png");
    
            if( in_array($fileType, $extensions_arr) && empty($form_error) ) {
                move_uploaded_file($_FILES['file']['tmp_name'],$targetDir.$random1.'-'.$name);
                $profile_image = get_domain()."/".$targetDir.$random1.'-'.$name;
            } 
            else {
                $form_error = 'Only images with .jpg, .jpeg and .png formats are accepted.';
            }
        }

        if(empty($form_error)) { 
            if(empty($profile_image)) { $profile_image = get_user_profile_image(); }

            if(update_profile($user['id_user'], $_POST['fullname'], $_POST['email'], $profile_image, $_POST['about'], $_POST['uri'], $_POST['twitter'], $_POST['discord'], $_POST['medium'])) {
                //destroy and refresh data
                unset($_SESSION['about']);
                $user = get_user_by_id($user['id_user']);
                $form_success = 'Great! Your account was updated.';
            }
            else {
                $form_error = 'An error occured, please try again later.';
            }
        }

    }

?>