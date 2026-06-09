<?php
/**
 * Search results.
 *
 * @package StudioDark
 */

get_header();
get_template_part( 'template-parts/bg' );
get_template_part( 'template-parts/nav' );
?>

<main class="page-main" style="max-width:760px;margin:0 auto;padding:9rem 1.5rem 6rem;">
	<h1 class="grad"><?php printf( esc_html__( 'Результаты: %s', 'studio-dark' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class(); ?> style="margin-bottom:3rem;">
				<h2><a href="<?php the_permalink(); ?>" style="color:inherit;"><?php the_title(); ?></a></h2>
				<div class="entry"><?php the_excerpt(); ?></div>
			</article>
			<?php
		endwhile;
		?>
		<div class="pagination"><?php the_posts_pagination(); ?></div>
	<?php else : ?>
		<p>Ничего не найдено.</p>
	<?php endif; ?>
</main>

<?php
get_template_part( 'template-parts/site-footer' );
get_footer();
