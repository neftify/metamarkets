<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>
<!-- Footer -->
			<div class="dashboard-footer-spacer"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
                    © <?php echo date("Y"); ?> Neftify. All rights reserved.
				</div>
				<ul class="footer-social-links">
					<li>
						<a target="_blank" href="<?php echo get_medium_link(); ?>" title="Medium" data-tippy-placement="top">
							<i class="icon-brand-medium"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo get_twitter_link(); ?>" title="Twitter" data-tippy-placement="top">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo get_main_discord_link(); ?>" title="Discord" data-tippy-placement="top">
							<i class="icon-brand-discord"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="<?php echo get_github_link(); ?>" title="Github" data-tippy-placement="top">
							<i class="icon-brand-github"></i>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

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

</body>
</html>