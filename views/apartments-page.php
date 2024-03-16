<?php /* Template name: Apartments Archive */
get_header();
$apartment_archive_template = get_field('apartment_archive_template');
?>
<main>
	<?php
	$projects = $apartment_archive_template['projects'];
	$apartment = new WP_Query(array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'post__in' => $projects,
		'orderby' => 'post__in',
	));
	?>
	<section class="services-block">
		<div class="container">
			<?php if ($title) : ?>
				<h1><?php echo $title ?></h1>
			<?php endif; ?>
			<div class="services-block__box">
				<?php
				if ($apartment->have_posts()) {
					while ($apartment->have_posts()) : $apartment->the_post();
						$post_id = $post->ID;
						$post_thumbnail_id = get_post_thumbnail_id();
						$thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						$apartment_template = get_field('apartment_template', $post->ID);
						$number_of_people = $apartment_template['number_of_people'];
						$short_description = $apartment_template['short_description'];
				?>
						<?php echo $disable ? '<div class="services-block__item">' : '<a href="' . get_the_permalink() . '" class="services-block__item">'; ?>

						<a href="<?php echo get_the_permalink() ?>" class="services-block__item">
							<?php if ($thumbnail_url) : ?>
								<div class="services-block__item-img">
									<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo get_the_title($post_id); ?>">
									<div class="services-block__item-img-status <?php echo $status_class ?>">
										<div class="status">
											<?php echo $status_name ?>
										</div>
									</div>
								</div>
							<?php else : ?>
								<div class="services-block__item-img">
									<img src="/wp-content/uploads/2024/03/woocommerce-placeholder.png" alt="Placeholder Image">
									<div class="services-block__item-status <?php echo $status_class ?>">
										<div class="status">
											<?php echo $status_name ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<div class="services-block__item-bottom">
								<h3><?php echo get_the_title($post_id); ?></h3>
								<div class="services-block__item-caption">
									<?php echo $caption ?>
								</div>
							</div>
							<?php
							echo $disable ? '</div >' : '	</a>';
							?>
						</a>
				<?php
					endwhile;
					wp_reset_query();
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	</section>

</main>
<?php get_footer(); ?>