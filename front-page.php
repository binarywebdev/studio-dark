<?php
/**
 * Front page — cinematic one-page landing.
 *
 * @package StudioDark
 */

get_header();
get_template_part( 'template-parts/bg' );
get_template_part( 'template-parts/nav' );
?>

<!-- HERO -->
<main class="hero" id="home">
	<div class="lead">
		<div class="eyebrow hi"><span class="star">&#10022;</span> Independent design studio — est. 2016</div>
		<h1>
			<span class="hi">We make brands</span><br>
			<span class="hi">move in the</span><br>
			<span class="grad hi">dark<span class="period">.</span></span>
		</h1>
		<p class="sub hi">Cinematic identities, websites and motion for teams that want to feel inevitable — not safe.</p>
		<div class="actions hi">
			<a href="#contact" class="btn-pill" data-magnet>Start a project <span class="arr">&#8594;</span></a>
			<a href="#work" class="btn-circ" data-magnet aria-label="Showreel">&#9654;</a>
			<span class="reel">Watch<br>the reel</span>
		</div>
		<div class="stats hi">
			<div class="stat"><b>9<i>yrs</i></b><span>in the field</span></div>
			<div class="div"></div>
			<div class="stat"><b>320<i>+</i></b><span>projects shipped</span></div>
			<div class="div"></div>
			<div class="stat"><b>5.0<i>&#9733;</i></b><span>average rating</span></div>
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
			<div><b>Available</b><span>for new work — Q3</span></div>
		</div>
	</div>

	<div class="scroll-cue hi"><span></span> scroll</div>
</main>

<!-- MARQUEE -->
<div class="marquee">
	<div class="marquee-track">
		<span>Branding <i>&#10022;</i> Web Design <i>&#10022;</i> Motion <i>&#10022;</i> Strategy <i>&#10022;</i> Art Direction <i>&#10022;</i> </span>
		<span>Branding <i>&#10022;</i> Web Design <i>&#10022;</i> Motion <i>&#10022;</i> Strategy <i>&#10022;</i> Art Direction <i>&#10022;</i> </span>
	</div>
</div>

<!-- SELECTED WORK — scroll-driven horizontal slider -->
<div class="work-wrap" id="workWrap">
	<div class="work-sticky">
		<div class="work-watermark" aria-hidden="true">WORK</div>
		<div class="work-inner">

			<div class="work-left">
				<div class="eyebrow"><span class="star">&#10022;</span> Selected work</div>
				<h2>Recent<br><span class="grad">obsessions.</span></h2>
				<p>Projects we still think about — identity, web and motion, built to be remembered.</p>
				<div class="work-hint"><span class="hint-line"></span> scroll to explore</div>
			</div>

			<div class="work-slider">
				<div class="work-track" id="workTrack">
					<article class="wcard"><div class="wc-art a1"></div><span class="wc-num">01</span><div class="wc-meta"><span>Branding</span><b>Luminos</b></div></article>
					<article class="wcard"><div class="wc-art a2"></div><span class="wc-num">02</span><div class="wc-meta"><span>Web · Motion</span><b>Cinemak</b></div></article>
					<article class="wcard"><div class="wc-art a3"></div><span class="wc-num">03</span><div class="wc-meta"><span>Identity</span><b>Nova</b></div></article>
					<article class="wcard"><div class="wc-art a2"></div><span class="wc-num">04</span><div class="wc-meta"><span>UI/UX</span><b>Volta</b></div></article>
					<article class="wcard"><div class="wc-art a3"></div><span class="wc-num">05</span><div class="wc-meta"><span>E-commerce</span><b>Forma</b></div></article>
					<article class="wcard"><div class="wc-art a1"></div><span class="wc-num">06</span><div class="wc-meta"><span>Design System</span><b>Aura</b></div></article>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- ABOUT -->
<section class="section about" id="about">
	<div class="reveal">
		<div class="eyebrow"><span class="star">&#10022;</span> The studio</div>
		<p class="about-lead">We&rsquo;re a small team obsessed with making brands that don&rsquo;t just <em>look</em> good — they <em>move</em>, they breathe, they refuse to be ignored.</p>
	</div>
	<div class="about-side reveal">
		<p>For nine years we&rsquo;ve partnered with founders and teams who&rsquo;d rather be unforgettable than safe. Strategy first, pixels second.</p>
		<p>Every engagement is senior-led — no hand-offs to juniors, no template thinking.</p>
		<div class="about-tags">
			<span>Strategy</span><span>Identity</span><span>Web</span><span>Motion</span><span>Art Direction</span>
		</div>
	</div>
</section>

<!-- SERVICES — sticky stacking cards -->
<section class="svc" id="services">
	<div class="sec-head">
		<div class="reveal">
			<div class="eyebrow"><span class="star">&#10022;</span> What we do</div>
			<h2>Services that<br><span class="grad">compound.</span></h2>
		</div>
		<p class="reveal">Five disciplines, stacked the way we actually work — scroll to flip through.</p>
	</div>

	<div class="svc-stack">
		<article class="svc-card sc-1" style="--i:0">
			<h3>Brand &amp; graphic design</h3>
			<div class="svc-bottom">
				<div class="svc-tags"><span>Strategy</span><span>Logo</span><span>Packaging</span><span>Brandbook</span></div>
				<p>We craft identities people recognise and remember — from positioning to a visual system that scales across every touchpoint.</p>
			</div>
			<a href="#contact" class="svc-arrow" aria-label="Brand &amp; graphic design">&#8599;</a>
			<span class="svc-orb"></span>
		</article>

		<article class="svc-card sc-2" style="--i:1">
			<h3>Creative development</h3>
			<div class="svc-bottom">
				<div class="svc-tags"><span>Frontend</span><span>Interactions</span><span>Backend</span><span>Mobile apps</span></div>
				<p>We build high-performance websites and applications using modern tech — scalable, functional and tuned for performance.</p>
			</div>
			<a href="#contact" class="svc-arrow" aria-label="Creative development">&#8599;</a>
			<span class="svc-orb"></span>
		</article>

		<article class="svc-card sc-3" style="--i:2">
			<h3>UI/UX &amp; product</h3>
			<div class="svc-bottom">
				<div class="svc-tags"><span>Apps</span><span>Research</span><span>Prototyping</span><span>Design systems</span></div>
				<p>Seamless digital products shaped by real user insight — from research and flows to polished, tested interfaces.</p>
			</div>
			<a href="#contact" class="svc-arrow" aria-label="UI/UX and product">&#8599;</a>
			<span class="svc-orb"></span>
		</article>

		<article class="svc-card sc-4" style="--i:3">
			<h3>Motion &amp; 3D</h3>
			<div class="svc-bottom">
				<div class="svc-tags"><span>Showreels</span><span>Loops</span><span>WebGL</span><span>Art direction</span></div>
				<p>Movement that makes a brand feel alive — title sequences, looping graphics and immersive WebGL on the web.</p>
			</div>
			<a href="#contact" class="svc-arrow" aria-label="Motion and 3D">&#8599;</a>
			<span class="svc-orb"></span>
		</article>

		<article class="svc-card sc-5" style="--i:4">
			<h3>Design systems</h3>
			<div class="svc-bottom">
				<div class="svc-tags"><span>Components</span><span>Tokens</span><span>Docs</span><span>Governance</span></div>
				<p>Modular foundations that future-proof growth — component kits, tokens and documentation your team can build on.</p>
			</div>
			<a href="#contact" class="svc-arrow" aria-label="Design systems">&#8599;</a>
			<span class="svc-orb"></span>
		</article>
	</div>
</section>

<!-- PROCESS -->
<section class="section" id="process">
	<div class="sec-head">
		<div class="reveal">
			<div class="eyebrow"><span class="star">&#10022;</span> How we work</div>
			<h2>From dark<br><span class="grad">to delivered.</span></h2>
		</div>
		<p class="reveal">No wasted rounds. We align on strategy early, then design from the first take.</p>
	</div>
	<div class="proc-grid">
		<div class="proc-step reveal"><div class="pn">01</div><h4>Discovery</h4><p>We dig into your goals, market and constraints before a single pixel is placed.</p></div>
		<div class="proc-step reveal"><div class="pn">02</div><h4>Concept</h4><p>Strategy and direction aligned early — so the first concept is the one you ship.</p></div>
		<div class="proc-step reveal"><div class="pn">03</div><h4>Craft</h4><p>If it doesn&rsquo;t work at scale, it doesn&rsquo;t ship. We refine until it sings.</p></div>
		<div class="proc-step reveal"><div class="pn">04</div><h4>Deliver</h4><p>Clean documentation and supervision through build — exactly as intended.</p></div>
	</div>
</section>

<?php
get_template_part( 'template-parts/site-footer' );
get_footer();
