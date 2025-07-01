<?php
/*
 * Page Name: Targeting & Rules
 */

use ModalWindowPro\Admin\CreateFields;
use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/rules.php' );
$field    = new CreateFields( $options, $page_opt );

?>

<?php
$item_order = ! empty( $options['item_order']['8'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][8]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-roadmap"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Display Rules', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset wpie-rules">
            <div class="wpie-fields">
				<?php $field->create( 'show', 0 ); ?>
				<?php $field->create( 'operator', 0 ); ?>
				<?php $field->create( 'ids', 0 ); ?>
				<?php $field->create( 'page_type', 0 ); ?>
				<?php $field->create( 'custom_url', 0 ); ?>
            </div>

			<?php
			$rules_count = ( ! empty( $options['show'] ) && is_array( $options['show'] ) ) ? count( $options['show'] ) : 0;
			if ( $rules_count > 1 ):
				for ( $i = 1; $i < $rules_count; $i ++ ):
					?>
                    <div class="wpie-fields">
						<?php $field->create( 'show', $i ); ?>
						<?php $field->create( 'operator', $i ); ?>
						<?php $field->create( 'ids', $i ); ?>
						<?php $field->create( 'page_type', $i ); ?>
						<?php $field->create( 'custom_url', $i ); ?>
                        <span class="wpie-remove wpie-icon wpie_icon-trash"></span>
                    </div>
				<?php endfor; endif; ?>
            <hr>
            <div class="wpie-fields">
                <button class="button button-small wpie-add-rule">
					<?php esc_html_e( 'Add Rule', 'wow-modal-windows-pro' ); ?>
                </button>
            </div>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['9'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][9]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-laptop-mobile"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Responsive Visibility', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-fields">
				<?php $field->create( 'screen' ); ?>
				<?php $field->create( 'screen_more' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'remove_mobile' ); ?>
				<?php $field->create( 'remove_desktop' ); ?>
            </div>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['10'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][10]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-users"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Permissions', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-legend"><?php esc_html_e( 'Permissions', 'wow-modal-windows-pro' ); ?></div>
            <div class="wpie-fields">
				<?php $field->create( 'users' ); ?>
				<?php
				foreach ( Settings_Helper::user_roles() as $key => $value ) {
					$field->create( $key );
				}
				?>
            </div>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['11'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][11]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-gear"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Other', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-fields">
				<?php $field->create( 'geotargeting' ); ?>
				<?php $field->create( 'popup' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'language' ); ?>
				<?php $field->create( 'locale' ); ?>
            </div>
            <div class="wpie-fields">
				<?php $field->create( 'open_popup_url' ); ?>
				<?php $field->create( 'open_hash_url' ); ?>
            </div>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['12'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][12]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-calendar"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Schedule', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset wpie-schedule">
			<?php
			$schedule_count = ( ! empty( $options['weekday'] ) && is_array( $options['weekday'] ) ) ? count( $options['weekday'] ) : 0;
			if ( $schedule_count > 0 ):
				for ( $i = 0; $i < $schedule_count; $i ++ ):
					?>
                    <div class="wpie-fields">
						<?php $field->create( 'weekday', $i ); ?>
						<?php $field->create( 'time_start', $i ); ?>
						<?php $field->create( 'time_end', $i ); ?>
                        <div class="wpie-field"></div>
						<?php $field->create( 'dates', $i ); ?>
						<?php $field->create( 'date_start', $i ); ?>
						<?php $field->create( 'date_end', $i ); ?>
                        <span class="wpie-remove wpie-icon wpie_icon-trash"></span>
                    </div>
				<?php endfor; endif; ?>

            <hr>
            <div class="wpie-fields">
                <button class="button button-small wpie-add-schedule">
					<?php esc_html_e( 'Add Schedule', 'wow-modal-windows-pro' ); ?>
                </button>
            </div>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['13'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][13]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-globe-pointer"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Hide Based on Browser', 'wow-modal-windows-pro' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">

        <div class="wpie-fieldset">
            <div class="wpie-fields">
				<?php $field->create( 'browser_opera' ); ?>
				<?php $field->create( 'browser_edge' ); ?>
				<?php $field->create( 'browser_chrome' ); ?>
				<?php $field->create( 'browser_safari' ); ?>
				<?php $field->create( 'browser_firefox' ); ?>
				<?php $field->create( 'browser_ie' ); ?>
				<?php $field->create( 'browser_other' ); ?>
            </div>
        </div>
    </div>
</details>

<template id="template-schedule">
    <div class="wpie-fields">
		<?php $field->create( 'weekday', - 1 ); ?>
		<?php $field->create( 'time_start', - 1 ); ?>
		<?php $field->create( 'time_end', - 1 ); ?>
        <div class="wpie-field"></div>
		<?php $field->create( 'dates', - 1 ); ?>
		<?php $field->create( 'date_start', - 1 ); ?>
		<?php $field->create( 'date_end', - 1 ); ?>
        <span class="wpie-remove wpie-icon wpie_icon-trash"></span>
    </div>
</template>

<template id="template-rules">
    <div class="wpie-fields">
		<?php $field->create( 'show', - 1 ); ?>
		<?php $field->create( 'operator', - 1 ); ?>
		<?php $field->create( 'ids', - 1 ); ?>
		<?php $field->create( 'page_type', - 1 ); ?>
		<?php $field->create( 'custom_url', - 1 ); ?>
        <span class="wpie-remove wpie-icon wpie_icon-trash"></span>
    </div>
</template>