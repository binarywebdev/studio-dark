<?php
/**
 * Flex layout: about.
 * Поля: eyebrow, lead, body (wysiwyg), tags (repeater: tag).
 *
 * @package StudioDark
 */

$eyebrow = get_sub_field( 'eyebrow' ) ?: 'The studio';
$lead    = get_sub_field( 'lead' ) ?: 'We&rsquo;re a small team obsessed with making brands that don&rsquo;t just look good — they move, they breathe, they refuse to be ignored.';
$body    = get_sub_field( 'body' );
?>
<section class="section about" id="about">
	<div class="reveal">
		<div class="eyebrow"><span class="star">&#10022;</span> <?php echo esc_html( $eyebrow ); ?></div>
		<p class="about-lead"><?php echo esc_html( $lead ); ?></p>
	</div>
	<div class="about-side reveal">
		<?php
		if ( $body ) {
			echo wp_kses_post( wpautop( $body ) );
		} else {
			echo '<p>For nine years we&rsquo;ve partnered with founders and teams who&rsquo;d rather be unforgettable than safe. Strategy first, pixels second.</p><p>Every engagement is senior-led — no hand-offs to juniors, no template thinking.</p>';
		}
		?>
		<div class="about-tags">
			<?php
			if ( have_rows( 'tags' ) ) :
				while ( have_rows( 'tags' ) ) :
					the_row();
					echo '<span>' . esc_html( (string) get_sub_field( 'tag' ) ) . '</span>';
				endwhile;
			else :
				echo '<span>Strategy</span><span>Identity</span><span>Web</span><span>Motion</span><span>Art Direction</span>';
			endif;
			?>
		</div>
	</div>
</section>
