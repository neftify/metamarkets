<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>

<!-- Dashboard Container -->
<div class="dashboard-container">

<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li <?php is_this_menu_active('/dashboard'); ?>><a href="/dashboard"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
						</ul>
						
						<ul data-submenu-title="Organize and Manage">
							<li <?php is_this_menu_active('/dashboard-applicants'); ?>><a href="/dashboard-applications"><i class="icon-material-outline-business-center"></i> Applicantions</a>	</li>
						</ul>

						<ul data-submenu-title="Account">
							<li <?php is_this_menu_active('/dashboard-profile'); ?>><a href="/dashboard-profile"><i class="icon-material-outline-settings"></i> Profile</a></li>
							<li><a href="/logout"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->