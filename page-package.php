<?php
get_header();
?>


<div class="py-3 d-flex align-items-center" style="height:calc(100vh - 50px);">
	<div class="swiper">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php
			$arg3 = array(
				// 'posts_per_page' => 7,
				// 'post_type' => 'post',
				// 'paged' => 1,
				// 'offset' => 5,
				'orderby' => 'date',
			);
			$q3 = new WP_Query($arg3);
			if ($q3->have_posts()) {
				while ($q3->have_posts()) {

					$q3->the_post();
			?>
					<div class="swiper-slide card d-flex justify-content-between flex-column" style="padding:0;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);background-position:center;background-size:cover;">
						<div></div>
						<div class="p-3 py-4 d-flex justify-content-between flex-column" style=" background:linear-gradient(transparent, rgba(0,0,0,0.8)" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">

							<div></div>
							<div class=" d-flex justify-content-between flex-column">

								<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>

								<small class="card-text"><?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8') ?></small>
								<br />
								<a class="btn btn-primary" type="button" href="<?php echo esc_url(get_permalink()); ?>">
									<?php
									if (get_post_meta(get_the_id(), 'package_info', true)) {
										$seoMeta = get_post_meta(get_the_id(), 'package_info', true);
									?>
										<span><?= $seoMeta['duration']; ?></span>&nbsp;
										<i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;
										<span><?= number_format($seoMeta['price']); ?>ကျပ်</span>
										<?php
									} else {
										?>အပြည့်အစုံ...<?php
														}
															?>
								</a>
							</div>

						</div>
					</div>
			<?php
				}
			} else {
				// no posts found
			} ?>
		</div>
		<!-- If we need pagination -->
		<!-- <div class="swiper-pagination"></div> -->

		<!-- If we need navigation buttons -->
		<!-- <div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div> -->

		<!-- If we need scrollbar -->
		<!-- <div class="swiper-scrollbar"></div> -->
	</div>
	<script>
		const swiper = new Swiper('.swiper', {
			// Optional parameters
			// direction: 'vertical',
			slidesPerView: 1.5,
			spaceBetween: 10,
			loop: true,
			autoplay: {
				delay: 2500,
				disableOnInteraction: true,
			},
			// effect: "coverflow",
			grabCursor: true,
			centeredSlides: true,

			pagination: {
				el: ".swiper-pagination",
			},
		});
	</script>
</div>
<?php get_footer(); ?>