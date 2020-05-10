<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidtam
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4">
	<aside id="secondary" class="widget-area" role="complementary">
		<div class="card card-container search--container visible-md visible-lg">
			<form action="/" class="kidtam--form">
				<input type="text" name="s" class="form-control" placeholder="ใส่ข้อความ .....">
				<input type="submit" value="ค้นหา">
			</form>
		</div>
		<div class="card card-container">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
		<div class="card card-container">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
		<!-- subscribe -->
		<div class="card">
			<div class="subscribe--container">
				<h4 class="text-center">สมัครรับข่าวสาร</h4>
				<form class="subscribe--form" action="">
					<input type="text" placeholder="Email">
					<button type="submit">ส่ง</button>
				</form>
			</div>
		</div>
		<!-- adsence -->
		<div class="card">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	</aside><!-- #secondary -->
</div>
