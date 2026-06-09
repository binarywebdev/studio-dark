<?php
/**
 * Flex layout: hero.
 * Поля: eyebrow, title (textarea, построчно), accent, subtitle,
 *       cta_label, available_label, available_text, stats(repeater: number, unit, label).
 *
 * @package StudioDark
 */

$eyebrow    = get_sub_field( 'eyebrow' ) ?: 'Independent design studio — est. 2016';
$title      = get_sub_field( 'title' ) ?: "We make brands\nmove in the";
$accent     = get_sub_field( 'accent' ) ?: 'dark';
$subtitle   = get_sub_field( 'subtitle' ) ?: 'Cinematic identities, websites and motion for teams that want to feel inevitable — not safe.';
$cta_label  = get_sub_field( 'cta_label' ) ?: 'Start a project';
$avail_lbl  = get_sub_field( 'available_label' ) ?: 'Available';
$avail_txt  = get_sub_field( 'available_text' ) ?: 'for new work — Q3';
$title_lines = preg_split( '/\r\n|\r|\n/', (string) $title );
?>
<main class="hero" id="home">
	<div class="lead">
		<div class="eyebrow hi"><span class="star">&#10022;</span> <?php echo esc_html( $eyebrow ); ?></div>
		<h1>
			<?php foreach ( $title_lines as $line ) : ?>
				<span class="hi"><?php echo esc_html( $line ); ?></span><br>
			<?php endforeach; ?>
			<span class="grad hi"><?php echo esc_html( $accent ); ?><span class="period">.</span></span>
		</h1>
		<p class="sub hi"><?php echo esc_html( $subtitle ); ?></p>
		<div class="actions hi">
			<a href="#contact" class="btn-pill" data-magnet><?php echo esc_html( $cta_label ); ?> <span class="arr">&#8594;</span></a>
			<a href="#work" class="btn-circ" data-magnet aria-label="Showreel">&#9654;</a>
			<span class="reel">Watch<br>the reel</span>
		</div>
		<div class="stats hi">
			<?php
			if ( have_rows( 'stats' ) ) :
				$first = true;
				while ( have_rows( 'stats' ) ) :
					the_row();
					if ( ! $first ) {
						echo '<div class="div"></div>';
					}
					$first = false;
					?>
					<div class="stat"><b><?php echo esc_html( (string) get_sub_field( 'number' ) ); ?><i><?php echo esc_html( (string) get_sub_field( 'unit' ) ); ?></i></b><span><?php echo esc_html( (string) get_sub_field( 'label' ) ); ?></span></div>
					<?php
				endwhile;
			else :
				?>
				<div class="stat"><b>9<i>yrs</i></b><span>in the field</span></div>
				<div class="div"></div>
				<div class="stat"><b>320<i>+</i></b><span>projects shipped</span></div>
				<div class="div"></div>
				<div class="stat"><b>5.0<i>&#9733;</i></b><span>average rating</span></div>
			<?php endif; ?>
		</div>
	</div>

	<div class="visual hi">
		<div class="shape">
			<div class="shape-inner"></div>
			<div class="shape-mesh"></div>
			<div class="shape-shine"></div>
		</div>
		<div class="badge">
			<svg viewBox="0 0 200 200">
				<defs><path id="circle" d="M 100,100 m -74,0 a 74,74 0 1,1 148,0 a 74,74 0 1,1 -148,0"/></defs>
				<text><textPath href="#circle">· LET&rsquo;S MAKE SOMETHING LOUD · SCROLL DOWN </textPath></text>
			</svg>
			<span class="badge-arrow">&#8595;</span>
		</div>
		<div class="chip">
			<span class="live"></span>
			<div><b><?php echo esc_html( $avail_lbl ); ?></b><span><?php echo esc_html( $avail_txt ); ?></span></div>
		</div>
	</div>

	<div class="scroll-cue hi"><span></span> scroll</div>
</main>
