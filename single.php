<?php
get_header();
?>
<div class="container">
    <div>
        <h5 class="p-1"><?php the_title('<b>', '</b>'); ?></h5>
        <?php social(); ?>
    </div>
    <div class="p-1">
        <p><?php echo the_content(); ?></p>
    </div>
</div>


<?php get_footer(); ?>