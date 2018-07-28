<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hemingway Rewritten
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-image">
			<div class="site-branding-wrapper">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
    <nav
            id="site-navigation"
            class="main-navigation clear"
            <?php if ( hemingway_is_amp() ) : ?>
                [class]=" siteNavigationMenuExpanded ? 'main-navigation clear toggled' : 'main-navigation clear' "
            <?php endif; ?>
            role="navigation">
            <?php if ( hemingway_is_amp() ) : ?>
                <amp-state id="siteNavigationMenuExpanded">
                    <script type="application/json">false</script>
                </amp-state>
            <?php endif; ?>
            <button
                    class="menu-toggle"
                    aria-controls="primary-menu"
                    aria-expanded="false"
                    <?php if ( hemingway_is_amp() ) : ?>
                        on="tap:AMP.setState( { siteNavigationMenuExpanded: ! siteNavigationMenuExpanded } )"
                        [aria-expanded]="siteNavigationMenuExpanded ? 'true' : 'false'"
                    <?php endif; ?>
            >
                <span class="screen-reader-text"><?php _e( 'Menu', 'hemingway-rewritten' ); ?></span>
            </button>

        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hemingway-rewritten' ); ?></a>

        <?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'menu nav-menu', // The menu_class is added because for some reason the parent theme adds the nav-menu class via JS.
        ) ); ?>
        <div id="header-search-toggle" role="button" tabindex="0"
			<?php if ( hemingway_is_amp() ) : ?>
                on="tap:AMP.setState( { headerSearchExpanded: ! headerSearchExpanded } )"
			<?php endif; ?>
        >
			<?php if ( hemingway_is_amp() ) : ?>
                <amp-state id="headerSearchExpanded">
                    <script type="application/json">false</script>
                </amp-state>
			<?php endif; ?>
            <span class="screen-reader-text"><?php _e( 'Search', 'hemingway-rewritten' ); ?></span>
        </div>
        <div id="header-search"
			<?php if ( hemingway_is_amp() ) : ?>
                [class]=" headerSearchExpanded ? 'toggled' : '' "
			<?php endif; ?>
        >
            <?php get_search_form(); ?>
        </div>
    </nav><!-- #site-navigation -->

	<div id="content" class="site-content">
