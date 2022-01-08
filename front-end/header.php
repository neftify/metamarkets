<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo seo_title($seo); ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <?php print_seo($seo); ?>

        <link rel="stylesheet" href="/front-end/css/style.css">
        <link rel="stylesheet" href="/front-end/css/colors/purple.css">

		<link rel="apple-touch-icon" sizes="180x180" href="/front-end/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/front-end/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/front-end/favicons/favicon-16x16.png">
		<link rel="manifest" href="/front-end/favicons/site.webmanifest">
		<link rel="mask-icon" href="/front-end/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="/front-end/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#603cba">
		<meta name="msapplication-config" content="/front-end/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

        <style>
            #email-error {
                position: relative;
                left: 100px;
                right: 0;
                bottom: 0;
                font-family: "Montserrat";
                font-size: 13px;
                font-weight: 500;
                color: #ff3333;
            }
            #chimp-email-error {
                position: relative;
                left: 0;
                right: 0;
                bottom: 0;
                vertical-align: middle;
                font-family: "Montserrat";
                font-size: 13px;
                font-weight: 500;
                color: red;
            }
            a.safu {
                color: #ec5568 !important;
            }
            a.safu:hover {
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity)) !important;
            }
        </style>
    </head>
    <body <?php if($body_grey) { echo 'class="gray"'; } ?>>

    <!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth <?php echo $header_container; ?>">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="/"><img src="/front-end/images/logo-2.png" alt=""></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						<?php
							if($user) {
						?>
							<li><a href="/dashboard">My Dashboard</a></li>
						<?php
							}
						?>

						<li><a href="/about">About</a></li>

						<li><a href="/guilds">Find Guilds</a></li>

						<li><a href="/players">Find Players</a></li>

						<li><a href="/metajobs">Find Metajobs</a></li>

						<li><a href="/what-is-metamarkets">What is Metamarkets?</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">

				<?php
					if($user) {
						$image = get_user_profile_image();

						if(!$image) {
							$image = '/front-end/images/user-avatar-small-01.jpg';
						}
				?>
				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#"><div class="user-avatar status-online"><img src="<?php echo $image; ?>" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="<?php echo $image; ?>" alt=""></div>
									<div class="user-name">
										<?php echo get_user_name(); ?> <span><?php echo get_user_category_in_name_form(); ?></span>
									</div>
								</div>	
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="/dashboard"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="/dashboard-profile"><i class="icon-material-outline-settings"></i> Profile</a></li>
							<li><a href="/logout"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->
				<?php
					}
				?>

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->





