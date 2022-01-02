<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }

    if(is_guild()) {
        $application_desc = 'Player Applications for '.get_user_name();
        $number_desc = 'Players';
        $id_user_type = 'id_user_from';

        $query = array(
            0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "id_user_to", "command" => "=", "value" => $user['id_user'])
        );
        $count_number = get_user_application('count', $query);
    }
    else {
        $application_desc = 'My Guild Applications';
        $number_desc = 'Guilds';
        $id_user_type = 'id_user_to';


        $query = array(
            0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "id_user_from", "command" => "=", "value" => $user['id_user'])
        );
        $count_number = get_user_application('count', $query);
    }

    
?>
<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Applications</h3>
				<span class="margin-top-7"><?php echo $application_desc; ?></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/dashboard">Dashboard</a></li>
						<li>Applications</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-supervisor-account"></i> <?php echo $count_number; ?> <?php echo $number_desc; ?></h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">

                                <?php
                                    foreach(get_user_application('all', $query) as $id => $value) {
                                        // lets get the data
                                        $value = get_user_by_id($value[$id_user_type]);
                                ?>
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<?php
                                                    if($value['verified'] == 'yes') {
                                                ?>
                                                    <div class="verified-badge"></div>
                                                <?php
                                                    }
                                                ?>
												<a target="blank" href="<?php echo return_user_uri($value['id_user']); ?>"><img src="<?php echo get_user_profile_image($value['id_user']); ?>" alt=""></a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a target="blank" href="<?php echo return_user_uri($value['id_user']); ?>"><?php echo get_user_name($value['id_user']); ?></h4>

												<!-- Details -->
                                                <?php
                                                    if($value['email']) {
                                                ?>
												<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> <?php echo $value['email']; ?></a></span>
                                                <?php
                                                    }
                                                ?>

                                                <?php   
                                                    if(get_user_discord($value['id_user'])) {
                                                        if(is_url(get_user_discord($value['id_user']))) {
                                                            $text = '<a href="'.get_user_discord($value['id_user']).'" target="_blank">'.get_user_discord($value['id_user']).'</a>';
                                                        }
                                                        else {
                                                            $text = get_user_discord($value['id_user']);
                                                        }
                                                ?>
												    <span class="freelancer-detail-item"><i class="icon-brand-discord"></i> <?php echo $text; ?> </span>
                                                <?php
                                                    }
                                                ?>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
                                                    <?php   
                                                        if(get_user_twitter($value['id_user'])) {
                                                    ?>
													<a  target="blank" href="<?php echo get_user_twitter($value['id_user']); ?>" class="button ripple-effect" style="color: #fff;"><i class="icon-brand-twitter"></i> Twitter</a>
                                                    <?php
                                                        }
                                                    ?>
												</div>
											</div>
										</div>
									</div>
								</li>
                                <?php
                                    }
                                ?>

							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->
