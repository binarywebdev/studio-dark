<?php
/**
 * 404.
 *
 * @package StudioDark
 */

get_header();
get_template_part( 'template-parts/bg' );
get_template_part( 'template-parts/nav' );
?>

<main class="page-main" style="max-width:760px;margin:0 auto;padding:9rem 1.5rem 6rem;text-align:center;">
	<h1 class="grad" style="font-size:clamp(4rem,12vw,9rem);">404</h1>
	<p>Страница потерялась в темноте.</p>
	<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-pill" data-magnet>На главную <span class="arr">&#8594;</span></a></p>
</main>

<?php
get_template_part( 'template-parts/site-footer' );
get_footer();
