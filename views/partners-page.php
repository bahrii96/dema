<?php /* Template name: Partners Page */
get_header();
$partners_template = get_field('partners_template');

if ($partners_template) {

	$hero_group = $partners_template['hero_group'];
	$about_group = $partners_template['about_group'];
	$banner_group = $partners_template['banner_group'];
};
?>
<main class="our-works">

	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
	?>
		<section class="hero-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<?php if ($title) : ?>
					<h1 data-aos="fade-up">
						<?php echo $title ?> </h1>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>



	<?php if ($about_group) :
		$first_button = $about_group['first_button'];
		$first_list = $about_group['first_list'];
		$second_button = $about_group['second_button'];
		$second_list = $about_group['second_list'];
	?>
		<section class="partner-block">
			<div class="container">
				<div id="tabs">
					<ul class="partner-block__tabs">
						<li><a href="#tabs-1"><?php echo $first_button ?></a></li>
						<li><a href="#tabs-2"><?php echo $second_button ?></a></li>
					</ul>
					<div class="partner-block__list" id="tabs-1">
						<?php if (is_array($first_list)) : ?>
							<?php foreach ($first_list as $item) {
								$title = $item['title'];
								$description = $item['description'];
								$image = $item['image'];
							?>
								<div class="partner-block__group">
									<div class="partner-block__left">
										<?php if ($title) : ?>
											<h2><?php echo $title ?></h2>
										<?php endif; ?>
										<?php if ($description) : ?>
											<div class="partner-block__desc desc"> <?php echo $description ?></div>
										<?php endif; ?>
									</div>
									<div class="partner-block__img">
										<?php echo wp_get_attachment_image($image, 'full'); ?>
									</div>
								</div>
							<?php } ?>
						<?php endif; ?>
					</div>
					<div class="partner-block__list" id="tabs-2">
						<?php if (is_array($second_list)) : ?>
							<?php foreach ($second_list as $item) {
								$title = $item['title'];
								$description = $item['description'];
								$image = $item['image'];
							?>
								<div class="partner-block__group">
									<div class="partner-block__left">
										<?php if ($title) : ?>
											<h2><?php echo $title ?></h2>
										<?php endif; ?>
										<?php if ($description) : ?>
											<div class="partner-block__desc desc"> <?php echo $description ?></div>
										<?php endif; ?>
									</div>
									<div class="partner-block__img">
										<?php echo wp_get_attachment_image($image, 'full'); ?>
									</div>
								</div>
							<?php } ?>
						<?php endif; ?>
					</div>
				</div>


			</div>
		</section>
	<?php endif; ?>

	<?php if ($banner_group) :
		$overlay = $banner_group['overlay'];
		$title = $banner_group['title'];
		$button = $banner_group['button'];
		$image = $banner_group['image'];

	?>
		<section class="banner-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="banner-block__box">
				<div class="banner-block__left">
					<?php if ($title) : ?>
						<h2 data-aos="fade-up"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($button) : ?>
						<div class="banner-block__box-link" data-aos="fade-up" data-aos-delay="350">
							<?php echo initLinkHref($button, 'btn-border', true) ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($image) : ?>
					<div class="banner-block__img" style="background-image: url(<?php echo $image['url'] ?>);">
					</div>
				<?php endif; ?>

			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>