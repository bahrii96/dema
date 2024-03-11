<!DOCTYPE html>
<html lang="en-US">

<head>
	<?php
	get_template_part('structure/meta');
	wp_head();
	?>
</head>
<?php
$link = get_field('link', 'options');
?>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
			<a href="<?php echo home_url('/'); ?>" class="logo" aria-label="Site Logo">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo_site');
				if ($custom_logo_id) :
					echo wp_get_attachment_image($custom_logo_id, 'full', false, [
						'loading' => 'eager'
					]);
				endif;
				?>
			</a>
			<span class="menu-toggle">
				<small></small>
			</span>
			<nav>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary_left',
					'menu_class' => 'main-nav',
					'walker' => new Custom_Walker_Nav_Menu
				));
				?>
				<div class="languages-menu">
					<?php
					$languages = pll_the_languages(array('raw' => 1));

					foreach ($languages as $language) {
						$class = ($language['current_lang']) ? 'active' : '';
						echo '<a href="' . $language['url'] . '" class="' . $class . '">' . strtoupper($language['slug']) . '</a>';
					}
					?>
				</div>
				<div class="menu-btn menu-btn-mob">
					<?php
					if ($link) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="btn-border" data-fancybox href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"> <span></span><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</nav>
			<div class="menu-btn menu-btn-desc">
				<?php
				if ($link) :
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<a class="btn-border" data-fancybox href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"> <span></span><?php echo esc_html($link_title); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</header>