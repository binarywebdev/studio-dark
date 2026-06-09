<?php
/**
 * Flex layout: process.
 * Поля: heading, accent, intro, steps (repeater: title, description).
 *
 * @package StudioDark
 */

$heading = get_sub_field( 'heading' ) ?: 'From dark';
$accent  = get_sub_field( 'accent' ) ?: 'to delivered.';
$intro   = get_sub_field( 'intro' ) ?: 'No wasted rounds. We align on strategy early, then design from the first take.';
?>
<section class="section" id="process">
	<div class="sec-head">
		<div class="reveal">
			<div class="eyebrow"><span class="star">&#10022;</span> How we work</div>
			<h2><?php echo esc_html( $heading ); ?><br><span class="grad"><?php echo esc_html( $accent ); ?></span></h2>
		</div>
		<p class="reveal"><?php echo esc_html( $intro ); ?></p>
	</div>
	<div class="proc-grid">
		<?php
		if ( have_rows( 'steps' ) ) :
			$n = 0;
			while ( have_rows( 'steps' ) ) :
				the_row();
				++$n;
				?>
				<div class="proc-step reveal"><div class="pn"><?php echo esc_html( sprintf( '%02d', $n ) ); ?></div><h4><?php echo esc_html( (string) get_sub_field( 'title' ) ); ?></h4><p><?php echo esc_html( (string) get_sub_field( 'description' ) ); ?></p></div>
				<?php
			endwhile;
		else :
			?>
			<div class="proc-step reveal"><div class="pn">01</div><h4>Discovery</h4><p>We dig into your goals, market and constraints before a single pixel is placed.</p></div>
			<div class="proc-step reveal"><div class="pn">02</div><h4>Concept</h4><p>Strategy and direction aligned early — so the first concept is the one you ship.</p></div>
			<div class="proc-step reveal"><div class="pn">03</div><h4>Craft</h4><p>If it doesn&rsquo;t work at scale, it doesn&rsquo;t ship. We refine until it sings.</p></div>
			<div class="proc-step reveal"><div class="pn">04</div><h4>Deliver</h4><p>Clean documentation and supervision through build — exactly as intended.</p></div>
		<?php endif; ?>
	</div>
</section>
