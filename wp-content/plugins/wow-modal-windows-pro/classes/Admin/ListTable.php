<?php

namespace ModalWindowPro\Admin;

defined( 'ABSPATH' ) || exit;

use WP_List_Table;
use ModalWindowPro\WOWP_Plugin;

class ListTable extends WP_List_Table {

	public int $per_page = 30;

	public function __construct() {
		// Set parent defaults
		parent::__construct( array(
			'ajax' => false,
		) );
		$this->process_bulk_action();
	}

	public function column_default( $item, $column_name ) {
		return $item[ $column_name ];
	}

	public function search_box( $text, $input_id ) {
		$input_id .= '-search-input';
		if ( ! empty( $_REQUEST['orderby'] ) ) {
			echo '<input type="hidden" name="orderby" value="' . esc_attr( sanitize_text_field( $_REQUEST['orderby'] ) ) . '" />';
		}
		if ( ! empty( $_REQUEST['order'] ) ) {
			echo '<input type="hidden" name="order" value="' . esc_attr( sanitize_text_field( $_REQUEST['order'] ) ) . '" />';
		}
		?>
        <p class="search-box">
            <label class="screen-reader-text" for="<?php
			echo esc_attr( $input_id ) ?>"><?php
				echo esc_html( $text ); ?>
                :</label>
            <input type="search" id="<?php
			echo esc_attr( $input_id ) ?>" name="s" value="<?php
			_admin_search_query(); ?>"/>
			<?php
			submit_button( $text, 'button', false, false, array( 'ID' => 'search-submit' ) ); ?>
        </p>
		<?php
	}

	public function column_title( $item ): string {
		$title   = ! empty( $item['title'] ) ? $item['title'] : __( 'Untitled', 'wow-modal-windows-pro' );
		$param   = DBManager::get_param_id( $item['ID'] );
		$actions = [
			'id'        => '#' . $item['ID'],
			'edit'      => '<a href="' . esc_url( Link::edit( $item['ID'] ) ) . '">' . esc_html__( 'Edit',
					'wow-modal-windows-pro' ) . '</a>',
			'duplicate' => '<a href="' . esc_url( Link::duplicate( $item['ID'] ) ) . '">' . esc_html__( 'Duplicate',
					'wow-modal-windows-pro' ) . '</a>',
			'delete'    => '<a href="' . esc_url( Link::remove( $item['ID'] ) ) . '" >' . esc_html__( 'Delete',
					'wow-modal-windows-pro' ) . '</a>',
			'export'    => '<a href="' . esc_url( Link::export( $item['ID'] ) ) . '" >' . esc_html__( 'Export',
					'wow-modal-windows-pro' ) . '</a>',
		];
		if ( ! empty( $param['link'] ) ) {
			$actions['view'] = '<a href="' . esc_url( $param['link'] ) . '" target="_blank">' . esc_html__( 'View',
					'wow-modal-windows-pro' ) . '</a>';
		}


		return $title . $this->row_actions( $actions );
	}

	public function prepare_items(): void {
		$columns     = $this->get_columns();
		$hidden      = $this->get_hidden_columns();
		$sortable    = $this->get_sortable_columns();
		$data        = $this->table_data();
		$perPage     = 30;
		$currentPage = $this->get_pagenum();
		if ( $data ) {
			usort( $data, [ &$this, 'sort_data' ] );
			$data = array_slice( $data, ( ( $currentPage - 1 ) * $perPage ), $perPage );
		}
		$totalItems            = $this->list_count();
		$this->_column_headers = [ $columns, $hidden, $sortable ];
		$this->items           = $data;
		$this->set_pagination_args( [
			'total_items' => $totalItems,
			'per_page'    => $perPage,
			'total_pages' => ceil( $totalItems / $perPage ),
		] );
	}

	public function get_columns(): array {
		return [
			'cb'     => '<input type="checkbox" />',
			'title'  => __( 'Title', 'wow-modal-windows-pro' ),
			'code'  => __( 'Shortcode', 'wow-modal-windows-pro' ),
			'tag'    => __( 'Tag', 'wow-modal-windows-pro' ),
			'mode'   => __( 'Test mode',
					'wow-modal-windows-pro' ) . '<sup class="has-tooltip" data-tooltip="' . __( 'The item will only be displayed for administrators.',
					'wow-modal-windows-pro' ) . '">ℹ</sup>',
			'status' => __( 'Status',
					'wow-modal-windows-pro' ) . '<sup class="has-tooltip" data-tooltip="' . __( 'Display item on the Frontend.',
					'wow-modal-windows-pro' ) . '">ℹ</sup>',
		];
	}

	public function get_hidden_columns(): array {
		return [];
	}

	public function get_sortable_columns(): array {
		return [
			'ID' => [ 'ID', false ],
		];
	}

	private function table_data(): array {
		$data   = [];
		$paged  = $this->get_paged();
		$offset = $this->per_page * ( $paged - 1 );

		$result = $this->get_results();

		$slug      = WOWP_Plugin::SLUG;
		$shortcode = WOWP_Plugin::SHORTCODE;

		if ( empty( $result ) ) {
			return $data;
		}

		$main_link = add_query_arg( [
			'page'   => $slug,
			'tab'    => 'settings',
			'action' => 'update'
		], admin_url( 'admin.php' ) );
		foreach ( $result as $key => $value ) {
			$title       = ! empty( $value->title ) ? $value->title : __( 'UnTitle', 'wow-modal-windows-pro' );
			$tooltip_off = esc_attr__( 'Click for Deactivate.', 'wow-modal-windows-pro' );
			$tooltip_on  = esc_attr__( 'Click for Activate.', 'wow-modal-windows-pro' );
			$status_off  = '<a href="' . esc_url( Link::activate_url( $value->id ) ) . '" class="wpie-toogle is-off" data-tooltip="' . esc_attr( $tooltip_on ) . '"><span>' . esc_attr__( 'OFF',
					'wow-modal-windows-pro' ) . '</span></a>';
			$status_on   = '<a href="' . esc_url( Link::deactivate_url( $value->id ) ) . '" class="wpie-toogle is-on" data-tooltip="' . esc_attr( $tooltip_off ) . '"><span>' . esc_attr__( 'ON',
					'wow-modal-windows-pro' ) . '</span></a>';
			$status      = ! empty( $value->status ) ? $status_off : $status_on;

			$mode_tooltip_off = esc_attr__( 'Click for OFF.', 'wow-modal-windows-pro' );
			$mode_tooltip_on  = esc_attr__( 'Click for ON.', 'wow-modal-windows-pro' );

			$mode_off = '<a href="' . esc_url( Link::activate_mode( $value->id ) ) . '" class="wpie-toogle is-off" data-tooltip="' . esc_attr( $mode_tooltip_on ) . '"><span>' . esc_attr__( 'OFF',
					'wow-modal-windows-pro' ) . '</span></a>';
			$mode_on  = '<a href="' . esc_url( Link::deactivate_mode( $value->id ) ) . '" class="wpie-toogle is-on" data-tooltip="' . esc_attr( $mode_tooltip_off ) . '"><span>' . esc_attr__( 'ON',
					'wow-modal-windows-pro' ) . '</span></a>';

			$mode = empty( $value->mode ) ? $mode_off : $mode_on;

			$tag = '';
			if ( isset( $value->tag ) ) {
				$tag_url = add_query_arg( [
					'page' => WOWP_Plugin::SLUG,
					'tag'  => $value->tag
				], admin_url( 'admin.php' ) );
				$tag     = '<a href="' . esc_url( $tag_url ) . '">' . esc_attr( $value->tag ) . '</a>';
			}

			$link   = add_query_arg( [ 'id' => $value->id ], $main_link );

			$data[] = array(
				'ID'     => $value->id,
				'title'  => '<a href="' . esc_url( $link ) . '">' . esc_html( $title ) . '</a>',
				'code'   => '<div class="wpie-field">
                    <label class="wpie-field__label has-icon">
                        <span class="has-tooltip is-pointer on-right can-copy" data-tooltip="Copy"><span class="dashicons dashicons-shortcode is-pointer" ></span></span>
                        <input type="text" value="[' . esc_attr( $shortcode ) . ' id=\'' . absint( $value->id ) . '\']" readonly>
                    </label>
                </div>',
				'tag'    => $tag,
				'mode'   => $mode,
				'status' => $status,
			);
		}

		return $data;
	}

	public function column_cb( $item ) {
		return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', 'ID', $item['ID'] );
	}

	public function get_paged(): int {
		return isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
	}

	public function get_search() {
		$verify = AdminActions::verify(WOWP_Plugin::PREFIX . '_list_action');

		if ( ! $verify ) {
			return false;
		}

		return ! empty( $_POST['s'] ) ? urldecode( trim( sanitize_text_field( $_POST['s'] ) ) ) : false;
	}

	public function list_count(): int {
		$result = $this->get_results();

		if ( empty( $result ) ) {
			return 0;
		}
		$count = count( $result );


		return (int) $count;
	}

	public function get_results() {
		global $wpdb;

		$search = $this->get_search();

		$tag_search = ( ! empty( $_REQUEST['tag'] ) ) ? sanitize_text_field( $_REQUEST  ['tag'] ) : '';
		$tag_search = ( $tag_search === 'all' ) ? '' : $tag_search;


		$result = '';

		$table = $wpdb->prefix . WOWP_Plugin::PREFIX;

		if ( empty( $search ) ) {
			$result = $wpdb->get_results( "SELECT * FROM {$table} ORDER BY id DESC" );
			if ( ! empty( $tag_search ) ) {
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table} WHERE tag=%s ORDER BY id DESC",
					$tag_search ) );
			}
		} elseif ( trim( $search ) === 'UnTitle' ) {
			$result = $wpdb->get_results( "SELECT * FROM {$table} WHERE title='' ORDER BY id DESC" );
			if ( ! empty( $tag_search ) ) {
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table} WHERE title='' AND tag=%s ORDER BY id DESC",
					$tag_search ) );
			}
		} elseif ( is_numeric( $search ) ) {
			if ( ! empty( $tag_search ) ) {
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table} WHERE id=%d AND tag=%s ORDER BY id DESC",
					absint( $search ), $tag_search ) );
			} else {
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table} WHERE id=%d ORDER BY id DESC",
					absint( $search ) ) );
			}
		} else {
			$wild = '%';
			$find = sanitize_text_field( $search );
			$like = $wild . $wpdb->esc_like( $find ) . $wild;
			if ( ! empty( $tag_search ) ) {
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table} WHERE title LIKE %s AND tag=%s ORDER BY id DESC",
					$like, $tag_search ) );
			} else {
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$table} WHERE title LIKE %s ORDER BY id DESC",
					$like ) );
			}
		}

		return $result;
	}


	public function get_bulk_actions(): array {
		$actions = [
			'delete'     => __( 'Delate', 'wow-modal-windows-pro' ),
			'activate'   => __( 'Activate', 'wow-modal-windows-pro' ),
			'deactivate' => __( 'Deactivate', 'wow-modal-windows-pro' ),
			'test_on'    => __( 'Test mode ON', 'wow-modal-windows-pro' ),
			'test_off'   => __( 'Test mode OFF', 'wow-modal-windows-pro' ),
		];

		return $actions;
	}

	public function process_bulk_action(): bool {

		$verify = AdminActions::verify(WOWP_Plugin::PREFIX . '_list_action');

		if ( ! $verify ) {
			return false;
		}

		$ids    = isset( $_POST['ID'] ) ? ( map_deep( $_POST['ID'], 'absint' ) ) : false;
		$action = $this->current_action();
		if ( ! is_array( $ids ) ) {
			$ids = [ $ids ];
		}
		if ( empty( $action ) ) {
			return false;
		}

		foreach ( $ids as $id ) {
			if ( 'delete' === $this->current_action() ) {
				DBManager::delete( $id );
			}
			if ( 'activate' === $this->current_action() ) {
				DBManager::update( [ 'status' => '' ], [ 'ID' => $id ], [ '%d' ] );
			}
			if ( 'deactivate' === $this->current_action() ) {
				DBManager::update( [ 'status' => '1' ], [ 'ID' => $id ], [ '%d' ] );
			}
			if ( 'test_on' === $this->current_action() ) {
				DBManager::update( [ 'mode' => '1' ], [ 'ID' => $id ], [ '%d' ] );
			}
			if ( 'test_off' === $this->current_action() ) {
				DBManager::update( [ 'mode' => '' ], [ 'ID' => $id ], [ '%d' ] );
			}
		}

		return true;
	}

	protected function extra_tablenav( $which ) {
		if ( 'top' === $which ) {
			$tags = DBManager::get_tags_from_table();

			$tag_search = ( ! empty( $_REQUEST['tag'] ) ) ? sanitize_text_field( $_REQUEST  ['tag'] ) : '';
			$tag_search = ( $tag_search === 'all' ) ? '' : $tag_search;

			echo '<div class="alignleft actions"><label for="filter-by-tag" class="screen-reader-text">' . esc_html__( 'Filter by tag',
					'wow-modal-windows-pro' ) . '</label>';
			echo '<select name="tag" id="filter-by-tag">';
			echo '<option value="all"' . selected( 'all', $tag_search, false ) . '>' . esc_html__( 'All',
					'wow-modal-windows-pro' ) . '</option>';

			if ( ! empty( $tags ) ) {
				foreach ( $tags as $tag ) {
					if ( empty( $tag['tag'] ) ) {
						continue;
					}
					echo '<option value="' . esc_attr( trim( $tag['tag'] ) ) . '"' . selected( $tag['tag'], $tag_search,
							false ) . '>' . esc_html( $tag['tag'] ) . '</option>';
				}
			}
			echo '</select>';
			submit_button( __( 'Filter', 'wow-modal-windows-pro' ), 'secondary', 'action', false );
			echo '</div>';
		}
	}

	private function sort_data( $a, $b ): int {
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? sanitize_text_field( $_GET['orderby'] ) : 'ID';
		// If no order, default to asc
		$order = ( ! empty( $_GET['order'] ) ) ? sanitize_text_field( $_GET['order'] ) : 'desc';
		// Determine sort order
		$result = strnatcmp( $a[ $orderby ], $b[ $orderby ] );

		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : - $result;
	}
}