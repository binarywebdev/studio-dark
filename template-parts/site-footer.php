<?php
/**
 * Site footer — bubble drop-in + CTA + bottom links.
 *
 * @package StudioDark
 */
$home = home_url( '/' );
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
		<div class="cfoot-eyebrow">Build a top site in a few moments</div>
		<h2>Let&rsquo;s start a top<br>creative website</h2>
		<a href="mailto:hello@studio.dev" class="btn-pill" data-magnet>Get in touch <span class="arr">&#8594;</span></a>
	</div>

	<div class="cfoot-bot">
		<div class="logo">studio<span>&deg;</span></div>
		<nav class="cfoot-links"><a href="<?php echo esc_url( $home . '#about' ); ?>">About</a><a href="<?php echo esc_url( $home . '#work' ); ?>">Work</a><a href="<?php echo esc_url( $home . '#services' ); ?>">Services</a><a href="<?php echo esc_url( $home . '#process' ); ?>">Process</a></nav>
		<nav class="cfoot-social"><a href="#">Behance</a><a href="#">Dribbble</a><a href="#">Instagram</a><a href="#">LinkedIn</a></nav>
		<span class="cfoot-copy">&copy; Studio&deg; 2026 — Made in the dark.</span>
	</div>

</footer>
