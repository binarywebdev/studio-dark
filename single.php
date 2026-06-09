<?php
/**
 * Single post.
 *
 * @package StudioDark
 */

get_header();
get_template_part( 'template-parts/bg' );
get_template_part( 'template-parts/nav' );
?>

<main class="page-main" style="max-width:760px;margin:0 auto;padding:9rem 1.5rem 6rem;">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>>
			<h1 class="grad"><?php the_title(); ?></h1>
			<p class="post-meta" style="color:var(--wp--preset--color--muted);"><?php echo esc_html( get_the_date() ); ?> · <?php the_category( ', ' ); ?></p>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="page-thumb"><?php the_post_thumbnail( 'large' ); ?></div>
			<?php endif; ?>
			<div class="entry"><?php the_content(); ?></div>
		</article>
		<?php
	endwhile;
	?>
</main>

<?php
get_template_part( 'template-parts/site-footer' );
get_footer();
