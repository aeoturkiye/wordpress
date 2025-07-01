<?php
/*
 * Page Name: Settings
 */

use ModalWindowPro\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/settings.php' );
$field    = new CreateFields( $options, $page_opt );
$id       = $options['id'] ?? '';

$item_order = ! empty( $options['item_order']['triggers'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][triggers]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-crosshairs"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Triggers', 'wow-modal-windows-pro' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'modal_show' ); ?>
					<?php $field->create( 'modal_timer' ); ?>
					<?php $field->create( 'reach_window' ); ?>
                </div>
                <div class="wpie-fields">
					<?php $field->create( 'use_cookies' ); ?>
					<?php $field->create( 'modal_cookies' ); ?>
					<?php $field->create( 'set_cookies' ); ?>
                </div>
                <div class="wpie-fields is-column wpie-trigger-click">
                    <ul>
                        <li>
                            <b class="wpie-color-danger"><?php esc_html_e( 'You can open popup via adding to the element:', 'wow-modal-windows-pro' ); ?></b>
                        </li>
                        <li><strong>Class</strong> - wow-modal-id-<?php echo absint( $id ); ?>, like <code>&lt;span
                                class="wow-modal-id-<?php echo absint( $id ); ?>"&gt;Open Popup&lt;/span&gt;</code>
                        </li>
                        <li><strong>ID</strong> - wow-modal-id-<?php echo absint($id); ?>, like <code>&lt;span
                                id="wow-modal-id-<?php echo absint($id); ?>"&gt;Open Popup&lt;/span&gt;</code></li>
                        <li><strong>URL</strong> - #wow-modal-id-<?php echo absint( $id ); ?>, like <code>&lt;a
                                href="#wow-modal-id-<?php echo absint( $id ); ?>">Open Popup&lt;/a&gt;</code></li>
                    </ul>
	                <?php $field->create( 'open_selectors' ); ?>

                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['animation'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][animation]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-sparkle"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Animation', 'wow-modal-windows-pro' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'window_animate' ); ?>
					<?php $field->create( 'speed_window' ); ?>
                </div>
                <div class="wpie-fields">
		            <?php $field->create( 'window_animate_out' ); ?>
		            <?php $field->create( 'speed_window_out' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['close_popup'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][close_popup]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-square-minus"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Closing Modal', 'wow-modal-windows-pro' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'close_button_remove' ); ?>
					<?php $field->create( 'close_button_overlay' ); ?>
					<?php $field->create( 'close_button_esc' ); ?>
					<?php $field->create( 'mail_send_timer' ); ?>
                </div>
                <div class="wpie-fields">
					<?php $field->create( 'close_delay' ); ?>
					<?php $field->create( 'auto_close_delay' ); ?>
                </div>
                <div class="wpie-fields">
		            <?php $field->create( 'close_redirect' ); ?>
		            <?php $field->create( 'close_redirect_target' ); ?>
                </div>
                <div class="wpie-fields is-column">
                    <ul>
                        <li>
                            <b class="wpie-color-danger"><?php esc_html_e( 'You can сlose popup via adding to the element:', 'wow-modal-windows-pro' ); ?></b>
                        </li>
                        <li><strong>Class</strong> - wow-modal-close-<?php echo absint($id); ?>, like <code>&lt;span
                                class="wow-modal-close-<?php echo absint($id); ?>"&gt;Close Popup&lt;/span&gt;</code></li>
                        <li><strong>ID</strong> - wow-modal-close-<?php echo absint($id); ?>, like <code>&lt;span
                                id="wow-modal-close-<?php echo absint($id); ?>"&gt;Close Popup&lt;/span&gt;</code></li>
                        <li><strong>URL</strong> - #wow-modal-close-<?php echo absint($id); ?>, like <code>&lt;a
                                href="#wow-modal-close-<?php echo absint($id); ?>">Close Popup&lt;/a&gt;</code></li>
                    </ul>
	                <?php $field->create( 'close_selectors' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['video_support'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][video_support]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-play"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Video support', 'wow-modal-windows-pro' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'video_support' ); ?>
					<?php $field->create( 'video_autoplay' ); ?>
					<?php $field->create( 'video_close' ); ?>
                </div>
                <div class="wpie-fields is-column">
                    <b class="wpie-color-danger"><?php esc_html_e( 'Use this option if you insert video in the content via shortcode [videoBox].', 'wow-modal-windows-pro' ); ?></b>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['tracking'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][tracking]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-chart-line"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Google Event Tracking', 'wow-modal-windows-pro' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Open Popup', 'wow-modal-windows-pro' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'enable_tracking_open' ); ?>
					<?php $field->create( 'event_category_open' ); ?>
					<?php $field->create( 'event_action_open' ); ?>
					<?php $field->create( 'event_label_open' ); ?>
					<?php $field->create( 'event_value_open' ); ?>
                </div>
            </div>

            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Close Popup', 'wow-modal-windows-pro' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'enable_tracking_close' ); ?>
					<?php $field->create( 'event_category_close' ); ?>
					<?php $field->create( 'event_action_close' ); ?>
					<?php $field->create( 'event_label_close' ); ?>
					<?php $field->create( 'event_value_close' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
