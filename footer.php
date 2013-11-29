		<div class="clearfix"></div>
	</section>
	<!-- End .wrapper -->
	<footer>
		<?php if (get_option('mb_base_width_setting') == 'large') {?>
			<section class="onepcssgrid-1200">
		<?php } else {?>
			<section class="onepcssgrid-1000">
		<?php }?>		
			<?php if (function_exists('is_sidebar_active') && is_sidebar_active('footer_left')) { ?>
				<?php if (is_sidebar_active('footer_left') && !is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) { ?>
					<div class="col12">
				<?php } elseif (is_sidebar_active('footer_left') && is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) {?>
					<div class="col6">
				<?php } else {?>
					<div class="col4">
				<?php }?>
					<?php dynamic_sidebar('footer_left'); ?>
				</div>
				<?php if (is_sidebar_active('footer_center')) { ?>
					<?php if (is_sidebar_active('footer_left') && is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) {?>
					     <div class="col6 last">
					<?php } else {?>
					     <div class="col4">
					<?php }?>
						<?php dynamic_sidebar('footer_center'); ?>
					</div>
				<?php } ?>
				<?php if (is_sidebar_active('footer_right')) { ?>
					<?php if (is_sidebar_active('footer_left') && is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) {?>
					     <div class="col6">
					<?php } else {?>
					     <div class="col4 last">
					<?php }?>
						<?php dynamic_sidebar('footer_right'); ?>
					</div>
				<?php } ?>
			<?php } ?>
			<div class="copyright col12">
				<?php 
					if (get_option('mb_copyright') <> "") {
						echo stripslashes(get_option('mb_copyright'));
					}
				?>
			</div>

			<div class="clearfix"></div>
		</section>
	</footer>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>
<script type="text/javascript">MB.PageData.baseURL = "<?php bloginfo('template_directory'); ?>";</script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>//js/vendor/selectnav.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/module/mobileNav.js"></script>

<?php if (get_option('mb_slider_enable') == 'yes' && is_front_page()) {?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/vendor/swipe.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/module/slider.js"></script>
	<script type="text/javascript">
		MB.Slider.initSlider();
	</script>

	<?php if (get_option('mb_slider_prevnext') == "yes") {?>
	<script type="text/javascript">
		MB.Slider.initPrevNext();
	</script>
	<?php }?>
	
	<?php if (get_option('mb_slider_dots') == "yes") {?>
	<script type="text/javascript">
		MB.Slider.buildIndexDots();
		MB.Slider.initIndexControls();
	</script>
	<?php }?>
<?php }?>

<?php 
	if (get_option('mb_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('mb_analytics'))); 
	}
?>
</body>
</html>