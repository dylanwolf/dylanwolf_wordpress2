<?php get_header(); ?>
    <div class="content-panel">
        <?php dylanwolf_tabmenu() ?>
        <div class="content-collection">
            <div class="content" role="main">
			<?php
                if (is_page()) {
                    the_post();
                    get_template_part('content-page', get_post_format());
                }
                else if (is_single()) { 
                    the_post();
                    get_template_part('content-single', get_post_format());
                }
                else if (have_posts()) {
                    if (is_tag()) {
                        ?><h2>Tag: <?= single_tag_title( '', false ) ?></h2><?php
                    }

                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'content', get_post_format() );
                    }

                    if ($wp_query->max_num_pages > 1) {
                        ?><div class="page-nav">
                            <div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts') ?></div>
                            <div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>') ?></div>
                        </div><?php
                    }
                } else {
                    ?><h2>Page Not Found</h2>

                    <p>The page you requested wasn't found on the site.</p>

                    <?php get_search_form(); ?>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>