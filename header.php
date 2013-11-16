<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/fonts.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/layout.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/colors.css" />

<link href='http://fonts.googleapis.com/css?family=Lato:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:700,400' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
   
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<?php if ( $user_ID ) : ?>
<!--- Hide Google Analytics code from logged in users --->
<?php else : ?>

<!--- Google Analytics Code --->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29727194-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif; ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
<?php do_action( 'before' ); ?>
   <div id="page-header" >
	<header id="branding" role="banner">
		<hgroup>
<!--			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
-->
			<span id="logo">
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</span>
			<span id="nav-search">
				<span class="search-thingy">
					<form name="search" action="<?php bloginfo('wpurl') ?>" method="get">
						<input type="text" name="s" value="Search" onfocus="if(value=='Search'){value=''}" onblur="if(value==''){value='Search'}"></input>
<!--		<input class="search-button" type="submit" value="Search"></input>  -->
					</form>
				</span>
			</span>
		</hgroup>
		<nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'toolbox' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'toolbox' ); ?>"><?php _e( 'Skip to content', 'toolbox' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	</header><!-- #branding -->
	</div>

	<div id="main">