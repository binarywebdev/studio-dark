<?php
/**
 * Flex layout: footer_cta.
 * Поля: eyebrow, heading, email, nav_links (repeater: label, url), socials (repeater: label, url).
 *
 * @package StudioDark
 */

$eyebrow = get_sub_field( 'eyebrow' ) ?: 'Build a top site in a few moments';
$heading = get_sub_field( 'heading' ) ?: "Let&rsquo;s start a top\ncreative website";
$email   = get_sub_field( 'email' ) ?: 'hello@studio.dev';
$head_lines = preg_split( '/\r\n|\r|\n/', (string) $heading );
?>
<footer class="cfoot" id="contact">

	<div class="cfoot-bg" aria-hidden="true"></div>

	<div class="cfoot-circles" id="cfootCircles">
		<span class="cf-wrap" style="--d:.02s; --fall:290px; --dur:1.15s; --b1:42px; --b2:13px; --rot:-6deg; --sx:0px"><span class="cf-bubble cb-ghost">Fully responsive</span></span>
		<span class="cf-wrap" style="--d:.20s; --fall:360px; --dur:1.45s; --b1:58px; --b2:18px; --rot:5deg; --sx:-6px"><span class="cf-bubble cb-ghost cb-lg">Unique blog style</span></span>
		<span class="cf-wrap" style="--d:.07s; --fall:430px; --dur:1.55s; --b1:66px; --b2:20px; --rot:-4deg; --sx:5px"><span class="cf-bubble cb-violet cb-xl">Browser friendly code</span></span>
		<span class="cf-wrap" style="--d:.42s; --fall:240px; --dur:1.00s; --b1:30px; --b2:9px;  --rot:8deg; --sx:0px"><span class="cf-bubble cb-ghost cb-sm cb-rot">Dark / light</span></span>
		<span class="cf-wrap" style="--d:.27s; --fall:320px; --dur:1.30s; --b1:48px; --b2:15px; --rot:-7deg; --sx:6px"><span class="cf-bubble cb-lime cb-lg">Smooth scrolling</span></span>
		<span class="cf-wrap" style="--d:.55s; --fall:300px; --dur:1.25s; --b1:40px; --b2:12px; --rot:3deg; --sx:-5px"><span class="cf-bubble cb-ghost cb-xl">Advanced typography</span></span>
		<span class="cf-wrap" style="--d:.48s; --fall:260px; --dur:1.10s; --b1:34px; --b2:10px; --rot:-5deg; --sx:0px"><span class="cf-bubble cb-ghost">Creative slider</span></span>
		<span class="cf-wrap" style="--d:.33s; --fall:385px; --dur:1.50s; --b1:60px; --b2:17px; --rot:6deg; --sx:-5px"><span class="cf-bubble cb-violet cb-lg">Lifetime updates</span></span>
		<span class="cf-wrap" style="--d:.63s; --fall:345px; --dur:1.35s; --b1:50px; --b2:14px; --rot:-3deg; --sx:4px"><span class="cf-bubble cb-white cb-lg">Header &amp; footer</span></span>
		<span class="cf-wrap" style="--d:.72s; --fall:250px; --dur:1.05s; --b1:32px; --b2:8px;  --rot:7deg; --sx:0px"><span class="cf-bubble cb-lime cb-sm cb-rot">Built with care</span></span>
	</div>

	<div class="cfoot-cta">
		<div class="cfoot-eyebrow"><?php echo esc_html( $eyebrow ); ?></div>
		<h2><?php
		foreach ( $head_lines as $idx => $line ) {
			echo esc_html( $line );
			if ( $idx < count( $head_lines ) - 1 ) {
				echo '<br>';
			}
		}
		?></h2>
		<a href="mailto:<?php echo esc_attr( $email ); ?>" class="btn-pill" data-magnet>Get in touch <span class="arr">&#8594;</span></a>
	</div>

	<div class="cfoot-bot">
		<div class="logo">studio<span>&deg;</span></div>
		<nav class="cfoot-links">
			<?php
			if ( have_rows( 'nav_links' ) ) :
				while ( have_rows( 'nav_links' ) ) :
					the_row();
					printf( '<a href="%s">%s</a>', esc_url( (string) get_sub_field( 'url' ) ), esc_html( (string) get_sub_field( 'label' ) ) );
				endwhile;
			else :
				echo '<a href="#about">About</a><a href="#work">Work</a><a href="#services">Services</a><a href="#process">Process</a>';
			endif;
			?>
		</nav>
		<nav class="cfoot-social">
			<?php
			if ( have_rows( 'socials' ) ) :
				while ( have_rows( 'socials' ) ) :
					the_row();
					printf( '<a href="%s">%s</a>', esc_url( (string) get_sub_field( 'url' ) ), esc_html( (string) get_sub_field( 'label' ) ) );
				endwhile;
			else :
				echo '<a href="#">Behance</a><a href="#">Dribbble</a><a href="#">Instagram</a><a href="#">LinkedIn</a>';
			endif;
			?>
		</nav>
		<span class="cfoot-copy">&copy; Studio&deg; 2026 — Made in the dark.</span>
	</div>

</footer>
