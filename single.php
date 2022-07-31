<?php
get_header();
?>
<div class="container">
    <div>
        <?php
        if (has_post_thumbnail()) {
        ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" style="max-width:220px">
        <?php
            // if (get_post_format()) {
            // 	wn_post_format(get_post_format());  
            // }
        }
        ?>
        <div>
            <h5 class="p-1"><?php the_title('<b>', '</b>'); ?></h5>
            <?php social(); ?>
        </div>
    </div>
    <div class="p-1">
        <p><?php echo the_content(); ?></p>
    </div>
</div>


<?php get_footer(); ?>