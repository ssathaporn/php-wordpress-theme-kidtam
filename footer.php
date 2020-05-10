<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidtam
 */

?>

	</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-right" role="contentinfo">
		Copyright 2016 @KIDTAM. All Rights Reserved
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<!-- jQuery -->
<script src="<?php echo get_template_directory_uri().'/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo get_template_directory_uri().'/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo get_template_directory_uri().'/assets/js/main.min.js'; ?>"></script>
<!-- isotobe -->
<script src="<?php echo get_template_directory_uri().'/bower_components/isotope/dist/isotope.pkgd.min.js'; ?>"></script>
<!-- imagesloaded -->
<script src="<?php echo get_template_directory_uri().'/bower_components/imagesloaded/imagesloaded.pkgd.min.js'; ?>"></script>
<!-- app -->
<script src="<?php echo get_template_directory_uri().'/js/app.js'; ?>"></script>

</body>
</html>
