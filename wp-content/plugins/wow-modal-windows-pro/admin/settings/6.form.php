<?php
/*
 * Page Name: Form
 */

use ModalWindowPro\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/form.php' );
$field    = new CreateFields( $options, $page_opt );
$id       = $options['id'] ?? '';

$item_order = ! empty( $options['item_order']['form'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>


<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][form]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-newsletter"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Form', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Fields', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'form_name' ); ?>
				<?php $field->create( 'form_email' ); ?>
				<?php $field->create( 'form_text' ); ?>
				<?php $field->create( 'form_button' ); ?>
            </div>
        </div>


        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Form Style', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'form_width' ); ?>
				<?php $field->create( 'form_padding' ); ?>
				<?php $field->create( 'form_margin' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'form_border' ); ?>
				<?php $field->create( 'form_radius' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'form_background' ); ?>
				<?php $field->create( 'form_border_color' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Fields Style', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'form_text_size' ); ?>
				<?php $field->create( 'form_input_height' ); ?>
				<?php $field->create( 'form_textarea_height' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'field_border' ); ?>
				<?php $field->create( 'field_radius' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'field_background' ); ?>
				<?php $field->create( 'field_border_color' ); ?>
				<?php $field->create( 'form_text_color' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Button Style', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'form_button_size' ); ?>
				<?php $field->create( 'form_button_text_color' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'button_background_color' ); ?>
				<?php $field->create( 'button_hover_color' ); ?>
            </div>
        </div>

    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['email'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][email]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-envelope"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Email Settings', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Confirmation', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
			    <?php $field->create( 'mail_send_text' ); ?>
			    <?php $field->create( 'mail_send_text_size' ); ?>
			    <?php $field->create( 'mail_send_text_color' ); ?>
			    <?php $field->create( 'emsi' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Email to Admin', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
			    <?php $field->create( 'send_to_admin' ); ?>
			    <?php $field->create( 'mail_send_admin_mail' ); ?>
			    <?php $field->create( 'mail_send_mail_subject' ); ?>
            </div>
            <div class="wpie-fields is-column -editor-box">
		        <?php $field->create( 'admincontent' ); ?>
            </div>
        </div>

        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Email to User', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
			    <?php $field->create( 'send_to_user' ); ?>
			    <?php $field->create( 'mail_send_from_mail' ); ?>
			    <?php $field->create( 'mail_send_user_subject' ); ?>
			    <?php $field->create( 'mail_send_from_text' ); ?>
            </div>
            <div class="wpie-fields is-column -editor-box">
			    <?php $field->create( 'usercontent' ); ?>
            </div>
        </div>

    </div>
</details>

