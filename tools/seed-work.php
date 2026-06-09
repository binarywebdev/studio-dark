<?php
/**
 * Одноразовый сидер контента Work в Options.
 * Запуск:
 *   wp eval-file wp-content/themes/studio-dark/tools/seed-work.php --allow-root --path=/var/www/binarywd.com
 * После заполнения можно править в админке (Главная). Файл не подключается темой.
 *
 * @package StudioDark
 */

if ( ! function_exists( 'update_field' ) ) {
	WP_CLI::error( 'SCF/update_field недоступен — плагин не активен?' );
}

$items = array(
	array(
		'category' => 'Branding',
		'title'    => 'Luminos',
		'art'      => 'a1',
	),
	array(
		'category' => 'Web · Motion',
		'title'    => 'Cinemak',
		'art'      => 'a2',
	),
	array(
		'category' => 'Identity',
		'title'    => 'Nova',
		'art'      => 'a3',
	),
	array(
		'category' => 'UI/UX',
		'title'    => 'Volta',
		'art'      => 'a2',
	),
	array(
		'category' => 'E-commerce',
		'title'    => 'Forma',
		'art'      => 'a3',
	),
	array(
		'category' => 'Design System',
		'title'    => 'Aura',
		'art'      => 'a1',
	),
);

// Используем КЛЮЧ поля (надёжнее для пустого repeater на options).
$ok = update_field( 'field_work_items', $items, 'option' );

if ( $ok ) {
	WP_CLI::success( 'Засеяно проектов: ' . count( $items ) );
} else {
	WP_CLI::warning( 'update_field вернул false — проверь, что группа полей зарегистрирована (тема активна, inc/scf-fields.php подключён).' );
}
