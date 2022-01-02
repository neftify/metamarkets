<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>
<!-- Footer
================================================== -->
<div id="footer">
	
	<!-- Footer Top Section -->
	<div class="footer-top-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">

					<!-- Footer Rows Container -->
					<div class="footer-rows-container">
						
						<!-- Left Side -->
						<div class="footer-rows-left">
							<div class="footer-row">
								<div class="footer-row-inner footer-logo">
									<img src="/front-end/images/logo-white.png" alt="">
								</div>
							</div>
						</div>
						
						<!-- Right Side -->
						<div class="footer-rows-right">

							<!-- Social Icons -->
							<div class="footer-row">
								<div class="footer-row-inner">
									<ul class="footer-social-links">
										<li>
											<a target="_blank" href="<?php echo get_medium_link(); ?>" title="Medium" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-medium"></i>
											</a>
										</li>
										<li>
											<a target="_blank" href="<?php echo get_twitter_link(); ?>" title="Twitter" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-twitter"></i>
											</a>
										</li>
										<li>
											<a target="_blank" href="<?php echo get_main_discord_link(); ?>" title="Discord" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-discord"></i>
											</a>
										</li>
										<li>
											<a target="_blank" href="<?php echo get_github_link(); ?>" title="Github" data-tippy-placement="bottom" data-tippy-theme="light">
												<i class="icon-brand-github"></i>
											</a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>

					</div>
					<!-- Footer Rows Container / End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Top Section / End -->

	<!-- Footer Middle Section -->
	<div class="footer-middle-section">
		<div class="container">
			<div class="row">

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Company</h3>
						<ul>
							<li><a href="https://neftify.com/about"><span>About</span></a></li>
							<li><a href="https://neftify.com/team"><span>Team</span></a></li>
							<li><a href="https://neftify.com/careers"><span>Careers</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Community</h3>
						<ul>
							<li><a target="_blank" href="https://medium.com/neftify"><span>Medium</span></a></li>
							<li><a target="_blank" href="https://twitter.com/neftify"><span>Twitter</span></a></li>
							<li><a target="_blank" href="https://discord.com/invite/p72MzBezKz"><span>Discord</span></a></li>
							<li><a target="_blank" href="https://github.com/neftify"><span>Github</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Individuals</h3>
						<ul>
							<li><a href="https://neftify.com/lender"><span>Become a lender</span></a></li>
							<li><a href="https://neftify.com/player"><span>Become a player</span></a></li>
							<li><a href="https://neftify.com/rewards"><span>Neftify Rewards</span></a></li>
							<li><a href="/"><span>Metamarkets</span></a></li>
							<li><a href="https://safu.neftify.com/"><span>SaFu</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Links -->
				<div class="col-xl-2 col-lg-2 col-md-3">
					<div class="footer-links">
						<h3>Markets</h3>
						<ul>
							<li><a href="https://neftify.com/markets-axie-infinity"><span>Axie Infinity</span></a></li>
							<li><a href="https://neftify.com/markets-helium"><span>Helium</span></a></li>
						</ul>
					</div>
				</div>

				<!-- Newsletter -->
				<div class="col-xl-4 col-lg-4 col-md-12">
					<h3><i class="icon-feather-mail"></i> Subscribe to our newsletter</h3>
					<p>The latest news, articles, and resources, on P2E sent to your inbox weekly.</p>
					<form id="chimp-form" action="/front-end/mailchimp/subscribe.php" method="post" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded" class="newsletter" novalidate>
						<input id="chimp-email" type="text" name="fname" placeholder="Enter your email">
						<button type="submit"><i class="icon-feather-arrow-right"></i></button>
					</form>

					<div id="response" style="margin-top: 20px;"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Middle Section / End -->
	
	<!-- Footer Copyrights -->
	<div class="footer-bottom-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					© <?php echo date("Y"); ?> Neftify. All rights reserved.
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Copyrights / End -->

</div>
<!-- Footer / End -->

</div>
<!-- Wrapper / End -->

<!-- Scripts
================================================== -->
<script src="/front-end/js/jquery-3.6.0.min.js"></script>
<script src="/front-end/js/jquery-migrate-3.3.2.min.js"></script>
<script src="/front-end/js/mmenu.min.js"></script>
<script src="/front-end/js/tippy.all.min.js"></script>
<script src="/front-end/js/simplebar.min.js"></script>
<script src="/front-end/js/bootstrap-slider.min.js"></script>
<script src="/front-end/js/bootstrap-select.min.js"></script>
<script src="/front-end/js/snackbar.js"></script>
<script src="/front-end/js/clipboard.min.js"></script>
<script src="/front-end/js/counterup.min.js"></script>
<script src="/front-end/js/magnific-popup.min.js"></script>
<script src="/front-end/js/slick.min.js"></script>
<script src="/front-end/js/custom.js"></script>

<script src="/front-end/js-w3/web3.min.js"></script>
<script src="/front-end/js-w3/web3modal-index.js"></script>
<script src="/front-end/js-w3/web3-provider-index.min.js"></script>
<script src="/front-end/js-w3/vue.min.js"></script>
<script src="/front-end/js-w3/axios.min.js"></script>
<script src="/front-end/js-w3/web3-modal.js"></script>
<script src="/front-end/js-w3/web3-app.js"></script>
<script src="/front-end/js-w3/nacl.min.js"></script>
<script src="/front-end/js-w3/nacl-util.min.js"></script>
<script src="/front-end/js-w3/jquery.validate.min.js"></script>
<script src="/front-end/js-w3/custom.js"></script>

<?php
	if(get_host() == 'metamarkets.neftify.com') {
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M2VQPCLGKQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-M2VQPCLGKQ');
    </script>
<?php
    }
?>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>

</body>
</html>


