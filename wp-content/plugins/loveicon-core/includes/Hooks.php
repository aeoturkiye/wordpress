<?php
namespace Loveicon\Helper;
/**
 * The admin class
 */
class Hooks {
	/**
	 * Initialize the class
	 */
	function __construct() {
		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'loveicon_alt_wp_get_attachment_image_attributes' ) );
		add_action( 'loveicon_post_share', array( $this, 'loveicon_post_share' ) );
	}

	/**
	 * Alter Image attributes from wp
	 */
	function loveicon_alt_wp_get_attachment_image_attributes( $attr ) {
		if ( isset( $attr['sizes'] ) ) {
			unset( $attr['sizes'] );
		}
		if ( isset( $attr['srcset'] ) ) {
			unset( $attr['srcset'] );
		}
		return $attr;
	}

	function loveicon_post_share() {
		global $post;
		$post_slug = $post->post_name;
		?>
		<div class="blog-details__share">
			<p><?php esc_html_e( 'We Are Social On:', 'loveicon-core' ); ?></p>
			<div class="blog-details__social">
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a>
				<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo $post_slug; ?>"><i class="fab fa-twitter"></i></a>
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-google-plus-g"></i></a>
			</div><!-- /.blog-details__social -->
		</div>

		<?php
	}
}