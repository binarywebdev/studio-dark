<?php
/**
 * Тема: настройка CPT и редактора под модель C (SCF).
 *
 * Структура полей (Flexible Content главной + поля проекта) импортируется
 * через SCF (JSON, см. scf-import.json) и живёт в БД/acf-json — НЕ здесь.
 * Здесь только то, что относится к коду темы: тип записи и снятие редактора.
 *
 * @package StudioDark
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * CPT «Проекты» (портфолио).
 */
add_action(
	'init',
	function () {
		register_post_type(
			'project',
			array(
				'labels'       => array(
					'name'          => 'Проекты',
					'singular_name' => 'Проект',
					'add_new_item'  => 'Добавить проект',
					'edit_item'     => 'Редактировать проект',
					'menu_name'     => 'Проекты',
				),
				'public'       => true,
				'has_archive'  => true,
				'menu_icon'    => 'dashicons-portfolio',
				'menu_position' => 4,
				'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
				'rewrite'      => array( 'slug' => 'work' ),
				'show_in_rest' => true,
			)
		);
	}
);

/**
 * На странице-главной убираем редактор (контент собирается в SCF Flexible Content).
 */
add_filter(
	'use_block_editor_for_post',
	function ( $use, $post ) {
		if ( $post && (int) get_option( 'page_on_front' ) === (int) $post->ID ) {
			return false;
		}
		return $use;
	},
	10,
	2
);

add_action(
	'admin_init',
	function () {
		$front = (int) get_option( 'page_on_front' );
		if ( ! $front ) {
			return;
		}
		$post_id = 0;
		if ( isset( $_GET['post'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$post_id = (int) $_GET['post']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		}
		if ( $post_id === $front ) {
			remove_post_type_support( 'page', 'editor' );
		}
	}
);
