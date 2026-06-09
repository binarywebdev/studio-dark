<?php
/**
 * Site navigation. Anchor links resolve against the home page so the nav
 * works from inner pages too.
 *
 * @package StudioDark
 */
$home = home_url( '/' );
?>
<header class="nav">
	<a class="logo" href="<?php echo esc_url( $home ); ?>">studio<span>&deg;</span></a>
	<nav class="nav-menu">
		<a href="<?php echo esc_url( $home . '#work' ); ?>">Work</a>
		<a href="<?php echo esc_url( $home . '#about' ); ?>">Studio</a>
		<a href="<?php echo esc_url( $home . '#services' ); ?>">Services</a>
		<a href="<?php echo esc_url( $home . '#contact' ); ?>">Contact</a>
	</nav>
	<a href="<?php echo esc_url( $home . '#contact' ); ?>" class="nav-cta" data-magnet>Let&rsquo;s talk <span class="dot"></span></a>
</header>
