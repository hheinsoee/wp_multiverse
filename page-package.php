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
			?>
					<div class="swiper-slide">
						<?php
						$q3->the_post();
						get_template_part('content', 'list');
						?>
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