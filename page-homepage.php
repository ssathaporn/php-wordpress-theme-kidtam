<?php get_header(); ?>

<?php
	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
	$args = array(
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'paged'	=> $paged,
	    'posts_per_page'=> get_option('posts_per_page')
	);
	$the_query = new WP_Query($args);

 ?>

 <?php if ($the_query->have_posts()): ?>

	<div class="grid">

 	<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
		<?php $tags = wp_get_post_tags(get_the_ID()); ?>

		<div class="col-md-4 col-sm-6 grid-item">
			<div class="card card-container">

				<div class="post-list--box">
					<div class="list-box--thumb">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array('style' =>'width: 100%;height:auto;', 'class' => 'thumb-img')); ?></a>
					</div>
					<div class="list-box--desc">
						<div class="desc--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					</div>
					<div class="list-box--desc">
						<div class="desc--content"><?php echo wp_trim_words( get_the_content(), 100, '' ); ?> <a href="<?php the_permalink(); ?>" class="read-more">อ่านต่อ ></a></div>
						<ul class="social--share list-unstyle list-inline">
							<li><a rel="nofollow" class="share--button facebook" href="https://www.facebook.com/sharer.php?u=<?php echo the_permalink(); ?>" title="Share to Facebook" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-facebook"></i></a></li>
						</ul>
					</div>
				</div>

			</div> <!-- .card-container -->
		</div> <!-- col-md-4 -->
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

	</div> <!-- .grid -->

	<div class="pagination">
	<?php
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?page=%#%',
			'current' => max( 1, get_query_var('page') ),
			'total' => $the_query->max_num_pages
		));
	 ?>
	 </div>

<?php else: ?>

	<div class="col-md-12">
		<div class="alert alert-danger text-center">
			Not ahve record to show.
		</div>
	</div>

<?php endif; ?>


<?php get_footer(); ?>
