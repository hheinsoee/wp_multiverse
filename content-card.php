<div class="card"><a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 150, ' ...'), ENT_QUOTES, 'UTF-8') ?>" class="thumbnail card" <?php post_class(); ?>>
		<?php
		if (has_post_thumbnail()) {
		?>

			<img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Card image cap">
		<?php
			// if (get_post_format()) {
			// 	wn_post_format(get_post_format());  
			// }
		}
		?>
		<div class="card-body">
			<h5 class="card-title"><?php the_title('<b>', '</b>'); ?></h5>
			<!-- <p class="card-text"><?php //echo html_entity_decode(mb_strimwidth(get_the_excerpt(), 0, 70, ' ...<i>ဆက်ဖတ်ရန်</i>'), ENT_QUOTES, 'UTF-8') ?></p> -->
		<?php
		if(get_post_meta(get_the_id(), 'package_info', true)||get_the_tags(get_the_ID())){
			$seoMeta = get_post_meta(get_the_id(), 'package_info', true);
			echo $seoMeta['duration'];
			echo $seoMeta['price'];
		};
		?>
		</div>
	</a>
</div>