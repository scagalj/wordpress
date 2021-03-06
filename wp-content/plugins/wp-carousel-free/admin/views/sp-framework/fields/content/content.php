<?php
/**
 *
 * Field: content
 *
 * @since 1.0.0
 * @version 1.0.0
 * @package WP Carousel
 * @subpackage wp-carousel-free/sp-framework
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

if ( ! class_exists( 'SP_WPCF_Field_content' ) ) {

	/**
	 *
	 * Field: content
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 *  @package WP Carousel
	 * @subpackage wp-carousel-free/sp-framework
	 */
	class SP_WPCF_Field_content extends SP_WPCF_Fields {

		/**
		 * Content field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		/**
		 * Render
		 *
		 * @return void
		 */
		public function render() {

			if ( ! empty( $this->field['content'] ) ) {

				echo wp_kses_post( $this->field['content'] );

			}

		}

	}
}
