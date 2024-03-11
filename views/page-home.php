<?php /* Template name: Home Page */
get_header();
$main_template = get_field('main_template');

if ($main_template) {
	$hero_group = $main_template['hero_group'];
	$about_me_group = $main_template['about_me_group'];
	$our_works_group = $main_template['our_works_group'];
	$benefits_group = $main_template['benefits_group'];
	$news_group = $main_template['news_group'];
	$contact_group = $main_template['contact_group'];
};
?>
<main class="home-page">
	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$image = $hero_group['image'];
		$second_image = $hero_group['second_image'];
		$button = $hero_group['button'];
	?>
		<section class="hero-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<div class="hero-block__box">
					<?php if ($title) : ?>
						<h1 data-aos="fade-right">
							<?php echo $title ?> </h1>
					<?php endif; ?>
					<div class=" hero-block__img">
						<?php if ($image) : ?>
							<div class="hero-block__img-first" data-aos="fade-right" data-aos-delay="500">
								<?php echo wp_get_attachment_image($image, 'full'); ?>
							</div>
						<?php endif; ?>
						<?php if ($second_image) : ?>
							<div class="hero-block__img-second" data-aos="fade-right" data-aos-delay="400">
								<?php echo wp_get_attachment_image($second_image, 'full'); ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if ($button) : ?>
						<div class="hero-block__btn">
							<?php echo initLinkHref($button, 'btn-border') ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($about_me_group) :
		$overlay = $about_me_group['overlay'];
		$image = $about_me_group['image'];
		$title = $about_me_group['title'];
		$description = $about_me_group['description'];
		$button = $about_me_group['button'];
	?>
		<section class="about-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<div class="about-block__left">
					<?php if ($title) : ?>
						<h2 class="about-block__title-mob"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($image) : ?>
						<div class="about-block__img">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php endif; ?>
					<?php if ($button) : ?>
						<div class="about-block__btn">
							<?php echo initLinkHref($button, 'btn', true) ?>
						</div>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="about-block__desc-mob desc">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="about-block__right">
					<?php if ($title) : ?>
						<h2 data-aos="fade-left"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="about-block__desc desc" data-aos="fade-left">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($our_works_group) :
		$title = $our_works_group['title'];
		$list = $our_works_group['list'];
		$button = $hero_group['button'];
	?>
		<section class="works-block">
			<div class="container">
				<div class="works-block__top">
					<?php if ($title) : ?>
						<h2>
							<?php echo $title ?>
						</h2>
					<?php endif; ?>
					<div class="swiper-nav">
						<button type="button" class="swiper-prev">
							<div class="btn-arrow"></div>
						</button>
						<button type="button" class="swiper-next">
							<div class="btn-arrow"></div>
						</button>
					</div>
				</div>
			</div>
			<div class="swiper  works-block__swiper mySwiper">
				<div class="swiper-wrapper">
					<?php foreach ($list as $item) {
						$image = $item['image'];
						$title = $item['title'];
						$link = $item['link'];
					?>
						<div class="swiper-slide">
							<a href="<?php echo $link ?>" class="slide-link">
								<div class="grid-slide-image">
									<?php echo wp_get_attachment_image($image, 'full'); ?>
								</div>
								<h3><?php echo $title ?></h3>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="container">
				<?php if ($button) : ?>
					<div class="works-block__btn">
						<?php echo initLinkHref($button, 'btn') ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($benefits_group) :
		$overlay = $benefits_group['overlay'];
		$list_first = $benefits_group['list_first'];
	?>
		<section class="benefits-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<?php if (is_array($list_first)) : ?>
					<div class="benefits-block__list counter" id="counter">
						<?php foreach ($list_first as $item) {
							$number = $item['number'];
							$span = $item['span'];
							$caption = $item['caption'];
						?>
							<div class="benefits-block__item">
								<div class="benefits-block__item-box">
									<?php if ($number) : ?>
										<div class="benefits-block__number-box">
											<div class="benefits-block__number counter-value" data-count="<?php echo $number ?>">
												0
											</div>
											<?php if ($span) : ?>
												<span class="benefits-block__number"><?php echo $span ?></span>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<h3><?php echo $caption ?></h3>
								</div>
							</div>
						<?php
						} ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>


	<?php if ($news_group) :
		$title = $news_group['title'];
		$description = $news_group['description'];
		$button = $news_group['button'];
		$list = $news_group['list'];

	?>
		<section class="archive-blog">
			<div class="container">
				<div class="archive-blog__top">
					<?php if ($title) : ?>
						<h2>
							<?php echo $title ?>
						</h2>
					<?php endif; ?>
					<div class="archive-blog__inf">
						<?php if ($description) : ?>
							<div class="archive-blog__desc desc">
								<?php echo $description ?>
							</div>
						<?php endif; ?>
						<?php if ($button) : ?>
							<?php echo initLinkHref($button, 'btn') ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="archive-blog__wrapper">
					<?php if ($list) :
						$delay = 400; ?>
						<?php foreach ($list as $item) {
							$image = $item['image'];
							$data = $item['data'];
							$title = $item['title'];
						?>
							<div class="archive-blog__item" data-aos="fade-left" data-aos-delay="<?php echo $delay; ?>">
								<div class="archive-blog__item-top">
									<?php echo wp_get_attachment_image($image, 'full'); ?>
								</div>
								<div class="archive-blog__item-info">
									<div class="archive-blog__item-meta">
										<div class="date"><?php echo $data; ?></div>
									</div>
									<h3>
										<?php echo $title ?>
									</h3>
								</div>
							</div>
						<?php
							$delay += 100;
						} ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($contact_group) :
		$form_title = $contact_group['form_title'];
		$form_id = $contact_group['form_id'];
		$overlay = $contact_group['overlay'];
		$list_office = $contact_group['list_office'];
	?>
		<section class="contact-block">
			<div class="container">
				<div class="contact-block__left">

					<?php if ($form_id) : ?>
						<div class="contact-block__form">
							<?php if ($form_title) : ?>
								<h2>
									<?php echo $form_title ?>
								</h2>
							<?php endif; ?>
							<div class="form-box">
								<?php echo do_shortcode($form_id); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="contact-block__right" style="background-image: url(<?php echo $overlay['url'] ?>);">
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
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>