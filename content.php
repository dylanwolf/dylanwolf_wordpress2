<div class="blog-post-multi">
    <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <div class="meta-date"><?php the_date(); ?></div>
    <div class="post-content">
        <?php the_content( '<div class="continue-reading">Continue reading <span class="meta-nav">&rarr;</span></div>') ?>
    </div>
    <div class="meta-links">
    <?php
        $categories_list = get_the_category_list( wp_get_list_item_separator() );
        $tags_list = get_the_tag_list( '', wp_get_list_item_separator() );

        $has_categories = !empty($categories_list);
        $has_tags = !empty($tags_list);
        $comments_open = comments_open();

        if ($has_categories) { ?><span class="meta-header">Posted in: </span><?= $categories_list ?><?php }
        if ($has_categories && $has_tags) { ?><span class="sep"> | </span><?php }
        if ($has_tags) { ?><span class="meta-header">Tagged as: </span><?= $tags_list ?><?php }
        if (($has_categories || $has_tags) && $comments_open) { ?><span class="sep"> | </span><?php }
        if ($comments_open) {
            ?><span class="comments-link"><?php
            comments_popup_link('Leave a reply', '1 comment', '% comments');
            ?></span><?php
        }
    ?>
    </div>
</div>