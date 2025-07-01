<?php
/**
 * Page Name: License
 *
 */

use ModalWindowPro\WOWP_Plugin_Checker;
use ModalWindowPro\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

$name    = 'wow_license_key_' . WOWP_Plugin::PREFIX;
$license = get_option( 'wow_license_key_' . WOWP_Plugin::PREFIX );

$text = WOWP_Plugin_Checker::key() ? __( 'License deactivation', 'wow-modal-windows-pro' ) : __( 'License activation', 'wow-modal-windows-pro' );

settings_fields( 'wow_license_' . WOWP_Plugin::PREFIX );
?>

    <div class="wpie-block-tool wpie-max-w_750 is-white">
        <form method="post" action="">

            <fieldset class="wpie-fieldset">
                <legend class="wpie-legend"><?php echo esc_html( $text ); ?></legend>

                <div class="wpie-fields is-column">

                    <div class="wpie-field">
                        <label class="wpie-field__label has-icon">
                            <span class="wpie-icon wpie_icon-key"></span>
                            <input type="text" name="<?php echo esc_attr( $name ); ?>" id="license"
                                   value="<?php echo esc_attr( $license ); ?>">
                        </label>
                    </div>

                    <div class="wpie-field">
						<?php if ( WOWP_Plugin_Checker::key() ) : ?>

							<?php submit_button( __( 'Deactivate plugin', 'wow-modal-windows-pro' ), 'secondary', 'plugin-activate', false ); ?>
							<?php wp_nonce_field( WOWP_Plugin::PREFIX . '_nonce', WOWP_Plugin::PREFIX . '_license_deactivated' ); ?>

						<?php else: ?>

							<?php submit_button( __( 'Activate plugin', 'wow-modal-windows-pro' ), 'primary', 'plugin-activate', false ); ?>
							<?php wp_nonce_field( WOWP_Plugin::PREFIX . '_nonce', WOWP_Plugin::PREFIX . '_license_activation' ); ?>

						<?php endif; ?>
                    </div>
            </fieldset>
        </form>

    </div>

<?php

