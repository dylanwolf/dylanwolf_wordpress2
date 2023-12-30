<div class="blog-post-single">
    <h1><?php the_title(); ?></h2>
    <p class="meta-date"><?php the_date(); ?></p>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
    <div style="clear: both;"></div>
    <div class="meta-links">
    <?php
        $categories_list = get_the_category_list( wp_get_list_item_separator() );
        $tags_list = get_the_tag_list( '', wp_get_list_item_separator() );

        $has_categories = !empty($categories_list);
        $has_tags = !empty($tags_list);

        if ($has_categories) { ?><span class="meta-header">Posted in: </span><?= $categories_list ?><?php }
        if ($has_categories && $has_tags) { ?><span class="sep"> | </span><?php }
        if ($has_tags) { ?><span class="meta-header">Tagged as: </span><?= $tags_list ?><?php }
    ?>
    </div>
    <div class="comments">
    <?php comments_template( '', true ); ?>
    </div>
</div>