<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kidtam
 */

?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-list--box">
		<div class="list-box--thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array('class' =>'thumb-img')); ?></a>
		</div>
		<div class="list-box--desc">
			<?php if(!empty($tags)): ?>
				<ul class="desc--tag-list list-unstyled list-inline">
				<?php foreach($tags as $t): ?>
					<li><a href="<?php echo get_tag_link($t->term_taxonomy_id); ?>" class="tag-link"><?php echo $t->name; ?></a></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<div class="desc--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<div class="desc--content"><?php echo wp_trim_words( get_the_content(), 250, '' ); ?> <a href="<?php the_permalink(); ?>" class="read-more">อ่านต่อ ></a></div>
			<ul class="social--share list-unstyle list-inline">
				<li><a rel="nofollow" class="share--button facebook" href="https://www.facebook.com/sharer.php?u=<?php echo the_permalink(); ?>" title="Share to Facebook" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-facebook"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>

</article><!-- #post-## -->


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', '_s' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
