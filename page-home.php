<?php
/**
 * Template Name: Page – Home
 * The template for displaying the home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Jacuzzi
 */

get_header(); ?>


	<?php while ( have_posts() ) : the_post(); ?>
	<div id="stage">
		<section id="features">
			<div class="wrap">
			<?php
			$heros = get_field('nlk_hero_section');
			$count = 0;
			if( $heros ){
				foreach ( $heros as $key => $hero ){
					$bg = $hero['nlk_background_image'];

					// stop showing these if more than 2
					if( $count < 2 ){ ?>
						<div class="bgwrap">
							<div class="bg-<?php echo $key?>" style="background:url(<?php echo $bg['url']?>) no-repeat top center">
								<a class="link-cover" href="<?php echo $hero['nlk_button_link']?>"></a>
							</div>
						</div>
						<div class="one-half">
							<div class="hero-content hmatch hero-<?php echo $key?>" style="background:url(<?php echo $bg['url']?>) no-repeat top center">
								<div class="hero-inner">
									<h2><?php echo $hero['nlk_hero_title']?></h2>
									<span class="button"><?php echo $hero['nlk_button_text']?></span>
								</div>

								<a class="link-cover" href="<?php echo $hero['nlk_button_link']?>"></a>
							</div>

						</div>

					<?php }
					$count++;
				}
			}
			?>
			</div>
		</section>

		<?php if( !get_field('nlk_hide_callout') ) { ?>
		<section id="callouts">
			<div class="wrap">
			<?php
			$callouts = get_field('nlk_callout_section');
			$count = 0;
			if( $callouts ){
				$callcount = count($callouts);
				foreach ( $callouts as $callout ){
					$bg = $callout['nlk_background_image'];

					if( $callcount % 2 == 0 || $count < $callcount - 1 ){ ?>
						<div class="one-half <?php echo ( $count % 2 == 0 ? 'callout-left' : 'callout-right' ); ?>">
							<div class="callout-center">
								<div class="callout-content one-half hmatch">
									<h4><?php echo $callout['nlk_box_title']?></h4>
									<p><?php echo $callout['nlk_box_caption']?></p>
									<span class="button trans"><?php echo $callout['nlk_button_text']?></span>
								</div>
								<div class="callout-image one-half">
									<img src="<?php echo $bg['url']?>"/>
								</div>
							</div>
							<a class="link-cover" href="<?php echo $callout['nlk_button_link']?>"></a>
						</div>
					<?php }
					else { ?>
						<div class="one-half callout-full">
							<div class="callout-center">
								<div class="callout-content one-half hmatch">
									<h4><?php echo $callout['nlk_box_title']?></h4>
									<p><?php echo $callout['nlk_box_caption']?></p>
									<span class="button trans"><?php echo $callout['nlk_button_text']?></span>
								</div>
								<div class="callout-image one-half">
									<img src="<?php echo $bg['url']?>"/>
								</div>
							</div>
							<a class="link-cover" href="<?php echo $callout['nlk_button_link']?>" target="_blank"></a>
						</div>
					<?php }

					$count++;
				}
			}
			?>
			</div>
		</section>
		<?php } ?>

		<section id="video">
			<div class="wrap">
			<?php
			$videoTitle = get_field('nlk_video_title');
			$videoEmbed = get_field('nlk_video_embed');

			if( $videoEmbed ){
				echo '<h4>'. $videoTitle .'</h4>';
				echo '<div class="videoWrapper">';
				echo '<iframe width="560" height="349" src="http://www.youtube.com/embed/'.$videoEmbed.'?rel=0&hd=1&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
				echo '</div>';
			}
			?>
			</div>
		</section>

	<?php endwhile; // end of the loop. ?>

	<section id="special-offers">
		<div class="wrap">
			<h4>Receive updates and special offers</h4>
			<?php /*
			<form>
				<input type="email" placeholder="email" name="email"/>
				<input type="zip" placeholder="zip" name="zip"/>
				<input type="submit" value="Sign Up"/>
			</form>
			*/ ?>
			<script type="text/javascript" src="http://login.sendmetric.com/phase2/bhecho_files/smartlists/check_entry.js"></script>
			<script type="text/javascript">
                    	<!--
                    		function check_cdfs(form) {
                    			return true;
                    		}
                    	-->
            </script>
            <script type="text/javascript">
                    <!--
                        function doSubmit() {
                            if (check_cdfs(document.survey)) {
                    			window.open('','signup','resizable=1,scrollbars=0,width=300,height=150');
                                return true;
                            }
                            else { return false; }
                        }
                    -->
            </script>
			<form action="http://login.sendmetric.com/phase2/bullseye/contactupdate1.php3" method="post" name="bullseye" id="bullseye" onsubmit="return doSubmit();" target="signup">
                <input type="hidden" name="cid" value="325a091ebb4d440d143f7a6676e8c5bd">
                <input type="email" value="Email" class="text email" name="email" onfocus="if(jQuery(this).val() == 'Email') jQuery(this).val('');" onblur="if(jQuery(this).val() == '') jQuery(this).val('Email');">
                <input type="zip" value="Zip" class="text zip" name="postal_code" onfocus="if(jQuery(this).val() == 'Zip') jQuery(this).val('');" onblur="if(jQuery(this).val() == '') jQuery(this).val('Zip');">
                <input type="hidden" name="message" value="Thank you. Your information has been submitted. To ensure delivery of your newsletter(s), please add donotreply@jacuzzi.com to your address book, spam filter whitelist, or tell your company's IT group to allow this address to pass through any filtering software they may have set up.">
                <input type="submit" name="SubmitBullsEye" value="Sign Up" onclick="var s=s_gi('jacuzzipremiumhottubs.jacuzzi.com');s.linkTrackVars='events';s.linkTrackEvents='event1';s.events='event1';s.tl(this,'o','Email Signup');">
                <input type="hidden" name="grp[]" value="1213717">
            </form>
		</div>
	</section>


	<section id="accordion">
		<div class="wrap">
		<?php
		$items = get_field('nlk_accordion_section');
		if( $items ){
			foreach ( $items as $key => $item ){
				echo '<dt><a href="#' . $key . '">'. $item['nlk_accordion_title'] .'</a></dt>';
				echo '<dd id="' . $key . '">'. $item['nlk_accordion_content'] .'</dd>';
			}
		}
		?>
		</div>
	</section>
</div>

<?php get_footer(); ?>
