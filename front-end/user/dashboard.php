<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>
<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Howdy, <?php echo  get_user_name(); ?> !</h3>
				<span>We are glad to see you again!</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li>Dashboard</li>
					</ul>
				</nav>
			</div>

            <div>
                <?php 
                    if(is_profile_missing_something()) {
                        $form_info = 'Lets finish your profile setup to get better visibility in Metamarkets. Click <a href="/dashboard-profile">here</a> to add your info (takes 60 seconds)';
                    }
                    show_message(); 
                ?>
            </div>
	
			<!-- Fun Facts Container -->
			<div class="fun-facts-container">

                <?php 
                    $number = 0;
                    if(is_guild()) {
						$title = 'Players';
                        $number = get_user_application('count', array(
                            0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "id_user_to", "command" => "=", "value" => $user['id_user'])
                        ));
                    }
                    else {
						$title = 'Guilds';
                        $number = get_user_application('count', array(
                            0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "id_user_from", "command" => "=", "value" => $user['id_user'])
                        ));
                    }
                ?>
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span><?php echo $title; ?> Applications</span>
						<a href="/dashboard-applications"><h4><?php echo $number; ?></h4></a>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>

				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						<span>Total Profile Views</span>
						<h4><?php echo $user['visits']; ?></h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
				</div>
			</div>
			