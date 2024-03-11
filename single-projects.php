<?php
get_header();
$project_template = get_field('project_template');

if (
	$project_template
) {
	$status = $project_template['status'];
	$hero_group = $project_template['hero_group'];
	$about_group = $project_template['about_group'];
	$portfolio_group = $project_template['portfolio_group'];
};
?>
<main class="our-works">

	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$caption = $hero_group['caption'];
	?>
		<section class="hero-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<?php if ($title) : ?>
					<h1 data-aos="fade-up">
						<?php echo $title ?> </h1>
				<?php endif; ?>

				<?php if ($caption) : ?>
					<div class="hero-block__caption desc" data-aos="fade-up" data-aos-delay="350">
						<?php echo $caption ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($about_group) :
		$title = $about_group['title'];
		$description = $about_group['description'];
		$gallery_top = $about_group['gallery_top'];
		$list = $about_group['list'];
		$image_first = $about_group['image_first'];
		$image_second = $about_group['image_second'];
		$image_full = $about_group['image_full'];
	?>
		<section class="about-block">
			<div class="container">
				<?php if ($title) : ?>
					<h2>
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<?php if ($description) : ?>
					<div class="about-block__desc description">
						<?php echo $description ?>
					</div>
				<?php endif; ?>
				<div class="about-block__top-img">
					<?php if (is_array($gallery_top)) :
						$delay = 400; ?>
						<?php foreach ($gallery_top as $item) { ?>
							<div class="about-block__top-img-img" data-aos="fade-right" data-aos-delay="<?php echo $delay; ?>">
								<?php echo wp_get_attachment_image($item, 'full'); ?>
							</div>
						<?php
							$delay += 50;
						} ?>
					<?php endif; ?>
				</div>

				<div class="about-block__box">
					<?php if (is_array($list)) : ?>
						<div class="about-block__left">
							<?php foreach ($list as $item) {
								$title = $item['title'];
								$description = $item['description'];
							?>
								<div class="about-block__left-item">
									<?php if ($title) : ?>
										<h3><?php echo $title ?></h3>
									<?php endif; ?>
									<?php if ($description) : ?>
										<div class="desc"><?php echo $description ?></div>
									<?php endif; ?>
								</div>
							<?php } ?>
						</div>
					<?php endif; ?>

					<div class="about-block__right">
						<?php if ($image_first) : ?>
							<div class="about-block__right-img" data-aos="fade-left" data-aos-delay="400">
								<?php echo wp_get_attachment_image($image_first, 'full'); ?>
							</div>
						<?php endif; ?>
						<?php if ($image_second) : ?>
							<div class="about-block__right-img-second" data-aos="fade-left" data-aos-delay="450">
								<?php echo wp_get_attachment_image($image_second, 'full'); ?>
							</div>
						<?php endif; ?>

					</div>
				</div>
				<?php if ($image_full) : ?>
					<div class="about-block__right-img-full" data-aos="fade-up">
						<?php echo wp_get_attachment_image($image_full, 'full'); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($portfolio_group) :
		$title = $portfolio_group['title'];
		$list = $portfolio_group['list'];
	?>
		<section class="portfolio-block">
			<div class="container">
				<div class="portfolio-block__top">
					<?php if ($title) : ?>
						<h2>
							<?php echo $title ?>
						</h2>
					<?php endif; ?>
					<div class="swiper-nav">
						<button type="button" class="portfolio-swiper-prev">
							<div class="btn-arrow"></div>
						</button>
						<button type="button" class="portfolio-swiper-next">
							<div class="btn-arrow"></div>
						</button>
					</div>
				</div>
			</div>
			<div class="swiper  portfolio-block__swiper portfolio-swiper">
				<div class="swiper-wrapper">
					<?php if (is_array($list)) : ?>
						<?php foreach ($list as $item) {
							$image = $item['image'];
						?>
							<div class="swiper-slide">
								<div class="grid-image" data-fancybox="gallery" data-src="<?php echo wp_get_attachment_image_src($image, 'full')[0]; ?>">
									<?php echo wp_get_attachment_image($image, 'full'); ?>
								</div>
							</div>
						<?php } ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

</main>
<?php get_footer(); ?>