<?php

    function social_tags($array) {
        //General Tags
        echo '<meta name="twitter:site" content="'.get_setting(1).'">'."\n";
        echo '<meta property="og:site_name" content="'.get_setting(1).'" />'."\n";
        echo '<meta name="twitter:card" content="summary">'."\n";
        echo '<meta property="og:type" content="article" />'."\n";

        //Title Tags
        if(!empty($array['title'])) {
            echo '<meta name="twitter:title" content="'.$array['title'].'">'."\n";
            echo '<meta property="og:title" content="'.$array['title'].'" />'."\n";
        }

        //Description tags
        if(!empty($array['description'])) {
            echo '<meta name="twitter:description" content="'.$array['description'].'">'."\n";
        }

        //Twitter Summary card images must be at least 120x120px
        if(!empty($array['image'])) {
            echo '<meta name="twitter:image" content="'.$array['image'].'">'."\n";
            echo '<meta property="og:image" content="'.$array['image'].'" />'."\n";
        }
        else {
            echo '<meta name="twitter:image" content="'.get_domain().'/front-end/images/social-media-picture.jpg">'."\n";
            echo '<meta property="og:image" content="'.get_domain().'/front-end/images/social-media-picture.jpg" />'."\n";
        }

        //Url 
        echo '<meta property="og:url" content="'.get_actual_url($array).'" />'."\n";
    }

    function seo_title($array) {
        if ( !empty($array['extra_title']) ) { 
            echo $array['extra_title']." &bull; "; 
        }	 
        if ( !empty($array['title']) ) { 
            echo $array['title']." &bull; "; 
        } 
        if ( $array == '404' ) {
            echo "Oops! Page not found &bull; "; 
        }

        _setting(1);
    }

    function canonical_url($array) {
        $url = get_actual_url($array);

        echo "<link rel=\"canonical\" href=\"$url\" />\n";
    }

    function general_description($array) {
        if(!empty($array['description'])) {
            echo "<meta name=\"description\" content=\"{$array['description']}\">\n";
        }
    }

    function print_seo($array) {
	    if($array == '404') {
		    echo '<meta name="robots" content="noindex, follow">';
		    echo '<meta name="googlebot" content="noindex, follow">';
	    } 
	    else {
            canonical_url($array);
            general_description($array);
    
            social_tags($array);
	    }
    }
?>