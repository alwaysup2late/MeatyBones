<!DOCTYPE html>
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="keywords" content="<?php echo get_option('mb_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('mb_description'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/html5shiv.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/respond.js"></script>
<![endif]-->
<!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
</head>
<body <?php
	if (is_front_page()) {
		echo 'class="home"';
	} else if (is_page()) {
		$page_slug = ''.$post->post_name;
		echo 'class="'.$page_slug.' innerPage"';
	}
?>>
	<header>
		<?php if (get_option('mb_base_width_setting') == 'large') {?>
			<section class="onepcssgrid-1200">
		<?php } else {?>
			<section class="onepcssgrid-1000">
		<?php }?>
			<a href="<?php bloginfo('url'); ?>/" class="logo col6">
				<img src="<?php echo get_option('mb_logo_img'); ?>" alt="<?php echo get_option('mb_logo_alt'); ?>" />
			</a>
			<aside class="col5 last">
				<?php dynamic_sidebar('top_widget'); ?>
			</aside>
			
			<?php 
				if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'container' => 'nav',
						'container_class' => 'col12',
						'items_wrap' => '<ul id="mainNav" class="desktop">%3$s</ul>'
					)); 
				}
			?>
			<div class="clearfix"></div>
		</section>
		<div class="clearfix"></div>
	</header>
	<?php if (get_option('mb_base_width_setting') == 'large') {?>
		<section class="onepcssgrid-1200">
	<?php } else {?>
		<section class="onepcssgrid-1000">
	<?php }?>