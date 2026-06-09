<?php
/**
 * Flex layout: services.
 * Поля: heading, accent, intro, cards (repeater: title, description, tags(repeater: tag)).
 *
 * @package StudioDark
 */

$heading = get_sub_field( 'heading' ) ?: 'Services that';
$accent  = get_sub_field( 'accent' ) ?: 'compound.';
$intro   = get_sub_field( 'intro' ) ?: 'Five disciplines, stacked the way we actually work — scroll to flip through.';
?>
<section class="svc" id="services">
	<div class="sec-head">
		<div class="reveal">
			<div class="eyebrow"><span class="star">&#10022;</span> What we do</div>
			<h2><?php echo esc_html( $heading ); ?><br><span class="grad"><?php echo esc_html( $accent ); ?></span></h2>
		</div>
		<p class="reveal"><?php echo esc_html( $intro ); ?></p>
	</div>

	<div class="svc-stack">
		<?php
		if ( have_rows( 'cards' ) ) :
			$i = 0;
			while ( have_rows( 'cards' ) ) :
				the_row();
				++$i;
				$title = (string) get_sub_field( 'title' );
				$desc  = (string) get_sub_field( 'description' );
				?>
				<article class="svc-card sc-<?php echo (int) $i; ?>" style="--i:<?php echo (int) ( $i - 1 ); ?>">
					<h3><?php echo esc_html( $title ); ?></h3>
					<div class="svc-bottom">
						<div class="svc-tags">
							<?php
							if ( have_rows( 'tags' ) ) :
								while ( have_rows( 'tags' ) ) :
									the_row();
									echo '<span>' . esc_html( (string) get_sub_field( 'tag' ) ) . '</span>';
								endwhile;
							endif;
							?>
						</div>
						<p><?php echo esc_html( $desc ); ?></p>
					</div>
					<a href="#contact" class="svc-arrow" aria-label="<?php echo esc_attr( $title ); ?>">&#8599;</a>
					<span class="svc-orb"></span>
				</article>
				<?php
			endwhile;
		else :
			?>
			<article class="svc-card sc-1" style="--i:0">
				<h3>Brand &amp; graphic design</h3>
				<div class="svc-bottom">
					<div class="svc-tags"><span>Strategy</span><span>Logo</span><span>Packaging</span><span>Brandbook</span></div>
					<p>We craft identities people recognise and remember — from positioning to a visual system that scales across every touchpoint.</p>
				</div>
				<a href="#contact" class="svc-arrow" aria-label="Brand &amp; graphic design">&#8599;</a>
				<span class="svc-orb"></span>
			</article>
		<?php endif; ?>
	</div>
</section>
