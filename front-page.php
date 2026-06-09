<?php
/**
 * Front page — SCF Flexible Content конструктор (модель C).
 *
 * Если на странице-главной собран билдер (поле `sections`) — рендерим слои
 * из template-parts/flex/. Иначе показываем статичный лендинг (fallback),
 * чтобы сайт работал до импорта JSON и заполнения блоков.
 *
 * @package StudioDark
 */

get_header();
get_template_part( 'template-parts/bg' );
get_template_part( 'template-parts/nav' );

if ( have_posts() ) {
	the_post();
}

if ( function_exists( 'have_rows' ) && have_rows( 'sections' ) ) :
	while ( have_rows( 'sections' ) ) :
		the_row();
		$layout = str_replace( '_', '-', (string) get_row_layout() );
		get_template_part( 'template-parts/flex/' . $layout );
	endwhile;
else :
	get_template_part( 'template-parts/static-landing' );
endif;

get_footer();
