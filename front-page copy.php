<?php
get_header();

?>
<video autoplay muted loop style="
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
  min-width: 100%;
  min-height: 100%;
    ">
	<source src="<?php echo get_template_directory_uri(); ?>/assets/video/media_bg.webm" type="video/webm">
</video>
<div style="
backdrop-filter:blur(3px) brightness(0.75);
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background:rgba(0,0,0,0.4); 
    "></div>
<div style="position:relative; color:#dfdfdf;">
	<div class="d-flex justify-content-between flex-column" style="min-height: 80vh;">
		<div class="d-flex justify-content-center align-items-center flex-fill">
			<center>
				<h1 class="theme-font big-font"><?php echo get_bloginfo('name'); ?></h1>
				<span><?php echo get_bloginfo('description'); ?></span>
				<br />
				<br />
				<div class="m-1 p-1">
					ဒေါင်းလုပ်ယူပါ
					<div class="grid my-1 py-1">
						<button type="button" class="btn btn-primary" style="margin: 0;padding:5px 10px;border:none;height:40px;"><i class="fa fa-android" style="font-size: large;"></i> Download</button>
						<button type="button" class="btn btn-dark" style="margin: 0;padding:5px 10px;border:none;height:40px;"><img style="height:30px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/google-play-badge.png" alt=""></button>
					</div>
				</div>

			</center>
		</div>
		<div class="py-1">
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
								get_template_part('content', 'card');
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
					slidesPerView: 2,
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