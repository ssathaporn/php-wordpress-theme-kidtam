<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kidtam
 */

get_header(); ?>
<div class="col-md-8">
<div class="card card-container">

	<div class="post-single--container">
		<div class="post-single--top">
			<div class="post--created">
				<?php echo "โพสโดย ".get_the_author()." - ".get_the_date(); ?>
			</div>
			
			<h2 class="post--title"><?php echo get_the_title(); ?></h2>


			<div class="post--share">
				<a rel="nofollow" class="share--button facebook big" href="https://www.facebook.com/sharer.php?u=<?php echo the_permalink(); ?>" title="Share to Facebook" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-facebook"></i> Share to Facebook</a>
			</div>
		</div>
		<div class="post-single--content">
			<?php the_content(); ?>

<span style="color: #ff0000;">**หมายเหตุ</span> ในบางกรณี เป็นสื่อกลางในการรวบรวมบทความ และนำเสนอข้อมูลที่มีอยู่แล้วในสื่อต่างๆ โดยเราจะอ้างอิง ให้เครดิต ถึงแหล่งที่มาในทุกๆ ครั้งไป
			<div class="post--share">
				<a rel="nofollow" class="share--button facebook big" href="https://www.facebook.com/sharer.php?u=<?php echo the_permalink(); ?>" title="Share to Facebook" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-facebook"></i> Share to Facebook</a>
			</div>
		</div>

		<?php echo do_shortcode('[fbcomments]'); ?>
		
		<div class="related-post--container">
			<h2>บทความแนะนำ</h2>
			<?php get_related_posts_thumbnails(); ?> 
		</div>
	</div>
	
</div>
</div>
<?php
get_sidebar();
get_footer();