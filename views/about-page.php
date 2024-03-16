<?php /* Template name: About Page */
get_header();
$about_template = get_field('about_template');

if ($about_template) {
	$hero_group = $about_template['hero_group'];
	$about_me_group = $about_template['about_me_group'];
	$history_group = $about_template['history_group'];
	$mission_group = $about_template['mission_group'];
	$benefits_group = $about_template['benefits_group'];
	$team_group = $about_template['team_group'];
	$partners_group = $about_template['partners_group'];
	$investments_block = $about_template['investments_block'];
	$news_group = $about_template['news_group'];
};
?>
<main>
	<?php if ($hero_group) :
		$overlay = $hero_group['overlay'];
		$title = $hero_group['title'];
		$button = $hero_group['button'];
	?>
		<section class="hero-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<div class="hero-block__box">
					<?php if ($title) : ?>
						<h1 data-aos="fade-up">
							<?php echo $title ?> </h1>
					<?php endif; ?>
					<?php if ($button) : ?>
						<div class="hero-block__btn" data-aos="fade-up" data-aos-delay="400">
							<?php echo initLinkHref($button, 'btn-border', true) ?>
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
						<h2 class="about-block__title-mob" data-aos="fade-left"><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($image) : ?>
						<div class="about-block__img">
							<?php echo wp_get_attachment_image($image, 'full'); ?>
						</div>
					<?php endif; ?>
					<?php if ($button) : ?>
						<div class="about-block__btn">
							<?php echo initLinkHref($button, 'btn') ?>
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
						<div class="about-block__desc desc">
							<?php echo $description ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($history_group) :
		$title = $history_group['title'];
		$list = $history_group['list_first'];
	?>
		<section class="history-block">
			<div class="container">
				<?php if ($title) : ?>
					<h2>
						<?php echo $title ?>
					</h2>
				<?php endif; ?>
				<div class="history-block__box">
					<div class="history-block__box-left">
						<div class="swiper  history-block__swiper ">
							<div class="swiper-wrapper">
								<?php if (is_array($list)) : ?>
									<?php foreach ($list as $item) {
										$image = $item['image'];
									?>
										<div class="swiper-slide history-block__slide">
											<div class="history-block__img">
												<?php echo wp_get_attachment_image($image, 'full'); ?>
											</div>
										</div>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="history-block__box-right">
						<div class="swiper  history-block__swiper ">
							<div class="swiper-wrapper">
								<?php if (is_array($list)) : ?>
									<?php foreach ($list as $item) {
										$image = $item['image'];
										$year = $item['year'];
										$caption = $item['caption'];
										$description = $item['description'];
		$current_lang = pll_current_language();
$next="";
$prew="";
								switch ($current_lang) {
									case 'en':
									$next="next";
                                    $prew="prew";
			
										break;
									case 'uk':
										$next="вперед";
                                    $prew="назад";
										break;
								}
									?>
										<div class="swiper-slide history-block__slide">
											<div class="history-block__right">
												<div class="history-block__right-top">
													<div class="year">
														<?php echo $year ?>
													</div>
													<div class="caption">
														<?php echo $caption ?>
													</div>
												</div>
												<div class="history-block__right-desc desc"> <?php echo $description ?></div>
											</div>
										</div>
									<?php } ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="swiper-nav">
							<button type="button" class="history-swiper-prev button-box">
								<div class="btn-arrow left"> </div>
								<span class="dtn-text"><?php echo $prew ?></span>
							</button>
							<button type="button" class="history-swiper-next button-box">
								<span class="dtn-text"><?php echo $next ?></span>
								<div class="btn-arrow"> </div>
							</button>
						</div>
					</div>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php if ($mission_group) :
		$list = $mission_group['list'];
	?>
		<section class="mission-block">
			<div class="container">
				<?php if (is_array($list)) : ?>
					<div class="mission-block__list">
						<?php foreach ($list as $item) {
							$position_block = $item['position_block'];
							$image = $item['image'];
							$image_second = $item['image_second'];
							$title = $item['title'];
							$description = $item['description'];
							$button = $item['button'];
							$button_for_popup = $item['button_for_popup'];
						?>
							<div class="mission-block__item <?php echo $position_block ? "position" : "" ?>">
								<div class="mission-block__img">
									<div class="mission-block__img-first" data-aos="fade-right" data-aos-delay="600"> <?php echo wp_get_attachment_image($image, 'full'); ?></div>
									<div class="mission-block__img-second" data-aos="fade-right" data-aos-delay="400"> <?php echo wp_get_attachment_image($image_second, 'full'); ?></div>
								</div>
								<div class="mission-block__inf">
									<h2><?php echo $title ?></h2>
									<div class="mission-block__inf-desc desc"><?php echo $description ?></div>
									<?php if ($button_for_popup) { ?>
										<div class="mission-block__inf-btn"><?php echo initLinkHref($button, 'btn', true) ?></div>
									<?php } else { ?>
										<div class="mission-block__inf-btn"><?php echo initLinkHref($button, 'btn') ?></div>
									<?php } ?>
								</div>
							</div>
						<?php
						} ?>
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

	<?php if ($team_group) :
		$title = $team_group['title'];
		$list_first = $team_group['list_first'];
	?>
		<section class="team-block">
			<div class="container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
			</div>
			<div class="team-block__box">
				<?php if (is_array($list_first)) : ?>
					<?php foreach ($list_first as $item) {
						$image = $item['image'];
						$name = $item['name'];
						$caption = $item['caption'];
					?>
						<div class="team-block__item">
							<?php if ($image) { ?>
								<div class="team-block__item-img">
									<?php echo wp_get_attachment_image($image, 'full'); ?>
								</div>
							<?php } ?>
							<div class="team-block__item-bottom">
								<h3><?php echo $name ?></h3>
								<div class="team-block__item-caption">
									<?php echo $caption ?>
								</div>
							</div>
						</div>
					<?php } ?>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($partners_group) :
		$overlay = $partners_group['overlay'];
		$list_first = $partners_group['list_first'];
		$title = $partners_group['title'];
	?>
		<section class="partners-block" style="background-image: url(<?php echo $overlay['url'] ?>);">
			<div class="container">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
				<?php if (is_array($list_first)) : ?>
					<div class="partners-block__list ">
						<?php foreach ($list_first as $item) {
							$caption = $item['caption'];
							$link = $item['link'];
						?>
							<a href="<?php echo $link ?>" class="partners-block__item">
								<h3><?php echo $caption ?></h3>
							</a>
						<?php
						} ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($investments_block) :
		$title = $investments_block['title'];
		$description = $investments_block['description'];
		$image = $investments_block['image'];
	?>
		<section class="investments-block">
			<div class="container">

				<div class="investments-block__inf">
					<?php if ($title) : ?>
						<h2><?php echo $title ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="investments-block__desc desc"><?php echo $description ?></div>
					<?php endif; ?>
				</div>
				<?php if ($image) : ?>

					<div class="investments-block__img">
						<?php echo wp_get_attachment_image($image, 'full'); ?>
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
		$block_id = $news_group['block_id'];

	?>
		<section class="archive-blog" id="<?php echo $block_id ?>">
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
							<?php echo initLinkHref($button, 'btn', true) ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="archive-blog__wrapper">
					<?php if ($list) : ?>
						<?php foreach ($list as $item) {
							$image = $item['image'];
							$data = $item['data'];
							$title = $item['title'];
						?>
							<div class="archive-blog__item">
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
						<?php } ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>