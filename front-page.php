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
					<div class="swiper-slide">
						<div class="card">
							<div>
								<img class="card-img-top" src="https://media.istockphoto.com/vectors/cinema-poster-with-cola-filmstrip-and-clapper-vector-vector-id1244034031?b=1&k=20&m=1244034031&s=612x612&w=0&h=cgQ-KdfwwzTWe3_f3x8NgnQlKpiEjlHQUG6CmRq4HK4=" alt="">
								<big>Android</big>
								<p>ယခု website မှ တိုက်ရိုက် ဒေါင်းလုပ်ဆွဲပါ</p>
							</div>
							<button type="button" class="btn btn-primary" style="margin: 0;padding:5px 10px;border:none;height:40px;"><i class="fa fa-android" style="font-size: large;"></i> Download</button>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="card">
							<div>
								<img class="card-img-top" src="https://media.istockphoto.com/vectors/cinema-poster-with-cola-filmstrip-and-clapper-vector-vector-id1244034031?b=1&k=20&m=1244034031&s=612x612&w=0&h=cgQ-KdfwwzTWe3_f3x8NgnQlKpiEjlHQUG6CmRq4HK4=" alt=""/>
								<big>Android</big>
								<p>play store မှ install လုပ်ပါ</p>
							</div>
							<button type=" button" class="btn btn-dark" style="margin: 0;padding:5px 10px;border:none;height:40px;"><img style="height:30px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/google-play-badge.png" alt=""></button>


						</div>
					</div>
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