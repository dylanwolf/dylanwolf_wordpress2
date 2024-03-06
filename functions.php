<?php

function dylanwolf_is_active_nav_link($link_url) {
    global $wp;

    if ($link_url == '/' && !is_page() && have_posts()) return true;

    $url_path = strtolower(parse_url(home_url( $wp->request ), PHP_URL_PATH));

    if ($link_url == '/hiking' && str_starts_with($url_path, '/hiking-trails')) return true;
    if ($link_url == '/recipes' && str_starts_with($url_path, '/recipes')) return true;
    if (str_starts_with($link_url, '/panels') && str_starts_with($url_path, '/panels')) return true;
    if (str_starts_with($link_url, '/cons') && str_starts_with($url_path, '/cons')) return true;
    if (str_starts_with($link_url, '/game-dev') && str_starts_with($url_path, '/game-dev')) return true;
    if (str_starts_with($link_url, '/software-development') && str_starts_with($url_path, '/software-development')) return true;

    return false;
}

function dylanwolf_get_tab_menu_name() {
    global $wp;
    $url_path = strtolower(parse_url(home_url( $wp->request ), PHP_URL_PATH));

    if (is_blog_list()) return 'Tabs-Blog';
    if (str_starts_with($url_path, '/panels')) return 'Tabs-Panels';
    if (str_starts_with($url_path, '/cons')) return 'Tabs-Cons';
    if (str_starts_with($url_path, '/game-dev')) return 'Tabs-GameDev';
    if (str_starts_with($url_path, '/software-development')) return 'Tabs-SoftwareDev';

    return null;
}

function dylanwolf_get_menu_items($menu_name) {
    $mnu = wp_get_nav_menu_object($menu_name);
    return wp_get_nav_menu_items($mnu->term_id);
}

function is_blog_list() {
    return !is_page() && !is_single() && have_posts();
}

function dylanwolf_is_active_tab_link($link_url) {
    if (is_front_page() || is_tag()) return $link_url == '/';

    $cat = get_queried_object();
    if ($cat != null && $cat->slug != null && '/category/'.$cat->slug == $link_url) return true;

    global $wp;
    $url_path = strtolower(parse_url(home_url( $wp->request ), PHP_URL_PATH));
    if ($url_path == $link_url) return true;

    return false;
}

function dylanwolf_get_tab_items() {
    $menu_name = dylanwolf_get_tab_menu_name();
    if ($menu_name == null) return [];
    return dylanwolf_get_menu_items($menu_name);
}

function dylanwolf_tabmenu() {
    $tabs = dylanwolf_get_tab_items();

    if ($tabs && count($tabs) >= 1) {
        ?><div class="tab-panel">
            <div class="tab-flex">
            <?php foreach(dylanwolf_get_tab_items() as $tab) { ?>
                <div class="tab<?= dylanwolf_is_active_tab_link($tab->url) ? ' active' : ''?>">
                    <a href="<?= $tab->url ?>"><?= $tab->title ?></a>
                </div>
            <?php } ?>
            </div>
        </div><?php
    }
}

// TODO: Get active menu item from current URL
// TODO: Get active tab from current URL

?>