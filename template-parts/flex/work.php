<?php
/**
 * Flex layout: work — тянет записи CPT `project`.
 * Поля: heading, intro, count (сколько проектов показать).
 * Поля проекта (CPT): category (text), cover_style (a1|a2|a3).
 *
 * @package StudioDark
 */

$heading = get_sub_field( 'heading' ) ?: 'Recent';
$accent  = get_sub_field( 'accent' ) ?: 'obsessions.';
$intro   = get_sub_field( 'intro' ) ?: 'Projects we still think about — identity, web and motion, built to be remembered.';
$count   = (int) get_sub_field( 'count' );
if ( $count <= 0 ) {
	$count = 6;
}

$projects = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => $count,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	)
);
?>
<div class="work-wrap" id="workWrap">
	<div class="work-sticky">
		<div class="work-watermark" aria-hidden="true">WORK</div>
		<div class="work-inner">

			<div class="work-left">
				<div class="eyebrow"><span class="star">&#10022;</span> Selected work</div>
				<h2><?php echo esc_html( $heading ); ?><br><span class="grad"><?php echo esc_html( $accent ); ?></span></h2>
				<p><?php echo esc_html( $intro ); ?></p>
				<div class="work-hint"><span class="hint-line"></span> scroll to explore</div>
			</div>

			<div class="work-slider">
				<div class="work-track" id="workTrack">
					<?php
					if ( $projects->have_posts() ) :
						$wc_num = 0;
						while ( $projects->have_posts() ) :
							$projects->the_post();
							++$wc_num;
							$cat = function_exists( 'get_field' ) ? (string) get_field( 'category' ) : '';
							$art = function_exists( 'get_field' ) ? (string) get_field( 'cover_style' ) : '';
							$art = $art ? $art : 'a1';
							?>
							<article class="wcard"><div class="wc-art <?php echo esc_attr( $art ); ?>"></div><span class="wc-num"><?php echo esc_html( sprintf( '%02d', $wc_num ) ); ?></span><div class="wc-meta"><span><?php echo esc_html( $cat ); ?></span><b><?php the_title(); ?></b></div></article>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<article class="wcard"><div class="wc-art a1"></div><span class="wc-num">01</span><div class="wc-meta"><span>Branding</span><b>Luminos</b></div></article>
						<article class="wcard"><div class="wc-art a2"></div><span class="wc-num">02</span><div class="wc-meta"><span>Web · Motion</span><b>Cinemak</b></div></article>
						<article class="wcard"><div class="wc-art a3"></div><span class="wc-num">03</span><div class="wc-meta"><span>Identity</span><b>Nova</b></div></article>
						<article class="wcard"><div class="wc-art a2"></div><span class="wc-num">04</span><div class="wc-meta"><span>UI/UX</span><b>Volta</b></div></article>
						<article class="wcard"><div class="wc-art a3"></div><span class="wc-num">05</span><div class="wc-meta"><span>E-commerce</span><b>Forma</b></div></article>
						<article class="wcard"><div class="wc-art a1"></div><span class="wc-num">06</span><div class="wc-meta"><span>Design System</span><b>Aura</b></div></article>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>
