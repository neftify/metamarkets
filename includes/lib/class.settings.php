<?php
	function _setting($var, $specific = '') {
		echo get_setting($var, $specific);
	}

	function update_setting($id, $value) {
		global $db;

		$q = $db->prepare ( "UPDATE mm_settings SET value = ? WHERE id_setting = ?" );
		$q->bind_param ( 'si', $value, $id );		
	
		if ( $q->execute() ) {
			return true;
		}
		$q->close();
	
		return false;
	}

	function get_setting($var, $specific = '') {
		global $db;

		if ( $specific == true ) {
			$q = $db->prepare ( "SELECT * FROM mm_settings WHERE id_setting = ? LIMIT 1" );
			$q->bind_param ( 'i', $var );
		}
		else {
			$q = $db->prepare ( "SELECT value FROM mm_settings WHERE id_setting = ? LIMIT 1" );
			$q->bind_param ( 'i', $var );
		}

		$q->execute();
		$result = $q->get_result();
		$array = array();
		
		while ( $o = $result->fetch_array ( MYSQLI_ASSOC ) ) {
			if ( $specific == true ) {
				return $o;	
			}
			else {
				return $o['value'];	
			}
		}
		$q->close();
		
		return false;
	}
?>