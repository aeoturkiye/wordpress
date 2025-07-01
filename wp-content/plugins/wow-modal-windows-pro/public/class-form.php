<?php

namespace ModalWindowPro;

use ModalWindowPro\Admin\DBManager;

defined( 'ABSPATH' ) || exit;

class WOWP_Form {

	public function __construct() {
		// Form
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			add_action( 'wp_ajax_modal_window_form', [ $this, 'send_form' ] );
			add_action( 'wp_ajax_nopriv_modal_window_form', [ $this, 'send_form' ] );
		}
	}

	public function send_form(): void {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'modal_nonce' ) ) {
			wp_die( 'Security check not passed' );
		}

		$form_id = sanitize_text_field( $_POST['form_id'] );
		$id      = absint( explode( '-', $form_id )[2] );

		$result = DBManager::get_data_by_id( $id );
		$param  = maybe_unserialize( $result->param );

		$name = ! empty( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$mail = ! empty( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
		$text = ! empty( $_POST['textarea'] ) ? sanitize_textarea_field( $_POST['textarea'] ) : '';

		$data = [
			'name'  => $name,
			'email' => $mail,
			'text'  => $text,
		];


		if ( ! empty( $param['send_to_admin'] ) ) {
			$this->send_mail_admin( $param, $data );
		}

		if ( ! empty( $param['send_to_user'] ) ) {
			$this->send_mail_user( $param, $data );
		}

		if ( ! empty( $param['emsi'] ) ) {
			$userdata = array(
				'EMAIL' => $mail,
				'NAME'  => $name,
				'LNAME' => '',
			);
			do_action( 'ems_integration', $userdata );
		}

		$response = esc_html( $param['mail_send_text'] );

		wp_send_json( $response );
		wp_die();
	}

	private function send_mail_admin( $param, $data ): void {

		$myemail  = ! empty( $param['mail_send_admin_mail'] ) ? $param['mail_send_admin_mail'] : get_option( 'admin_email' );
		$mailtext = ! empty( $param['mail_send_mail_subject'] ) ? $param['mail_send_mail_subject'] : 'Letter from the site';

		$message = isset( $param['admincontent'] ) ? wp_kses_post( $param['admincontent'] ) : '';
		$message = str_replace( '{email}', $data['email'], $message );
		$message = str_replace( '{name}', $data['name'], $message );
		$message = str_replace( '{text}', $data['text'], $message );

		$headers = null;
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		if ( ! empty( $data['email'] ) && ! empty( $data['name'] ) ) {
			$headers .= "From: " . $data['name'] . " <" . $data['email'] . ">\r\n";
		}
		$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
		wp_mail( $myemail, $mailtext, $message, $headers );
	}

	private function send_mail_user($param, $data): void {

		$frommail     = ! empty( $param['mail_send_from_mail'] ) ? $param['mail_send_from_mail'] : get_option( 'admin_email' );
		$mailusertext = ! empty( $param['mail_send_user_subject'] ) ? $param['mail_send_user_subject'] : 'Letter from the site';
		$fromusertext = ! empty( $param['mail_send_from_text'] ) ? $param['mail_send_from_text'] : get_option( 'blogname' );

		$message = $param['usercontent'];
		$message = str_replace( '{email}', $data['email'], $message );
		$message = str_replace( '{name}', $data['name'], $message );
		$message = str_replace( '{text}', $data['text'], $message );

		$headers = null;
		$headers .= "content-type: text/html; charset=utf-8\r\n";
		if ( ! empty( $data['email'] ) && ! empty( $data['name'] ) ) {
			$headers .= "From: " . $fromusertext . " <" . $frommail . ">\r\n";
		}

		$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
		wp_mail( $data['email'], $mailusertext, $message, $headers );
	}

}

new WOWP_Form;