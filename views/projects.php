<?php /* Template name: Projects */
get_header();
$project_archive_template = get_field('project_archive_template');
?>
<main>
	<?php
	$title = $project_archive_template['title'];
	$projects = $project_archive_template['projects'];
	$testimonials = new WP_Query(array(
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
				if ($testimonials->have_posts()) {
					while ($testimonials->have_posts()) : $testimonials->the_post();
						$post_id = $post->ID;
						$post_thumbnail_id = get_post_thumbnail_id();
						$thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						$project_template = get_field('project_template', $post->ID);
						$status = $project_template['status'];
						$caption = $project_template['caption'];
						$disable = $project_template['disable'];
						$status_class = '';
						$status_name = '';
						switch ($status) {
							case 'progress':
								$status_class = 'progress';
								$status_name = 'in progress';
								break;
							case 'completed':
								$status_class = 'completed';
								$status_name = 'completed';
								break;
							case 'coming':
								$status_class = 'coming';
								$status_name = 'coming soon';
								break;
						}
				?>
						<?php echo $disable ? '<div class="services-block__item">' : '<a href="' . get_the_permalink() . '" class="services-block__item">'; ?>
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