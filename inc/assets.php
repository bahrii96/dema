<?php

function detect_assets()
{

	wp_deregister_script('jquery');

	if (!is_admin()) {

		/* Connect styles for Any Templates If needed */

		if (is_page_template('views/page-home.php')) {
			wp_enqueue_style('page-home', get_stylesheet_directory_uri()
				. '/assets/css/pages/page-home.css', array(), null);
		}
		if (is_page_template('views/about-page.php')) {
			wp_enqueue_style('page-about', get_stylesheet_directory_uri()
				. '/assets/css/pages/about-page.css', array(), null);
		}
		if (is_page_template('views/partners-page.php')) {
			wp_enqueue_style('partners', get_stylesheet_directory_uri()
				. '/assets/css/pages/partners-page.css', array(), null);
		}
		if (is_page_template('views/projects.php')) {
			wp_enqueue_style('projects', get_stylesheet_directory_uri()
				. '/assets/css/pages/projects.css', array(), null);
		}
		if (is_page_template('views/contact-page.php')) {
			wp_enqueue_style('contact-page', get_stylesheet_directory_uri()
				. '/assets/css/pages/contact-page.css', array(), null);
		}
		if (is_page_template('views/success.php')) {
			wp_enqueue_style('success', get_stylesheet_directory_uri()
				. '/assets/css/pages/success.css', array(), null);
		}

		if (is_singular('projects')) {
			wp_enqueue_style('service-style', get_stylesheet_directory_uri()
				. '/assets/css/pages/single-projects.css', array(), null);
		}

		if ('post' == get_post_type()) {
			wp_enqueue_style('category-blog', get_stylesheet_directory_uri() . '/assets/css/pages/category-blog.css', array(), '1.0');
			wp_enqueue_style('blog-single-styles', get_stylesheet_directory_uri() . '/assets/css/pages/blog.css', array(), '1.0');
		}
		/* Connect main style */

		wp_enqueue_style('main-styles', get_stylesheet_directory_uri()
			. '/assets/css/main.css', array(), null);

		/*--------------------------------------------------
		-------------- Connect styles for Blog Archive and Single blog Post ----------- 
		---------------------------------------------------*/


		// Other Styles Scripts

		wp_enqueue_script('jquery', get_stylesheet_directory_uri()
			. '/assets/libs/jquery/jquery.min.js', '', '', true);

		wp_enqueue_script('main-scripts', get_stylesheet_directory_uri()
			. '/assets/js/main.js', '', '', true);

		wp_enqueue_style('aos-styles', get_stylesheet_directory_uri() . '/assets/libs/aos/aos.css', array(), '1.0');

		wp_enqueue_script('aos-scripts', get_stylesheet_directory_uri() . '/assets/libs/aos/aos.js', array('jquery'), '1.0', true);

		wp_add_inline_script('aos-scripts', '
		AOS.init({
		    once: true, 
		    duration: 1000 
		});');

		wp_register_style('swiper', get_stylesheet_directory_uri()
			. '/assets/libs/swiper/swiper-bundle.min.css', array(), false);
		wp_enqueue_style('swiper');
		wp_register_script('swiper', get_stylesheet_directory_uri()
			. '/assets/libs/swiper/swiper-bundle.min.js', 'jquery', '', false);
		wp_enqueue_script('swiper');

		wp_register_script(
			'fancybox',
			get_stylesheet_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js',
			['jquery'],
			'',
			true
		);
		wp_enqueue_script('fancybox');

		wp_register_style(
			'fancybox',
			get_stylesheet_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css',
			[],
			false
		);
		wp_enqueue_style('fancybox');

		wp_enqueue_script('jquery-ui-scripts', get_stylesheet_directory_uri() . '/assets/libs/jquery-ui/jquery-ui.min.js', array('jquery'), '1.0', true);
	}
}
add_action('wp_enqueue_scripts', 'detect_assets');
