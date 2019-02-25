<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PhoenixDigiVietNam
 * @subpackage PhoenixDigiVietNam
 * @since 3.0.0
 * @version 3.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#" itemscope itemtype="http://schema.org/WebPage">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div id="page" class="site">

			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'phoenixdigi' ); ?></a>

			<header id="masthead" class="site-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

				<?php get_template_part( 'templates/layout/header' ); ?>

			</header><!-- #masthead -->

			<div id="content" class="site-content">
