<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>
<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Profile</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="/dashboard">Dashboard</a></li>
						<li>Profile</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
                    <?php show_message(); ?>
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
						</div>

                        <form method="post" enctype="multipart/form-data">
						<div class="content with-padding padding-bottom-0">

							<div class="row">

								<div class="col-auto">
									<div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
										<img class="profile-pic" src="<?php echo get_user_profile_image(); ?>" alt="" />
										<div class="upload-button"></div>
										<input class="file-upload" type="file" name="file" accept="image/*"/>
									</div>
                                    <span>Click to change image</span>
								</div>

								<div class="col">
									<div class="row">

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Name</h5>
												<input name="fullname" type="text" class="with-border" placeholder="Enter your or your organization name" value="<?php echo get_user_name(); ?>">
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>Email</h5>
												<input type="email" name="email" class="with-border" placeholder="Enter your email" value="<?php echo $user['email']; ?>">
											</div>
										</div>

										<div class="col-xl-3">
											<!-- Account Type -->
											<div class="submit-field">
												<h5>Account Type</h5>
												<div class="account-type">
                                                    <?php 
                                                        if(is_guild()) {
                                                    ?>

                                                    <div>
														<input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio" checked/>
														<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Guild</label>
													</div>
                                                    <?php
                                                        }
                                                        else {
                                                    ?>
													<div>
														<input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio" checked/>
														<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Player</label>
													</div>
                                                    <?php
                                                        }
                                                    ?>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-face"></i> My Profile (people will see it in your <a target="_blank" href="<?php echo return_user_uri(); ?>">profile page</a>)</h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row">

									<div class="col-xl-12">
										<div class="submit-field">
											<h5>About</h5>
                                            <?php 
                                                if(!empty($_SESSION['about'])) {
                                                    echo '<p>We saved your about section content, you can finish editing it...</p>';
                                                    $description = $_SESSION['about'];
                                                }
                                                else {
                                                    $description = get_user_description();
                                                }
                                            ?>
											<textarea name="about" cols="30" rows="5" class="with-border"><?php echo $description; ?></textarea>
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Username</h5>
											<input type="text" class="with-border" name="uri" value="<?php echo $user['uri']; ?>">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Twitter Link</h5>
											<input type="text" class="with-border" name="twitter" placeholder="Example: <?php echo get_twitter_link(); ?>" value="<?php echo get_user_twitter(); ?>">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
                                            <?php
                                                if(is_guild()) {
                                                    echo '<h5>Discord Link</h5>';
                                                    $placeholder = 'Example: '.get_main_discord_link();;
                                                }
                                                else {
                                                    echo '<h5>Discord Username (include the last 4 numbers)</h5>';
                                                    $placeholder = 'Example: neftify#1234';
                                                }
                                            ?>
											
											<input type="text" class="with-border" name="discord" placeholder="Example: <?php echo $placeholder; ?>" value="<?php echo get_user_discord(); ?>">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Medium Link</h5>
											<input type="text" class="with-border" name="medium" placeholder="Example: <?php echo get_medium_link(); ?>" value="<?php echo get_user_medium(); ?>">
										</div>
									</div>
								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>
				
				<!-- Button -->
				<div class="col-xl-12">
                    <button class="button button-sliding-icon margin-top-10" name="submit" type="submit">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>
				</div>

                </form>

			</div>
			<!-- Row / End -->