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
					<aside class="col12">
				<?php } elseif (is_sidebar_active('footer_left') && is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) {?>
					<aside class="col6">
				<?php } else {?>
					<aside class="col4">
				<?php }?>
					<?php dynamic_sidebar('footer_left'); ?>
				</aside>
				<?php if (is_sidebar_active('footer_center')) { ?>
					<?php if (is_sidebar_active('footer_left') && is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) {?>
					     <aside class="col6 last">
					<?php } else {?>
					     <aside class="col4">
					<?php }?>
						<?php dynamic_sidebar('footer_center'); ?>
					</aside>
				<?php } ?>
				<?php if (is_sidebar_active('footer_right')) { ?>
					<?php if (is_sidebar_active('footer_left') && is_sidebar_active('footer_center') && !is_sidebar_active('footer_right')) {?>
					     <aside class="col6">
					<?php } else {?>
					     <aside class="col4 last">
					<?php }?>
						<?php dynamic_sidebar('footer_right'); ?>
					</aside>
				<?php } ?>
			<?php } ?>
			<section class="copyright col12">
				<?php 
					if (get_option('mb_copyright') <> "") {
						echo stripslashes(get_option('mb_copyright'));
					}
				?>
			</section>

			<div class="clearfix"></div>
		</section>
	</footer>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/vendor/selectnav.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
<?php if (get_option('mb_slider_enable') == 'yes' && is_front_page()) {?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/vendor/swipe.js"></script>
<script type="text/javascript">
	setTimeout(function () {
		window.mySwipe = new Swipe(document.getElementById("slider"), {
			startSlide: 0,
			speed: 400,
			auto: 3000,
			continuous: true,
			disableScroll: false,
			stopPropagation: false,
			callback: function(index, elem) {
				updateActiveDot();
			},
			transitionEnd: function(index, elem) {}
		});
	}, 100);

	<?php if (get_option('mb_slider_prevnext') == "yes") {?>
		var prevbutton = document.getElementById('prev'),
			nextbutton = document.getElementById('next');

		prevbutton.onclick = function(event) {
			event.preventDefault();
			mySwipe.prev();
		}

		nextbutton.onclick = function(event) {
			event.preventDefault();
			mySwipe.next();
		}
	<?php }?>

	<?php if (get_option('mb_slider_dots') == "yes") {?>
		setTimeout(function() {
			var slideControls = document.getElementById('slideControls'),
				numberSlides = mySwipe.getNumSlides();

			for (var i=0; i < numberSlides; i++) {
				var item = document.createElement("li");
				
				item.innerHTML = '<a href="#">'+ [i] + '</a>';

				slideControls.appendChild(item);

				var firstLi = slideControls.childNodes[0];
				firstLi.classList.add("active")
			}

			getEventTarget = function(event) {
				event = event || window.event;
				return event.target || event.srcElement; 
			}

			slideControls.onclick = function(event) {
				var target = getEventTarget(event);

				event.preventDefault();
				mySwipe.slide(target.innerHTML, 400);
			};

			updateActiveDot = function() {
				var dots = document.getElementById('slideControls').getElementsByTagName('li'),
					position = mySwipe.getPos();

				var i = dots.length;
				while (i--) {
					dots[i].className = '';
				}

				dots[position].className = 'active';
			}
		}, 100);
	<?php }?>
</script>
<?php }?>
<?php 
	if (get_option('mb_analytics') <> "") { 
		echo stripslashes(stripslashes(get_option('mb_analytics'))); 
	}
?>
</body>
</html>