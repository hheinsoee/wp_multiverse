<div class="card" style="padding:0;background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);background-position:center;background-size:cover;">
	<div class="p-3 py-4 d-flex justify-content-between flex-column" 
	style="height:calc(100vh - 150px); background:linear-gradient(rgba(0,0,0,0.8),transparent, rgba(0,0,0,0.8)" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>">
		<?php
		if (get_post_meta(get_the_id(), 'package_info', true) || get_the_tags(get_the_ID())) {
			$seoMeta = get_post_meta(get_the_id(), 'package_info', true);
		?>
			<div class="d-flex h2 justify-content-center">
				<div>
					<span><?= $seoMeta['duration']; ?></span> =
					<span><?= $seoMeta['price']; ?></span>
				</div>
			</div>
		<?php
		};
		?>
		<div></div>
		<div class=" d-flex justify-content-between flex-column">
			<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>

			<small class="card-text"><?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...'), ENT_QUOTES, 'UTF-8') ?></small>
			<br/>
			<a class="btn btn-primary" type="button" href="<?php echo esc_url(get_permalink()); ?>">detail</a>
		</div>

	</div>
</div>