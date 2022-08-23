<div class="card" style="padding:0;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);background-position:center;background-size:cover;">
	<div class="p-3 py-4 d-flex justify-content-between flex-column" style="height:calc(100vh - 200px); background:linear-gradient(transparent, rgba(0,0,0,0.8)" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">

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