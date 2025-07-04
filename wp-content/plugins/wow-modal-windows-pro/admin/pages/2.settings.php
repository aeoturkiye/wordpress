<?php
/*
 * Page Name: Add New
 */

use ModalWindowPro\Admin\CreateFields;
use ModalWindowPro\Admin\Settings;
use ModalWindowPro\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

$options = Settings::get_options();

$title = $options['title'] ?? '';
$id    = $options['id'] ?? '';

if ( ! isset( $options['live_preview'] ) ) {
	$builder_open = ' open';
} elseif ( ! empty( $options['live_preview'] ) ) {
	$builder_open = ' open';
} else {
	$builder_open = '';
}
?>
    <form action="" id="wpie-settings" class="wpie-settings__wrapper" method="post">

        <div class="wpie-settings__main">

            <div class="wpie-field title">
                <label class="wpie-field__label">
                <span class="screen-reader-text">
                    <?php esc_html_e( 'Enter title here', 'wow-modal-windows-pro' ); ?></span>
                    <input type="text" name="title" size="30" value="<?php echo esc_attr( $title ); ?>" id="title"
                           placeholder="<?php esc_attr_e( 'Add title', 'wow-modal-windows-pro' ); ?>">
                </label>
                <button class="button wpie-preview-button"><span class="wpie-icon wpie_icon-eye-open"></span> <?php esc_html_e( 'Modal Preview', 'wow-modal-windows-pro' ); ?></button>
            </div>

			<?php Settings::init(); ?>

        </div>

        <div class="wpie-settings__sidebar">
			<?php require_once WOWP_Plugin::dir() . 'admin/settings/sidebar.php'; ?>
        </div>

        <input type="hidden" name="tool_id" value="<?php echo absint( $id ); ?>" id="tool_id"/>
        <input type="hidden" name="item_time" value="<?php echo esc_attr( time() ); ?>"/>
		<?php wp_nonce_field( WOWP_Plugin::PREFIX . '_nonce', WOWP_Plugin::PREFIX . '_settings' ); ?>
    </form>

<div class="modal-window-preview"></div>
<?php
