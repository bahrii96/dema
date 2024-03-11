<?php /* Template name: Page Contact */
get_header();
$page_contact = get_field('page_contact');

if ($page_contact) {
	$contact_group = $page_contact['contact_group'];
};
?>
<main>
	<?php if ($contact_group) :
		$map_iframe = $contact_group['map_iframe'];
		$overlay = $contact_group['overlay'];
		$list_office = $contact_group['list_office'];
	?>
		<section class="contact-block">
			<div class="container">
				<div class="contact-block__left" style="background-image: url(<?php echo $overlay['url'] ?>);">
					<?php if (is_array($list_office)) : ?>
						<div class="contact-block__list">
							<?php foreach ($list_office as $item) {
								$title = $item['title'];
								$list_contact = $item['list_contact'];
							?>
								<div class="contact-block__item">
									<h3><?php echo $title ?></h3>
									<?php if (is_array($list_contact)) : ?>
										<div class="contact-block__office">
											<?php foreach ($list_contact as $item) {
												$icon = $item['icon'];
												$link = $item['link'];
											?>
												<div class="contact-block__office-item">
													<?php echo wp_get_attachment_image($icon, 'full'); ?>
													<?php echo initLinkHref($link,) ?>
												</div>
											<?php } ?>
										</div>
									<?php endif; ?>
								</div>
							<?php } ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="contact-block__right">
					<?php if ($map_iframe) : ?>
						<?php echo $map_iframe ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>