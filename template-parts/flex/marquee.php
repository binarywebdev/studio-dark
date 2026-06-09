<?php
/**
 * Flex layout: marquee.
 * Поля: items (repeater: item).
 *
 * @package StudioDark
 */

$items = array();
if ( have_rows( 'items' ) ) {
	while ( have_rows( 'items' ) ) {
		the_row();
		$val = trim( (string) get_sub_field( 'item' ) );
		if ( '' !== $val ) {
			$items[] = $val;
		}
	}
}
if ( empty( $items ) ) {
	$items = array( 'Branding', 'Web Design', 'Motion', 'Strategy', 'Art Direction' );
}

$run = '';
foreach ( $items as $it ) {
	$run .= esc_html( $it ) . ' <i>&#10022;</i> ';
}
?>
<div class="marquee">
	<div class="marquee-track">
		<span><?php echo $run; // already escaped ?></span>
		<span><?php echo $run; // already escaped ?></span>
	</div>
</div>
