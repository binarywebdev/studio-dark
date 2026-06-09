<?php
/**
 * Secure Custom Fields — определения полей (модель C).
 *
 * Структура полей живёт ЗДЕСЬ (git) через acf_add_local_field_group().
 * Значения (контент) живут в БД и правятся в админке.
 * SCF — форк ACF Pro, поэтому используются acf_* функции (с guard'ами).
 *
 * @package StudioDark
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Options-страница «Главная» — держит контент лендинга.
 */
add_action(
	'acf/init',
	function () {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(
				array(
					'page_title' => 'Контент главной',
					'menu_title' => 'Главная',
					'menu_slug'  => 'studio-home',
					'capability' => 'edit_posts',
					'icon_url'   => 'dashicons-layout',
					'position'   => 3,
					'redirect'   => false,
				)
			);
		}
	}
);

/**
 * Группы полей.
 */
add_action(
	'acf/init',
	function () {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}

		// Work — карточки проектов (repeater).
		acf_add_local_field_group(
			array(
				'key'      => 'group_studio_work',
				'title'    => 'Главная — Work (проекты)',
				'fields'   => array(
					array(
						'key'          => 'field_work_items',
						'label'        => 'Проекты (карточки Work)',
						'name'         => 'work_items',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Добавить проект',
						'sub_fields'   => array(
							array(
								'key'   => 'field_work_category',
								'label' => 'Категория',
								'name'  => 'category',
								'type'  => 'text',
							),
							array(
								'key'   => 'field_work_title',
								'label' => 'Название',
								'name'  => 'title',
								'type'  => 'text',
							),
							array(
								'key'           => 'field_work_art',
								'label'         => 'Стиль обложки',
								'name'          => 'art',
								'type'          => 'select',
								'choices'       => array(
									'a1' => 'Вариант 1',
									'a2' => 'Вариант 2',
									'a3' => 'Вариант 3',
								),
								'default_value' => 'a1',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'studio-home',
						),
					),
				),
			)
		);
	}
);
