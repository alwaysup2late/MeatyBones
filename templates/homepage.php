<?php
/**
 * Template Name: Homepage
 */
?>
<?php get_header(); ?>
	<?php if (get_option('mb_slider_enable') == 'yes') {?>
		<!-- BEGIN SLIDER -->
		<div id="slider" class="swipe col12">
			<?php 
				$args = array(
					'post_type' => 'homepage_slider',
					'posts_per_page' => 0
				);
				
				$loop = new WP_Query($args);
				echo '<ul class="swipe-wrap">';
					while ($loop->have_posts()) : $loop->the_post();
						echo '<li>';
							the_post_thumbnail('full');
							the_excerpt();
						echo '</li>';
					endwhile;
				echo '</ul>';
			?>
			<?php if (get_option('mb_slider_prevnext') == "yes") {?>
				<div id="prevNext" class="desktop">
					<a href="#" id="prev"><span>Prev</span></a>
					<a href="#" id="next"><span>Next</span></a>
				</div>
			<?php }?>
			<ul id="slideControls" class="desktop"></ul>
		</div>
		<!-- END SLIDER -->		
	<?php }?>

	<?php 
		$blurbcontent=get_post(get_option('mb_home_blurb'));
	?>
	<?php if (get_option('mb_blurb_enable') == "yes") {?>
		<!-- BEGIN BLURB -->
		<section class="blurb col12">
			<?php if (get_option('mb_blurb_title_enable') == "yes") {?>
				<h2><?php echo $blurbcontent->post_title?></h2>
			<?php }?> 
			<?php echo apply_filters('the_content', $blurbcontent->post_content);?>
		</section>
		<!-- END BLURB -->
	<?php }?>
	

	
	<?php 
		$box1=get_post(get_option('mb_home_box1'));
		$box2=get_post(get_option('mb_home_box2'));
		$box3=get_post(get_option('mb_home_box3'));
		$box4=get_post(get_option('mb_home_box4'));
	?>

	<?php if (get_option('mb_home_box1') != null) {?>
		<!-- begin home boxes -->
		<?php if (get_option('mb_home_box2') == null && get_option('mb_home_box3') == null && get_option('mb_home_box4') == null) {?>
			<aside class="homeBox col12">
		<?php } elseif (get_option('mb_home_box3') == null && get_option('mb_home_box4') == null){?>
			<aside class="homeBox col6">
		<?php } elseif (get_option('mb_home_box4') == null) {?>
			<aside class="homeBox col4">
		<?php } else {?>
			<aside class="homeBox col3">
		<?php }?>
			<?php if (get_option('mb_hb_title_enable') == 'yes') {?>
				<h3><?php echo $box1->post_title?></h3>
			<?php }?>
			<?php echo apply_filters('the_content', $box1->post_content);?>
			<?php if (get_option('mb_home_box1_link') != null) {?>
				<a href="<?php echo get_option('mb_home_box1_link')?>">
					<strong>Read more</strong>
				</a>
			<?php }?>
		</aside>
		<?php if (get_option('mb_home_box2') != null && get_option('mb_home_box1') != null) {?>
			<?php if (get_option('mb_home_box3') == null && get_option('mb_home_box4') == null){?>
				<aside class="homeBox col6 last">
			<?php } elseif (get_option('mb_home_box4') == null) {?>
				<aside class="homeBox col4">
			<?php } else {?>
				<aside class="homeBox col3">
			<?php }?>
				<?php if (get_option('mb_hb_title_enable') == 'yes') {?>
					<h3><?php echo $box2->post_title?></h3>
				<?php }?>
				<?php echo apply_filters('the_content', $box2->post_content);?>
				<?php if (get_option('mb_home_box2_link') != null) {?>
					<a href="<?php echo get_option('mb_home_box2_link')?>">
						<strong>Read more</strong>
					</a>
				<?php }?>
			</aside>
		<?php }?>
		<?php if (get_option('mb_home_box3') != null && get_option('mb_home_box1') != null && get_option('mb_home_box2') != null) {?>
			<?php if (get_option('mb_home_box3') == null && get_option('mb_home_box4') == null){?>
				<aside class="homeBox col6">
			<?php } elseif (get_option('mb_home_box4') == null) {?>
				<aside class="homeBox col4 last">
			<?php } else {?>
				<aside class="homeBox col3">
			<?php }?>
				<?php if (get_option('mb_hb_title_enable') == 'yes') {?>
					<h3><?php echo $box3->post_title?></h3>
				<?php }?>
				<?php echo apply_filters('the_content', $box3->post_content);?>
				<?php if (get_option('mb_home_box3_link') != null) {?>
					<a href="<?php echo get_option('mb_home_box3_link')?>">
						<strong>Read more</strong>
					</a>
				<?php }?>
			</aside>
		<?php }?>
		<?php if (get_option('mb_home_box4') != null && get_option('mb_home_box1') != null && get_option('mb_home_box2') != null && get_option('mb_home_box1') != null) {?>
			<?php if (get_option('mb_home_box3') == null && get_option('mb_home_box4') == null){?>
				<aside class="homeBox col6">
			<?php } elseif (get_option('mb_home_box4') == null) {?>
				<aside class="homeBox col4">
			<?php } else {?>
				<aside class="homeBox col3 last">
			<?php }?>
				<?php if (get_option('mb_hb_title_enable') == 'yes') {?>
					<h3><?php echo $box4->post_title?></h3>
				<?php }?>
				<?php echo apply_filters('the_content', $box4->post_content);?>
				<?php if (get_option('mb_home_box4_link') != null) {?>
					<a href="<?php echo get_option('mb_home_box4_link')?>">
						<strong>Read more</strong>
					</a>
				<?php }?>
			</aside>
		<?php }?>
		<!-- end home boxes -->
	<?php }?>
<?php get_footer(); ?>