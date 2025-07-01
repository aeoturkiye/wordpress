<?php
function loveicon_sidebar_list() {
	 $sidebars_list  = array();
	$get_all_sidebar = $GLOBALS['wp_registered_sidebars'];
	if ( ! empty( $get_all_sidebar ) ) {
		foreach ( $get_all_sidebar as $sidebar ) {
			$sidebars_list[ $sidebar['id'] ] = $sidebar['name'];
		}
	}
	return $sidebars_list;
}
add_action( 'page_advance_content_left', 'page_advance_content_left_fun', 99 );
function page_advance_content_left_fun() {
	$loveicon_core_page_widget_left_right = get_post_meta( get_the_ID(), 'loveicon_core_page_widget_left_right', true );
	if ( $loveicon_core_page_widget_left_right == 'left' ) :

		$loveicon_core_page_widget_left = get_post_meta( get_the_ID(), 'loveicon_core_page_widget_left', true );
		?>
		<?php if ( $loveicon_core_page_widget_left != '' ) { ?>
			<?php if ( is_active_sidebar( $loveicon_core_page_widget_left ) ) { ?>
<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
	<div class="default-sidebar destination-sidebar ml-20">
				<?php dynamic_sidebar( $loveicon_core_page_widget_left ); ?>
	</div>
</div>
	<?php } ?>
		<?php } ?>

		<?php
	endif;
}
add_action( 'page_advance_content_right', 'page_advance_content_right_fun', 99 );
function page_advance_content_right_fun() {
	 $loveicon_core_page_widget_left_right = get_post_meta( get_the_ID(), 'loveicon_core_page_widget_left_right', true );
	if ( $loveicon_core_page_widget_left_right == 'right' ) :

		$loveicon_core_page_widget_left = get_post_meta( get_the_ID(), 'loveicon_core_page_widget_left', true );
		?>
		<?php if ( $loveicon_core_page_widget_left != '' ) { ?>
			<?php if ( is_active_sidebar( $loveicon_core_page_widget_left ) ) { ?>
<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
	<div class="default-sidebar destination-sidebar ml-20">
				<?php dynamic_sidebar( $loveicon_core_page_widget_left ); ?>
	</div>
</div>
	<?php } ?>
		<?php } ?>

		<?php
	endif;
}