<?php get_header(); ?>

<div style="position:relative; color:#dfdfdf;">
	<div class="d-flex justify-content-between flex-column" style="min-height: 80vh;">
		<div class="d-flex justify-content-center align-items-center flex-fill">
			<center>
				<h1 class="theme-font big-font"><?php echo get_bloginfo('name'); ?></h1>
				<span><?php echo get_bloginfo('description'); ?></span>
			</center>
		</div>
		<div class="py-1">
			<div class="swiper">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<?php
					$arg3 = array(
						// 'posts_per_page' => 7,
						'post_type' => 'apps',
						// 'paged' => 1,
						// 'offset' => 5,
						'orderby' => 'date',
					);
					$q3 = new WP_Query($arg3);
					if ($q3->have_posts()) {
						while ($q3->have_posts()) {
							$q3->the_post();
							if (get_post_meta(get_the_id(), 'app', true) || get_the_tags(get_the_ID())) {
								$app = get_post_meta(get_the_id(), 'app', true);
					?>
								<div class="swiper-slide">
									<div class="card">
										<div>
											<img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
											<big><?=the_title('<b>', '</b>');?></big> <i><small><?= $app['os']; ?></small></i>
											<div><small><?= $app['description']; ?></small></div>
										</div>

										<a class="btn btn-primary" type="button" href="<?= $app['link']; ?>">
											Download</a>

									</div>
								</div>
					<?php
							};
						}
					} else {
						// no posts found
					} ?>

				</div>
			</div>
			<script>
				const swiper = new Swiper('.swiper', {
					// Optional parameters
					// direction: 'vertical',
					slidesPerView: 1.5,
					spaceBetween: 0,
					loop: true,
					autoplay: {
						delay: 2500,
						disableOnInteraction: true,
					},
					effect: "coverflow",
					grabCursor: true,
					centeredSlides: true,
					coverflowEffect: {
						rotate: 50,
						stretch: 0,
						depth: 100,
						modifier: 1,
						slideShadows: true,
					},
					pagination: {
						el: ".swiper-pagination",
					},
				});
			</script>
		</div>
	</div>
</div>
<?php get_footer(); ?>