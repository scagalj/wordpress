<?php
/**
 *
 * Field: notice
 *
 * @since 1.0.0
 * @version 1.0.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

if ( ! class_exists( 'SP_WPCF_Field_notice' ) ) {

	/**
 *
 * Field: notice
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class SP_WPCF_Field_notice extends SP_WPCF_Fields {

		/**
		 * Notice field constructor.
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
			$style = ( ! empty( $this->field['style'] ) ) ? $this->field['style'] : 'normal';
			echo ( ! empty( $this->field['content'] ) ) ? '<div class="wpcf-notice wpcf-notice-' . esc_attr( $style ) . '">' . wp_kses_post( $this->field['content'] ) . '</div>' : '';

		}

	}
}
