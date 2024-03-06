<!DOCTYPE html>
<html>
    <head>
        <title>
            <?= (is_single() || is_page()) ? (the_title() . ' - ') : '' ?>
            <?= get_bloginfo( 'name' ); ?>
        </title>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&family=Suez+One" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js" integrity="sha512-2AL/VEauKkZqQU9BHgnv48OhXcJPx9vdzxN1JrKDVc4FPU/MEE/BZ6d9l0mP7VmvLsjtYwqiYQpDskK9dG8KBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url( get_stylesheet_uri() ); ?>?ver=20231107" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.1/knockout-latest.js" integrity="sha512-2AL/VEauKkZqQU9BHgnv48OhXcJPx9vdzxN1JrKDVc4FPU/MEE/BZ6d9l0mP7VmvLsjtYwqiYQpDskK9dG8KBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php wp_head() ?>
    </head>
    <body>
        <div class="mobile-header">
            <div class="hamburger-menu cursor" data-bind="click: function() { hamburgerOpen(!hamburgerOpen()) }"><i data-bind="css: { 'bi-list': !hamburgerOpen(), 'bi-x': hamburgerOpen() }"></i></div>
            <div class="logo">
                <div><a href="<?php echo get_bloginfo( 'wpurl' );?>"><img src="<?= get_theme_file_uri('images/dylanwolf-photo36.png') ?>" alt="Dylan Wolf" /></a></div>
                <div><a href="<?php echo get_bloginfo( 'wpurl' );?>">Dylan Wolf</a></div>
            </div>
			<div class="subhead">
				Knoxville, TN
			</div>
        </div>
        <div class="main-layout">
            <div class="menu-panel" id="menu" data-bind="css: { 'expanded': hamburgerOpen() }">
                <div class="menu-flex">
                    <div class="logo">
                        <div><a href="<?php echo get_bloginfo( 'wpurl' );?>"><img src="<?= get_theme_file_uri('images/dylanwolf-photo36.png') ?>" alt="Dylan Wolf" /></a></div>
                        <div><a href="<?php echo get_bloginfo( 'wpurl' );?>">Dylan Wolf</a></div>
                    </div>
					<div class="subhead">
						Knoxville, TN
					</div>
                    <?php foreach (dylanwolf_get_menu_items('Nav-Sidebar') as $nav) { ?>
                        <div class="menu-item<?= dylanwolf_is_active_nav_link($nav->url) ? ' active' : '' ?>"><a href="<?= $nav->url ?>"><?= $nav->title ?></a></div>
                    <?php } ?>
                </div>
                <div class="tag-cloud">
                    <?php wp_tag_cloud() ?>
                </div>
                <div class="social-icons">
                    <a href="https://github.com/dylanwolf/"><i class="bi-github" alt="GitHub"></i></a>
                    <a href="https://homebrewery.naturalcrit.com/user/dylanwolf"><i class="bi-dice6fill" alt="Homebrewery (tabletop RPG writing)"></i></a>
                    <a href="http://www.osmcast.com/"><i class="bi-broadcast-pin" alt="OSMcast (podcast)"></i></a>
                    <a href="https://dylanwolf.itch.io/#"><i class="bi-controller" alt="itch.io (video games)"></i></a>
                    <a href="https://dylanwolf.deviantart.com/"><i class="bi-brush" alt="deviantart"></i></a>
                    <a href="https://www.flickr.com/photos/dylan_wolf/"><i class="bi-camera" alt="Flickr"></i></a>
                    <a href="mailto:dylan.wolf@gmail.com"><i class="bi-envelope" alt="Email"></i></a>
                    <a href="https://links.dylanwolf.com/"><i class="bi-link-45deg" alt="Other links"></i></a>
                </div>
            </div>
