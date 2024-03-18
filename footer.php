<?php // Theme footer 
?>

<?php
$footer_settings = get_field('footer_settings', 'options');
if ($footer_settings) {
	$popup_form_id = isset($footer_settings['popup_form_id']) ? $footer_settings['popup_form_id'] : null;
	$popup_name = isset($footer_settings['popup_name']) ? $footer_settings['popup_name'] : null;
	$popup_title = isset($footer_settings['popup_title']) ? $footer_settings['popup_title'] : null;

	$popup_title_answer = isset($footer_settings['popup_title_answer']) ? $footer_settings['popup_title_answer'] : null;
	$popup_image_answer = isset($footer_settings['popup_image_answer']) ? $footer_settings['popup_image_answer'] : null;
	$popup_button_answer = isset($footer_settings['popup_button_answer']) ? $footer_settings['popup_button_answer'] : null;

	$copyright = isset($footer_settings['copyright']) ? $footer_settings['copyright'] : null;
	$title_first = isset($footer_settings['title_first']) ? $footer_settings['title_first'] : null;
	$title_second = isset($footer_settings['title_second']) ? $footer_settings['title_second'] : null;
	$title_third = isset($footer_settings['title_third']) ? $footer_settings['title_third'] : null;
	$widget_third_links
		= isset($footer_settings['widget_third_links']) ? $footer_settings['widget_third_links'] : null;
	$description_company = isset($footer_settings['description_company']) ? $footer_settings['description_company'] : null;
	$fourth_caption = isset($footer_settings['fourth_caption']) ? $footer_settings['fourth_caption'] : null;
	$socials = isset($footer_settings['socials']) ? $footer_settings['socials'] : null;
?>
	<div class="hidden popup-box" id="<?php echo $popup_name; ?>">
		<h2>
			<?php echo $popup_title ?>
		</h2>
		<?php if ($popup_form_id) : ?>
			<div class="popup-box__form">
				<?php echo do_shortcode($popup_form_id); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="hidden popup-box" id="popup-answer">
		<div class="popup-answer__box">
			<?php if ($popup_title_answer) : ?>
				<h2>
					<?php echo $popup_title_answer ?>
				</h2>
			<?php endif; ?>
			<?php if ($popup_image_answer) : ?>
				<div class=" contact-block__img">
					<?php echo wp_get_attachment_image($popup_image_answer, 'full'); ?>
				</div>
			<?php endif; ?>

			<?php if ($popup_button_answer) : ?>
				<div class="popup-answer__box-btn">
					<?php echo initLinkHref($popup_button_answer, 'btn-border') ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<div class="footer__top">
				<div class="footer__menu-first">
					<?php if ($title_first) : ?>
						<h3><?php echo $title_first ?></h3>
					<?php endif; ?>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary_footer',
						'menu_class' => 'main-nav-footer',
						'walker' => new Custom_Walker_Nav_Menu
					));
					?>
				</div>
				<div class="footer__menu-box">
					<div class="footer__menu-second">
						<?php if ($title_second) : ?>
							<h3><?php echo $title_second ?></h3>
						<?php endif; ?>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary_footer_second',
							'menu_class' => 'main-nav-footer',
							'walker' => new Custom_Walker_Nav_Menu
						));
						?>
					</div>
					<div class="footer__contact">
						<?php if ($title_third) : ?>
							<h3><?php echo $title_third ?></h3>
						<?php endif; ?>
						<?php if (is_array($widget_third_links)) : ?>
							<?php foreach ($widget_third_links as $item) {
								$icon = $item['icon'];
								$link = $item['link'];
							?>
								<div class="footer__contact-item">
									<?php echo wp_get_attachment_image($icon, 'full'); ?>
									<?php echo initLinkHref($link) ?>
								</div> <?php } ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="footer__social">
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
					<?php if ($description_company) : ?>
						<div class="footer__desc desc">
							<?php echo $description_company ?>
						</div>
					<?php endif; ?>
					<div class="footer__social-box">
						<?php if (is_array($socials)) : ?>
							<?php if ($socials) : ?>
								<?php foreach ($socials as $item) {
									$icon = $item['icon'];
									$icon_hover = $item['icon_hover'];
									$link = $item['link'];
								?>
									<a href="<?php echo $link ?>">
										<div class="footer__social-def"><?php echo wp_get_attachment_image($icon, 'full'); ?></div>
										<div class="footer__social-hov"> <?php echo wp_get_attachment_image($icon_hover, 'full'); ?></div>
									</a>
								<?php } ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<?php if ($fourth_caption) : ?>
						<div class="footer__caption">
							<?php echo $fourth_caption ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php if ($copyright) : ?>
			<div class="copyright">
				<div class="container"><?php echo $copyright ?></div>
			</div>
		<?php endif; ?>
	</footer>
	<?php
	wp_footer();
	?>
	</body>

	</html>
<?php
}
?>