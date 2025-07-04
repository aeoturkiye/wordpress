<?php

class APVC_Admin_Menu_Dashboard {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'apvc_admin_dashboard_menu_init' ) );

	}

	public function apvc_admin_dashboard_menu_init() {

		add_menu_page(
			__( 'APVC Dashboard', 'apvc' ),
			__( 'APVC Dashboard', 'apvc' ),
			apply_filters( 'apvc_manage_page_permissions', 'manage_options' ),
			'advanced-page-visit-counter-dashboard',
			array( $this, 'apvc_admin_dashboard_page' ),
			'dashicons-chart-area',
			80
		);

	}

	public function apvc_admin_dashboard_page() {
		$helpers    = new APVC_Admin_Helpers();
		$admin_html = new APVC_Admin_Html();

		if ( isset( $_GET['force_migration'] ) && 'true' === $_GET['force_migration'] ) {
			update_option( 'apvc_migration_process_bulk_90x', 'not_started' );
			echo '<script>window.location.href = "' . APVC_DASHBOARD_PAGE_LINK . '";</script>';
			exit;
		}

		$migration_status = get_option( 'apvc_migration_process_bulk_90x' );
		if ( 'not_started' === $migration_status || 'in_progress' === $migration_status ) {
			$migObject  = new APVC_Migration();
			$oldRecords = $migObject->migrate_records_count();
			?>
			<div class="layout-wrapper layout-content-navbar">
				<div class="layout-container">
					<div class="layout-page" id="apvc_main_block">
						<div class="content-wrapper">
							<div class="container-xxl flex-grow-1 container-p-y apvc-dashbard-block">
									<div class="authentication-inner py-4">
										<!-- Register -->
										<div class="card">
											<div class="card-body">
												<!-- Logo -->
												<div class="app-brand justify-content-center">
													<a href="<?php echo esc_url( APVC_DASHBOARD_PAGE_LINK ); ?>" class="app-brand-link gap-2">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="350pt" height="100pt"
															 viewBox="0 0 540 112.499997" version="1.2">
															<defs>
																<g>
																	<symbol overflow="visible" id="glyph0-0">
																		<path style="stroke:none;"
																			  d="M 0 0 L 0 -25.453125 L 18.171875 -25.453125 L 18.171875 0 Z M 9.09375 -14.359375 L 15.265625 -23.640625 L 2.90625 -23.640625 Z M 10.1875 -12.71875 L 16.359375 -3.453125 L 16.359375 -22 Z M 2.90625 -1.8125 L 15.265625 -1.8125 L 9.09375 -11.09375 Z M 1.8125 -22 L 1.8125 -3.453125 L 8 -12.71875 Z M 1.8125 -22 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-1">
																		<path style="stroke:none;"
																			  d="M 19.453125 -4.6875 L 8.328125 -4.6875 L 6.46875 0 L -0.1875 0 L 10.796875 -25.453125 L 17.453125 -25.453125 L 28.171875 0 L 21.265625 0 Z M 17.5625 -9.59375 L 13.921875 -19.015625 L 10.21875 -9.59375 Z M 17.5625 -9.59375 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-2">
																		<path style="stroke:none;"
																			  d="M 22.25 -26.984375 L 22.25 0 L 15.96875 0 L 15.96875 -2.578125 C 14.53125 -0.691406 12.566406 0.25 10.078125 0.25 C 7.304688 0.25 5.082031 -0.679688 3.40625 -2.546875 C 1.738281 -4.410156 0.90625 -6.859375 0.90625 -9.890625 C 0.90625 -12.890625 1.726562 -15.300781 3.375 -17.125 C 5.03125 -18.945312 7.210938 -19.859375 9.921875 -19.859375 C 12.515625 -19.859375 14.53125 -18.910156 15.96875 -17.015625 L 15.96875 -26.984375 Z M 8.4375 -6.03125 C 9.238281 -5.09375 10.289062 -4.625 11.59375 -4.625 C 12.90625 -4.625 13.960938 -5.09375 14.765625 -6.03125 C 15.566406 -6.976562 15.96875 -8.21875 15.96875 -9.75 C 15.96875 -11.25 15.566406 -12.46875 14.765625 -13.40625 C 13.960938 -14.351562 12.90625 -14.828125 11.59375 -14.828125 C 10.289062 -14.828125 9.238281 -14.359375 8.4375 -13.421875 C 7.632812 -12.492188 7.222656 -11.269531 7.203125 -9.75 C 7.222656 -8.21875 7.632812 -6.976562 8.4375 -6.03125 Z M 8.4375 -6.03125 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-3">
																		<path style="stroke:none;"
																			  d="M 13.640625 0 L 7.203125 0 L -0.1875 -19.59375 L 6.296875 -19.59375 L 10.515625 -5.75 L 14.765625 -19.59375 L 21.015625 -19.59375 Z M 13.640625 0 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-4">
																		<path style="stroke:none;"
																			  d="M 11.3125 -19.890625 C 14 -19.890625 16.085938 -19.265625 17.578125 -18.015625 C 19.066406 -16.765625 19.828125 -15.023438 19.859375 -12.796875 L 19.859375 0 L 13.703125 0 L 13.703125 -2.25 C 12.421875 -0.550781 10.421875 0.296875 7.703125 0.296875 C 5.648438 0.296875 4.015625 -0.269531 2.796875 -1.40625 C 1.585938 -2.550781 0.984375 -4.035156 0.984375 -5.859375 C 0.984375 -7.722656 1.628906 -9.171875 2.921875 -10.203125 C 4.222656 -11.234375 6.085938 -11.757812 8.515625 -11.78125 L 13.671875 -11.78125 L 13.671875 -12.078125 C 13.671875 -13.046875 13.347656 -13.800781 12.703125 -14.34375 C 12.066406 -14.882812 11.117188 -15.15625 9.859375 -15.15625 C 8.085938 -15.15625 6.132812 -14.613281 4 -13.53125 L 2.21875 -17.671875 C 5.394531 -19.148438 8.425781 -19.890625 11.3125 -19.890625 Z M 9.640625 -3.96875 C 10.628906 -3.96875 11.5 -4.210938 12.25 -4.703125 C 13 -5.203125 13.472656 -5.851562 13.671875 -6.65625 L 13.671875 -8.40625 L 9.703125 -8.40625 C 7.816406 -8.40625 6.875 -7.703125 6.875 -6.296875 C 6.875 -5.566406 7.113281 -4.992188 7.59375 -4.578125 C 8.082031 -4.171875 8.765625 -3.96875 9.640625 -3.96875 Z M 9.640625 -3.96875 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-5">
																		<path style="stroke:none;"
																			  d="M 15.34375 -19.890625 C 17.5 -19.890625 19.226562 -19.203125 20.53125 -17.828125 C 21.84375 -16.460938 22.5 -14.640625 22.5 -12.359375 L 22.5 0 L 16.25 0 L 16.25 -10.609375 C 16.25 -11.753906 15.9375 -12.660156 15.3125 -13.328125 C 14.695312 -13.992188 13.859375 -14.328125 12.796875 -14.328125 C 11.679688 -14.328125 10.765625 -13.960938 10.046875 -13.234375 C 9.335938 -12.503906 8.921875 -11.546875 8.796875 -10.359375 L 8.796875 0 L 2.515625 0 L 2.515625 -19.59375 L 8.796875 -19.59375 L 8.796875 -16.390625 C 10.179688 -18.671875 12.363281 -19.835938 15.34375 -19.890625 Z M 15.34375 -19.890625 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-6">
																		<path style="stroke:none;"
																			  d="M 11.046875 -19.8125 C 12.992188 -19.8125 14.722656 -19.429688 16.234375 -18.671875 C 17.742188 -17.910156 18.925781 -16.828125 19.78125 -15.421875 L 15.265625 -12.6875 C 14.296875 -14.039062 12.976562 -14.71875 11.3125 -14.71875 C 10.09375 -14.71875 9.101562 -14.265625 8.34375 -13.359375 C 7.582031 -12.453125 7.203125 -11.257812 7.203125 -9.78125 C 7.203125 -8.28125 7.578125 -7.070312 8.328125 -6.15625 C 9.078125 -5.25 10.070312 -4.796875 11.3125 -4.796875 C 13.15625 -4.796875 14.488281 -5.535156 15.3125 -7.015625 L 19.890625 -4.328125 C 19.085938 -2.867188 17.914062 -1.742188 16.375 -0.953125 C 14.84375 -0.171875 13.046875 0.21875 10.984375 0.21875 C 7.953125 0.21875 5.507812 -0.691406 3.65625 -2.515625 C 1.800781 -4.347656 0.875 -6.757812 0.875 -9.75 C 0.875 -12.75 1.8125 -15.175781 3.6875 -17.03125 C 5.570312 -18.882812 8.023438 -19.8125 11.046875 -19.8125 Z M 11.046875 -19.8125 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-7">
																		<path style="stroke:none;"
																			  d="M 11.09375 -19.8125 C 14.488281 -19.8125 17.039062 -18.769531 18.75 -16.6875 C 20.457031 -14.601562 21.203125 -11.742188 20.984375 -8.109375 L 7.203125 -8.109375 C 7.515625 -6.941406 8.070312 -6.039062 8.875 -5.40625 C 9.675781 -4.78125 10.65625 -4.46875 11.8125 -4.46875 C 13.601562 -4.46875 15.164062 -5.132812 16.5 -6.46875 L 19.8125 -3.234375 C 17.707031 -0.929688 14.859375 0.21875 11.265625 0.21875 C 8.097656 0.21875 5.570312 -0.6875 3.6875 -2.5 C 1.8125 -4.320312 0.875 -6.738281 0.875 -9.75 C 0.875 -12.78125 1.8125 -15.210938 3.6875 -17.046875 C 5.570312 -18.890625 8.039062 -19.8125 11.09375 -19.8125 Z M 7.09375 -11.484375 L 14.9375 -11.484375 C 14.9375 -12.671875 14.59375 -13.628906 13.90625 -14.359375 C 13.21875 -15.085938 12.300781 -15.453125 11.15625 -15.453125 C 10.09375 -15.453125 9.195312 -15.09375 8.46875 -14.375 C 7.738281 -13.664062 7.28125 -12.703125 7.09375 -11.484375 Z M 7.09375 -11.484375 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-8">
																		<path style="stroke:none;" d=""/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-9">
																		<path style="stroke:none;"
																			  d="M 2.546875 -25.453125 L 13.640625 -25.453125 C 16.878906 -25.453125 19.394531 -24.679688 21.1875 -23.140625 C 22.988281 -21.597656 23.890625 -19.410156 23.890625 -16.578125 C 23.890625 -13.597656 22.988281 -11.28125 21.1875 -9.625 C 19.394531 -7.976562 16.878906 -7.15625 13.640625 -7.15625 L 9.015625 -7.15625 L 9.015625 0 L 2.546875 0 Z M 9.015625 -20.359375 L 9.015625 -12.25 L 13.3125 -12.25 C 14.738281 -12.25 15.835938 -12.597656 16.609375 -13.296875 C 17.390625 -14.003906 17.78125 -15.023438 17.78125 -16.359375 C 17.78125 -17.671875 17.390625 -18.664062 16.609375 -19.34375 C 15.835938 -20.019531 14.738281 -20.359375 13.3125 -20.359375 Z M 9.015625 -20.359375 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-10">
																		<path style="stroke:none;"
																			  d="M 21.234375 -19.59375 L 21.234375 -1.78125 C 21.234375 0.976562 20.253906 3.179688 18.296875 4.828125 C 16.347656 6.484375 13.785156 7.3125 10.609375 7.3125 C 7.367188 7.3125 4.460938 6.453125 1.890625 4.734375 L 4.078125 0.46875 C 5.960938 1.78125 7.984375 2.4375 10.140625 2.4375 C 11.648438 2.4375 12.832031 2.070312 13.6875 1.34375 C 14.550781 0.613281 14.984375 -0.363281 14.984375 -1.59375 L 14.984375 -3.671875 C 13.648438 -1.921875 11.769531 -1.046875 9.34375 -1.046875 C 6.84375 -1.046875 4.8125 -1.921875 3.25 -3.671875 C 1.6875 -5.421875 0.90625 -7.710938 0.90625 -10.546875 C 0.90625 -13.304688 1.664062 -15.539062 3.1875 -17.25 C 4.71875 -18.957031 6.722656 -19.8125 9.203125 -19.8125 C 11.691406 -19.84375 13.617188 -18.972656 14.984375 -17.203125 L 14.984375 -19.59375 Z M 10.90625 -5.59375 C 12.113281 -5.59375 13.09375 -6.035156 13.84375 -6.921875 C 14.601562 -7.804688 14.984375 -8.953125 14.984375 -10.359375 C 14.984375 -11.785156 14.601562 -12.941406 13.84375 -13.828125 C 13.09375 -14.710938 12.113281 -15.15625 10.90625 -15.15625 C 9.664062 -15.15625 8.664062 -14.710938 7.90625 -13.828125 C 7.144531 -12.941406 6.765625 -11.785156 6.765625 -10.359375 C 6.765625 -8.953125 7.144531 -7.804688 7.90625 -6.921875 C 8.664062 -6.035156 9.664062 -5.59375 10.90625 -5.59375 Z M 10.90625 -5.59375 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-11">
																		<path style="stroke:none;"
																			  d="M 16.546875 0 L 9.859375 0 L -0.03125 -25.453125 L 6.875 -25.453125 L 13.375 -6.71875 L 19.890625 -25.453125 L 26.546875 -25.453125 Z M 16.546875 0 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-12">
																		<path style="stroke:none;"
																			  d="M 3.28125 -27.609375 C 3.90625 -28.234375 4.703125 -28.546875 5.671875 -28.546875 C 6.640625 -28.546875 7.429688 -28.234375 8.046875 -27.609375 C 8.671875 -26.992188 8.984375 -26.203125 8.984375 -25.234375 C 8.984375 -24.265625 8.671875 -23.460938 8.046875 -22.828125 C 7.429688 -22.203125 6.640625 -21.890625 5.671875 -21.890625 C 4.703125 -21.890625 3.90625 -22.203125 3.28125 -22.828125 C 2.664062 -23.460938 2.359375 -24.265625 2.359375 -25.234375 C 2.359375 -26.203125 2.664062 -26.992188 3.28125 -27.609375 Z M 8.765625 0 L 2.515625 0 L 2.515625 -19.59375 L 8.765625 -19.59375 Z M 8.765625 0 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-13">
																		<path style="stroke:none;"
																			  d="M 9.53125 -19.890625 C 12.414062 -19.890625 15.101562 -19.148438 17.59375 -17.671875 L 15.453125 -13.59375 C 13.023438 -14.90625 10.960938 -15.5625 9.265625 -15.5625 C 7.984375 -15.5625 7.34375 -15.113281 7.34375 -14.21875 C 7.34375 -13.726562 7.691406 -13.316406 8.390625 -12.984375 C 9.097656 -12.660156 9.957031 -12.363281 10.96875 -12.09375 C 11.988281 -11.832031 13.003906 -11.503906 14.015625 -11.109375 C 15.023438 -10.710938 15.878906 -10.078125 16.578125 -9.203125 C 17.285156 -8.328125 17.640625 -7.257812 17.640625 -6 C 17.640625 -4.03125 16.875 -2.492188 15.34375 -1.390625 C 13.8125 -0.296875 11.820312 0.25 9.375 0.25 C 5.914062 0.25 2.984375 -0.671875 0.578125 -2.515625 L 2.578125 -6.515625 C 4.878906 -4.890625 7.195312 -4.078125 9.53125 -4.078125 C 10.957031 -4.078125 11.671875 -4.523438 11.671875 -5.421875 C 11.671875 -5.929688 11.320312 -6.351562 10.625 -6.6875 C 9.9375 -7.03125 9.097656 -7.332031 8.109375 -7.59375 C 7.117188 -7.863281 6.125 -8.195312 5.125 -8.59375 C 4.132812 -9 3.289062 -9.625 2.59375 -10.46875 C 1.90625 -11.320312 1.5625 -12.390625 1.5625 -13.671875 C 1.5625 -15.628906 2.300781 -17.15625 3.78125 -18.25 C 5.257812 -19.34375 7.175781 -19.890625 9.53125 -19.890625 Z M 9.53125 -19.890625 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-14">
																		<path style="stroke:none;"
																			  d="M 13.921875 -5.421875 L 15.15625 -1.046875 C 13.632812 -0.148438 11.890625 0.296875 9.921875 0.296875 C 7.984375 0.296875 6.414062 -0.238281 5.21875 -1.3125 C 4.019531 -2.394531 3.421875 -3.929688 3.421875 -5.921875 L 3.421875 -14.578125 L 0.6875 -14.578125 L 0.6875 -18.6875 L 3.421875 -18.6875 L 3.421875 -24.140625 L 9.671875 -24.140625 L 9.671875 -18.71875 L 14.796875 -18.71875 L 14.796875 -14.578125 L 9.671875 -14.578125 L 9.671875 -6.90625 C 9.671875 -6.15625 9.820312 -5.601562 10.125 -5.25 C 10.425781 -4.90625 10.878906 -4.742188 11.484375 -4.765625 C 12.066406 -4.765625 12.878906 -4.984375 13.921875 -5.421875 Z M 13.921875 -5.421875 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-15">
																		<path style="stroke:none;"
																			  d="M 14.46875 -25.671875 C 16.363281 -25.671875 18.222656 -25.28125 20.046875 -24.5 C 21.878906 -23.726562 23.4375 -22.6875 24.71875 -21.375 L 20.984375 -16.9375 C 20.160156 -17.957031 19.171875 -18.765625 18.015625 -19.359375 C 16.859375 -19.953125 15.710938 -20.25 14.578125 -20.25 C 12.566406 -20.25 10.878906 -19.539062 9.515625 -18.125 C 8.160156 -16.707031 7.484375 -14.957031 7.484375 -12.875 C 7.484375 -10.738281 8.160156 -8.953125 9.515625 -7.515625 C 10.878906 -6.085938 12.566406 -5.375 14.578125 -5.375 C 15.648438 -5.375 16.757812 -5.640625 17.90625 -6.171875 C 19.0625 -6.710938 20.085938 -7.441406 20.984375 -8.359375 L 24.765625 -4.359375 C 23.378906 -2.953125 21.742188 -1.820312 19.859375 -0.96875 C 17.984375 -0.125 16.113281 0.296875 14.25 0.296875 C 10.425781 0.296875 7.238281 -0.953125 4.6875 -3.453125 C 2.144531 -5.953125 0.875 -9.066406 0.875 -12.796875 C 0.875 -16.453125 2.171875 -19.507812 4.765625 -21.96875 C 7.359375 -24.4375 10.59375 -25.671875 14.46875 -25.671875 Z M 14.46875 -25.671875 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-16">
																		<path style="stroke:none;"
																			  d="M 11.59375 -19.8125 C 14.789062 -19.8125 17.367188 -18.894531 19.328125 -17.0625 C 21.296875 -15.238281 22.28125 -12.820312 22.28125 -9.8125 C 22.28125 -6.8125 21.296875 -4.390625 19.328125 -2.546875 C 17.367188 -0.703125 14.789062 0.21875 11.59375 0.21875 C 8.375 0.21875 5.78125 -0.703125 3.8125 -2.546875 C 1.851562 -4.390625 0.875 -6.8125 0.875 -9.8125 C 0.875 -12.820312 1.851562 -15.238281 3.8125 -17.0625 C 5.78125 -18.894531 8.375 -19.8125 11.59375 -19.8125 Z M 11.59375 -14.828125 C 10.289062 -14.828125 9.234375 -14.351562 8.421875 -13.40625 C 7.609375 -12.46875 7.203125 -11.25 7.203125 -9.75 C 7.203125 -8.21875 7.609375 -6.984375 8.421875 -6.046875 C 9.234375 -5.117188 10.289062 -4.65625 11.59375 -4.65625 C 12.882812 -4.65625 13.9375 -5.117188 14.75 -6.046875 C 15.5625 -6.984375 15.96875 -8.21875 15.96875 -9.75 C 15.96875 -11.25 15.5625 -12.46875 14.75 -13.40625 C 13.9375 -14.351562 12.882812 -14.828125 11.59375 -14.828125 Z M 11.59375 -14.828125 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-17">
																		<path style="stroke:none;"
																			  d="M 21.59375 -19.59375 L 21.59375 0 L 15.3125 0 L 15.3125 -3.234375 C 13.976562 -0.910156 11.851562 0.25 8.9375 0.25 C 6.8125 0.25 5.109375 -0.425781 3.828125 -1.78125 C 2.554688 -3.132812 1.921875 -4.953125 1.921875 -7.234375 L 1.921875 -19.59375 L 8.21875 -19.59375 L 8.21875 -9.015625 C 8.21875 -7.847656 8.515625 -6.929688 9.109375 -6.265625 C 9.703125 -5.597656 10.492188 -5.265625 11.484375 -5.265625 C 12.671875 -5.296875 13.601562 -5.738281 14.28125 -6.59375 C 14.96875 -7.457031 15.3125 -8.566406 15.3125 -9.921875 L 15.3125 -19.59375 Z M 21.59375 -19.59375 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph0-18">
																		<path style="stroke:none;"
																			  d="M 8.796875 -19.59375 L 8.796875 -16.28125 C 10.179688 -18.632812 12.300781 -19.835938 15.15625 -19.890625 L 15.15625 -14.21875 C 13.363281 -14.382812 11.894531 -14.085938 10.75 -13.328125 C 9.613281 -12.566406 8.960938 -11.484375 8.796875 -10.078125 L 8.796875 0 L 2.515625 0 L 2.515625 -19.59375 Z M 8.796875 -19.59375 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph1-0">
																		<path style="stroke:none;"
																			  d="M 0 0 L 0 -92.453125 L 66.046875 -92.453125 L 66.046875 0 Z M 33.015625 -52.171875 L 55.46875 -85.84375 L 10.5625 -85.84375 Z M 36.984375 -46.234375 L 59.4375 -12.546875 L 59.4375 -79.90625 Z M 10.5625 -6.609375 L 55.46875 -6.609375 L 33.015625 -40.28125 Z M 6.609375 -79.90625 L 6.609375 -12.546875 L 29.0625 -46.234375 Z M 6.609375 -79.90625 "/>
																	</symbol>
																	<symbol overflow="visible" id="glyph1-1">
																		<path style="stroke:none;"
																			  d="M 41.46875 0 L 17.96875 0 L 17.96875 -73.703125 L 0.921875 -73.703125 L 0.921875 -92.59375 L 41.46875 -92.59375 Z M 41.46875 0 "/>
																	</symbol>
																</g>
																<filter id="alpha" filterUnits="objectBoundingBox" x="0%" y="0%" width="100%" height="100%">
																	<feColorMatrix type="matrix" in="SourceGraphic" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"/>
																</filter>
																<mask id="mask0">
																	<g filter="url(#alpha)">
																		<rect x="0" y="0" width="540" height="112.499997"
																			  style="fill:rgb(0%,0%,0%);fill-opacity:0.8588;stroke:none;"/>
																	</g>
																</mask>
																<clipPath id="clip2">
																	<path d="M 37.09375 0.601562 L 57.179688 0.601562 L 57.179688 94.988281 L 37.09375 94.988281 Z M 37.09375 0.601562 "/>
																</clipPath>
																<clipPath id="clip1">
																	<rect x="0" y="0" width="95" height="96"/>
																</clipPath>
																<g id="surface5" clip-path="url(#clip1)">
																	<g clip-path="url(#clip2)" clip-rule="nonzero">
																		<path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,8.628845%,8.628845%);fill-opacity:1;"
																			  d="M 94.488281 94.988281 L 0.101562 94.988281 L 0.101562 0.601562 L 94.488281 0.601562 Z M 94.488281 94.988281 "/>
																	</g>
																</g>
																<clipPath id="clip3">
																	<path d="M 12.441406 25.015625 L 106.828125 25.015625 L 106.828125 45.097656 L 12.441406 45.097656 Z M 12.441406 25.015625 "/>
																</clipPath>
																<clipPath id="clip4">
																	<path d="M 1.195312 7 L 88 7 L 88 103 L 1.195312 103 Z M 1.195312 7 "/>
																</clipPath>
																<mask id="mask1">
																	<g filter="url(#alpha)">
																		<rect x="0" y="0" width="540" height="112.499997"
																			  style="fill:rgb(0%,0%,0%);fill-opacity:0.7569;stroke:none;"/>
																	</g>
																</mask>
																<clipPath id="clip6">
																	<path d="M 28.613281 0.601562 L 48.695312 0.601562 L 48.695312 94.988281 L 28.613281 94.988281 Z M 28.613281 0.601562 "/>
																</clipPath>
																<clipPath id="clip5">
																	<rect x="0" y="0" width="87" height="96"/>
																</clipPath>
																<g id="surface8" clip-path="url(#clip5)">
																	<g clip-path="url(#clip6)" clip-rule="nonzero">
																		<path style=" stroke:none;fill-rule:nonzero;fill:rgb(100%,8.628845%,8.628845%);fill-opacity:1;"
																			  d="M 86.003906 94.988281 L -8.382812 94.988281 L -8.382812 0.601562 L 86.003906 0.601562 Z M 86.003906 94.988281 "/>
																	</g>
																</g>
																<clipPath id="clip7">
																	<path d="M 12 26 L 108 26 L 108 112.003906 L 12 112.003906 Z M 12 26 "/>
																</clipPath>
																<mask id="mask2">
																	<g filter="url(#alpha)">
																		<rect x="0" y="0" width="540" height="112.499997"
																			  style="fill:rgb(0%,0%,0%);fill-opacity:0.7373;stroke:none;"/>
																	</g>
																</mask>
																<clipPath id="clip9">
																	<path d="M 0.441406 37.496094 L 94.828125 37.496094 L 94.828125 57.578125 L 0.441406 57.578125 Z M 0.441406 37.496094 "/>
																</clipPath>
																<clipPath id="clip8">
																	<rect x="0" y="0" width="96" height="87"/>
																</clipPath>
																<g id="surface11" clip-path="url(#clip8)">
																	<g clip-path="url(#clip9)" clip-rule="nonzero">
																		<path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;"
																			  d="M 94.828125 0.1875 L 94.828125 94.574219 L 0.441406 94.574219 L 0.441406 0.1875 Z M 94.828125 0.1875 "/>
																	</g>
																</g>
															</defs>
															<g id="surface1">
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-1" x="176.786416" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-2" x="204.776773" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-3" x="229.71364" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-4" x="250.470129" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-5" x="272.280806" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-6" x="296.745107" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-7" x="317.174428" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-2" x="339.057804" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-8" x="363.993593" y="47.817178"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-9" x="176.786416" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-4" x="201.505171" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-10" x="223.315848" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-7" x="246.835016" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-8" x="268.718392" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-11" x="277.151845" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-12" x="303.651806" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-13" x="314.957012" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-12" x="333.605141" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-14" x="344.910346" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-8" x="360.723081" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-15" x="369.156535" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-16" x="394.311513" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-17" x="417.467172" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-5" x="441.567963" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-14" x="466.032264" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-7" x="481.844999" y="86.348823"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph0-18" x="503.72839" y="86.348823"/>
																</g>
																<use xlink:href="#surface5" transform="matrix(1,0,0,1,31,7)" mask="url(#mask0)"/>
																<g clip-path="url(#clip3)" clip-rule="nonzero">
																	<path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;"
																		  d="M 106.828125 -12.292969 L 106.828125 82.089844 L 12.441406 82.089844 L 12.441406 -12.292969 Z M 106.828125 -12.292969 "/>
																</g>
																<g clip-path="url(#clip4)" clip-rule="nonzero">
																	<use xlink:href="#surface8" transform="matrix(1,0,0,1,1,7)" mask="url(#mask1)"/>
																</g>
																<g clip-path="url(#clip7)" clip-rule="nonzero">
																	<use xlink:href="#surface11" transform="matrix(1,0,0,1,12,26)" mask="url(#mask2)"/>
																</g>
																<g style="fill:rgb(0%,29.019165%,67.83905%);fill-opacity:1;">
																	<use xlink:href="#glyph1-1" x="117.124475" y="100.437046"/>
																</g>
															</g>
														</svg>
													</a>
												</div>
												<!-- /Logo -->
												<h4 class="mb-4 mt-4 text-center"><?php echo esc_html_e( 'Welcome to Advanced Page Visit Counter! 9+ 👋', 'apvc' ); ?></h4>
												<h5 class="card-action-title mb-2 text-center"><?php echo esc_html_e( 'The outdated version(<9+) of the Advanced Page Visit Counter has been detected on your website.', 'apvc' ); ?></h5>

                                                <h3 class="card-action-title mt-4 text-center" style="color:red;"><?php echo esc_html_e( 'Read this before you start.', 'apvc' ); ?></h3>

                                                <?php
                                                    global $wpdb;
                                                    $history_table = $wpdb->prefix . 'avc_page_visit_history';
                                                    $table_exists = 'd-none';
                                                    if($wpdb->get_var("SHOW TABLES LIKE '$history_table'") == $history_table) {
	                                                    $table_exists = '';
                                                    }
													?>
                                                <p class="card-action-title mb-4 text-left" style="color:#516377; font-size: 14px;">

                                                	<strong>Dear Valued Users,</strong><br /><br />

													We are reaching out with some important updates regarding our plugin. As we continually strive to improve and evolve, <br />we have made the decision to retire our legacy version (versions below 8+).
													<br />This decision, albeit a tough one, is driven by our commitment to deliver the best to our users. However, it comes with a few implications and for that, <br />we extend our sincere apologies for any inconvenience this may cause.<br /><br />

													<strong>Key Reasons for Retiring the Legacy Version:</strong><br /><br />
													1. <strong>Security Vulnerabilities:</strong> The current version may have security vulnerabilities that are difficult to patch. Newer versions offer enhanced security measures that are more aligned with the latest cybersecurity threats.<br /><br />

													2. <strong>Compatibility Issues:</strong> As WordPress continues to evolve, older plugins may not be compatible with the latest version of WordPress, leading to potential site instability or functionality problems.<br /><br />

													3. <strong>Performance Limitations:</strong> The existing version might have performance limitations that cannot be adequately addressed without a complete overhaul. New versions are often optimized for better efficiency and speed.<br /><br />

													4. <strong>Lack of Support:</strong> Ongoing support and updates for the current version may no longer be feasible, making it difficult to address future bugs or user issues effectively.<br /><br />

													5. <strong>Modern Features Absence:</strong> The plugin may lack modern features that are now standard in similar tools, diminishing its utility and user experience compared to newer alternatives.<br /><br />

													6. <strong>User Feedback and Demand:</strong> Based on user feedback and market demand, it may be necessary to retire the current version to focus on a more robust and feature-rich update that better meets the needs of the user base. <br /><br />

													7. <strong>Regulatory Compliance:</strong> New regulations or compliance requirements may render the current version obsolete, necessitating an update to ensure legal compliance, particularly in areas like data privacy.<br /><br />

													8. <strong>Resource Intensiveness:</strong> The current version might be too resource-intensive, leading to slow loading times or increased server load, which can be mitigated with a more streamlined and efficient version.<br /><br />
													<hr>
													<strong>Benefits of the New Version:</strong><br /><br />
													1. <strong>Advanced Features:</strong> The latest version introduces new functionalities that are more aligned with current user needs.<br /><br />
													2. <strong>Updated Security with Latest PHP Support:</strong> Your security is paramount. The new version is compatible with the latest PHP versions, offering improved protection.<br /><br />
													3. <strong>Detailed Statistics:</strong> Access more comprehensive statistical data for better insights.<br /><br />
													4. <strong>Revamped User Interface:</strong> Enjoy an improved, user-friendly interface.<br /><br />
													5. <strong>Enhanced Performance:</strong> Experience faster and more secure analytics.<br /><br />

													While we are enthusiastic about our new version, we understand that this change might not suit everyone's needs. For those who wish to continue using the legacy version, it is available for direct download from the link below. Please note, however, that we will no longer be providing updates for this version.
													<br /><br />
													<strong style="color:red">*We highly recommend using the latest updated version of the plugin instead of legacy version to ensure it is up-to-date and more secure, featuring compatibility with the newest WordPress functionalities and PHP support.</strong>
													<table class="mt-3 mb-3">
														<tbody>
															<tr>
																<td>
																	<a href="https://pagevisitcounter.com/download-legacy-plugin-versions/" target="_blank" class="btn rounded-pill btn-dark <?php echo $table_exists;?>" id=""><?php echo esc_html_e( 'Download Legacy Version', 'apvc' ); ?></a>
																</td>
																<td>
																	<a style="background-color: green; color: #ffffff; margin-left: 10px;" href="https://pagevisitcounter.com/download-legacy-plugin-versions/" target="_blank" class="btn rounded-pill <?php echo $table_exists;?>" id=""><?php echo esc_html_e( 'Step-by-Step Tutorial for Legacy Plugin Installation', 'apvc' ); ?></a>
																</td>
															</tr>
														</tbody>
													</table>
													

													

													If you are ready to make the switch to the new version, simply click on the button below. We are here to support you through this transition and appreciate your understanding and continued trust in our plugin.<br /><br />

													<button type="button" class="btn rounded-pill btn-primary" id="apvc_go_with_fresh"><?php echo esc_html_e( 'Start fresh installation.', 'apvc' ); ?></button><br /><br />

													Thank you for your understanding and support.<br /><br />

													<h3 style="color:red;">Once the plugin is activated, please refresh the permalinks.</h3><br />
													Warm regards,<br /> 
													Advanced Page Visit Counter
                                                </p>
												<div class="text-center mb-4">
                                                    
													
													
												</div>
												<div class="migration_process">
													<div class="progress mb-3">
														<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 1%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
													<div>
														<label for="apvc_mig_process_log" class="form-label"><?php echo esc_html_e( 'Migration Log', 'apvc' ); ?></label>
														<textarea class="form-control" id="apvc_mig_process_log" rows="20"></textarea>
													</div>
												</div>
											</div>
										</div>
										<!-- /Register -->
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		} else {
            $admin_html::get_header();
            ?>
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				<div class="layout-page" id="apvc_main_block">
					<div class="content-wrapper">
						<div class="container-fluid flex-grow-1 container-p-y apvc-dashbard-block p-1">
							<div class="row">
								<?php
								if ( ! file_exists( APVC_GEO_DB_FILE ) ) {
                                    echo '<div class="alert alert-solid-danger alert-dismissible d-flex align-items-center" role="alert">
                                        <i class="bx bx-xs bx-world me-2"></i>
                                        ' . __( "Please wait a few minutes for the geographic database to download. If this message persists after 10 minutes, go to the settings page and click on &nbsp;&nbsp; <strong style='text-decoration: underline'>Geographic Database File</strong>&nbsp; section to update.", 'apvc' ) . '
                                      </div>';

									if ( isset( $_GET['section'] ) && 'apvc-settings' !== $_GET['section'] ) {
										return;
									}
								}
								if ( 'inprogress' === get_option( 'apvc_migration_process_bulk', 'completed' ) ) {
									?>
										<div class="alert alert-danger" role="alert"><?php echo esc_html_e( 'We are currently in the process of migration. Kindly wait as this may take approximately 4-5 minutes to complete, it depends on the data. Thank you for your patience.', 'apvc' ); ?></div>
									<?php
								}
								if ( $helpers::is_var_set( $_GET['page'] ) && isset( $_GET['section'] ) && $helpers::is_var_set( $_GET['section'] ) ) {
									if ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-reports' ) ) {
										$admin_html::get_reports_page();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-settings' ) ) {
										$admin_html::get_admin_settings();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-referrers' ) ) {
										$admin_html::get_referrers_page();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-trending' ) ) {
										$admin_html::get_trending_page();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-shortcodes' ) ) {
										$admin_html::get_shortcodes_list();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-shortcode-generator' ) ) {
										$admin_html::get_shortcodes_generator();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-real-time-stats' ) ) {
										$admin_html::get_realtime_stats();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-smart-campaigns' ) ) {
										$admin_html::get_smart_campaigns();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-campaign-creator' ) ) {
										$admin_html::get_smart_campaigns_creator();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-wc-stats' ) ) {
										$admin_html::get_wc_stats();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-export-data' ) ) {
										$admin_html::get_export_data();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-export-wizard' ) ) {
										$admin_html::get_export_wizard();
									} elseif ( true === $helpers::is_dashboard_section_set( $_GET['page'], $_GET['section'], 'apvc-promotion' ) ) {
										$admin_html::get_promotions_blocks();
									}
								} else {
									$admin_html::get_admin_dashboard();
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<?php
		}
	}



}
