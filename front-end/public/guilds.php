<?php
	if ( !defined('FRONTEND_LOAD') ) { die ( header('Location: /not-found') ); }
?>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Browse Guilds</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li>Browse Guilds</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="letters-list">
				<a href="?q=a" class="<?php if(empty($_GET['q'])) { echo 'current'; } else { is_current_q('a'); } ?>">A</a>
				<a href="?q=b" class="<?php is_current_q('b'); ?>">B</a>
				<a href="?q=c" class="<?php is_current_q('c'); ?>">C</a>
				<a href="?q=d" class="<?php is_current_q('d'); ?>">D</a>
				<a href="?q=e" class="<?php is_current_q('e'); ?>">E</a>
				<a href="?q=f" class="<?php is_current_q('f'); ?>">F</a>
				<a href="?q=g" class="<?php is_current_q('g'); ?>">G</a>
				<a href="?q=h" class="<?php is_current_q('h'); ?>">H</a>
				<a href="?q=i" class="<?php is_current_q('i'); ?>">I</a>
				<a href="?q=j" class="<?php is_current_q('j'); ?>">J</a>
				<a href="?q=k" class="<?php is_current_q('k'); ?>">K</a>
				<a href="?q=l" class="<?php is_current_q('l'); ?>">L</a>
				<a href="?q=m" class="<?php is_current_q('m'); ?>">M</a>
				<a href="?q=n" class="<?php is_current_q('n'); ?>">N</a>
				<a href="?q=o" class="<?php is_current_q('o'); ?>">O</a>
				<a href="?q=p" class="<?php is_current_q('p'); ?>">P</a>
				<a href="?q=q" class="<?php is_current_q('q'); ?>">Q</a>
				<a href="?q=r" class="<?php is_current_q('r'); ?>">R</a>
				<a href="?q=s" class="<?php is_current_q('s'); ?>">S</a>
				<a href="?q=t" class="<?php is_current_q('t'); ?>">T</a>
				<a href="?q=u" class="<?php is_current_q('u'); ?>">U</a>
				<a href="?q=v" class="<?php is_current_q('v'); ?>">V</a>
				<a href="?q=w" class="<?php is_current_q('w'); ?>">W</a>
				<a href="?q=x" class="<?php is_current_q('x'); ?>">X</a>
				<a href="?q=y" class="<?php is_current_q('y'); ?>">Y</a>
				<a href="?q=z" class="<?php is_current_q('z'); ?>">Z</a>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="companies-list">

                <?php
                    $q = 'a'; // lets start with a

                    if(isset($_GET['q'])) {
                        if($_GET['q']=='a' || $_GET['q']=='b' || $_GET['q']=='c' || $_GET['q']=='d' || $_GET['q']=='e' || $_GET['q']=='f' || $_GET['q']=='g' || $_GET['q']=='h' || $_GET['q']=='i'
                        || $_GET['q']=='j' || $_GET['q']=='k' || $_GET['q']=='l' || $_GET['q']=='m' || $_GET['q']=='n' || $_GET['q']=='o' || $_GET['q']=='p' || $_GET['q']=='q' || $_GET['q']=='r'
                        || $_GET['q']=='s' || $_GET['q']=='t' || $_GET['q']=='u' || $_GET['q']=='v' || $_GET['q']=='w' || $_GET['q']=='x' || $_GET['q']=='y' || $_GET['q']=='z') {
                            $q = $_GET['q'];
                        }
                    }

                    $query = get_users('all', array(
                        0 => array("type" => "CHR", "condition" => "AND", "loose" => false, "table" => "type", "command" => "=", "value" => "guild")
                    ));

                    foreach($query as $id => $value) {
                        //lets verify if it does not match the correct letter
                        $name = get_metadata_by_user_id($value['id_user'], 'fullname');
                        $first_character = strtolower($name[0]);
                        if($first_character!=$q) {
                            continue;
                        }
                ?>


				<a href="<?php echo return_user_uri($value['id_user']); ?>" class="company">
					<div class="company-inner-alignment">
						<span class="company-logo"><img src="<?php echo get_user_profile_image($value['id_user']); ?>" alt="<?php echo get_user_name($value['id_user']); ?>"></span>
						<h4><?php echo get_user_name($value['id_user']); ?></h4>
					</div>
				</a>

                <?php
                    }
                ?>

			</div>
		</div>
	</div>
</div>


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->