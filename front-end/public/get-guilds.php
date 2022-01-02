<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>

<!-- Titlebar
================================================== -->
<div class="single-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><img src="<?php echo get_user_profile_image($guild['id_user']); ?>" alt="<?php echo get_user_name($guild['id_user']); ?>"></div>
						<div class="header-details">
							<h3><?php echo get_user_name($guild['id_user']); ?></h3>
							<ul>
                                <?php
                                    if($guild['verified']=='yes') {
                                ?>
								    <li><div class="verified-badge-with-title">Verified</div></li>
                                <?php
                                    }
                                ?>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<!-- Breadcrumbs -->
						<nav id="breadcrumbs" class="white">
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="/guilds">Browse Guilds</a></li>
								<li><?php echo get_user_name($guild['id_user']); ?></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<div class="single-page-section">
				<?php show_message(); ?>
				<h3 class="margin-bottom-25">About <?php echo get_user_name($guild['id_user']); ?></h3>
				<p><?php echo get_guild_description($guild['id_user']); ?></p>
			</div>

		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

                <div class="sidebar-widget">
					<form method="post">
                    	<button name="submit" type="submit" class="button button-sliding-icon apply-now-button">Apply Now <i class="icon-material-outline-arrow-right-alt"></i></button>
					</form>
                </div>

				<!-- Widget -->
                <?php
                    $twitter = get_user_twitter($guild['id_user']);
                    $discord = get_user_discord($guild['id_user']);
                    $medium = get_user_medium($guild['id_user']);

                    if($twitter || $discord || $medium) {
                ?>
				<div class="sidebar-widget">
					<h3>Social Profiles</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
                            <?php
                                if($twitter) {
                            ?>
							    <li><a href="<?php echo $twitter; ?>" target="_blank" rel="nofollow" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
                            <?php
                                }
                            ?>
                            <?php
                                if($discord) {
                            ?>
							    <li><a href="<?php echo $discord; ?>" target="_blank" rel="nofollow" title="Discord" data-tippy-placement="top"><i class="icon-brand-discord"></i></a></li>
                            <?php
                                }
                            ?>
                            <?php
                                if($medium) {
                            ?>
							    <li><a href="<?php echo $medium; ?>" target="_blank" rel="nofollow" title="Medium" data-tippy-placement="top"><i class="icon-brand-medium"></i></a></li>
                            <?php
                                }
                            ?>
							
							
						</ul>
					</div>
				</div>
                <?php
                    }
                ?>

			</div>
		</div>

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->