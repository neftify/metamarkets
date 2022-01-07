<?php

    function get_user_profile_image($id_user = '') {
        return get_user_specific_metadata($id_user, 'profile-image');
    }

    function get_user_name($id_user = '') {
        return get_user_specific_metadata($id_user, 'fullname');
    }

    function get_user_description($id_user = '') {
        return get_user_specific_metadata($id_user, 'description');
    }

    function get_user_twitter($id_user = '') {
        return get_user_specific_metadata($id_user, 'twitter');
    }

    function get_user_discord($id_user = '') {
        return get_user_specific_metadata($id_user, 'discord');
    }

    function get_user_medium($id_user = '') {
        return get_user_specific_metadata($id_user, 'medium');
    }

    ///////////////////////////////////////////////////////////////////////////////////

    function is_guild() {
        global $user;

        if($user['type']=='guild') {
            return true;
        }

        return false;
    }

    function get_guild_description($id_user = '') {
        $description = get_user_description($id_user);

        if(!$description) {
            $description = get_user_name($id_user)." has no about section.";
        }

        return $description;
    }

    function get_player_description($id_user = '') {
        $description = get_user_description($id_user);

        if(!$description) {
            $description = get_user_name($id_user)." has no about section.";
        }

        return $description;
    }


    function get_user_category_in_name_form($id_user = '') {
        global $user; 

        if($id_user) {
            $user_g = get_user_by_id($id_user);
            $name_form = return_category_name_form($user_g['type']);
        }
        else {
            $name_form = return_category_name_form($user['type']);
        }

        return $name_form;
    }

    function return_user_uri($id_user = '') {
        global $user;
        $uri = '';

        if($id_user) {
            $user_q = get_user_by_id($id_user);
        }
        else {
            $user_q = $user;
        }

        if($user_q['type']=='guild') {
            $uri = "/guild/".$user_q['uri'];
        }
        elseif($user_q['type']=='player') {
            $uri = "/player/".$user_q['uri'];
        }

        return $uri;
    }

    function return_category_name_form($type) {
        if($type=='guild') {
            return "Guild";
        }
        elseif($type=='player') {
            return "Player";
        }
    }

    function get_user_specific_metadata($id_user = '', $metadata) {
        global $user;

        $value = '';
        if($id_user) {
            $value = get_metadata_value_by_user_id($id_user, $metadata);
        }
        else {
            // get image from login user
            $value = get_metadata_value_by_user_id($user['id_user'], $metadata);
        }

        return $value;
    }

    function get_count_of_guilds() {
        return get_users('count', array(
			0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "type", "command" => "=", "value" => "guild")
		));
    }

    function get_count_of_players() {
        return get_users('count', array(
			0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "type", "command" => "=", "value" => "player")
		));
    }

    function is_profile_missing_something() {
        global $user;

        if(!get_user_description($user['id_user']) || !get_user_twitter($user['id_user']) || !get_user_discord($user['id_user'])) {
            return true;
        }
    }
?>