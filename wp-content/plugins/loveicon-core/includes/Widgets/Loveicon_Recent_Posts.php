<?php
namespace Loveicon\Helper\Widgets;

/*
==============================
custom Recent Tour Type Widget
==============================
*/

class Loveicon_Recent_Posts extends \WP_Widget
{



	/**
	 * Register widget with WordPress.
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname'                   => 'sidebar-post sidebar-widget post-widget',
			'description'                 => __('A loveicon Posts Widget'),
			'customize_selective_refresh' => true,
		);
		parent::__construct('recent_posts_sidebar', __('Loveicon Recent Posts'), $widget_ops);
	}

	public function widget($args, $instance)
	{
		$cache = array();
		if (!$this->is_preview()) {
			$cache = wp_cache_get('loveicon_recent_blog_posts', 'widget');
		}

		if (!is_array($cache)) {
			$cache = array();
		}

		if (!isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}

		if (isset($cache[$args['widget_id']])) {
			printf($cache[$args['widget_id']]);
			return;
		}

		ob_start();

		$title = (!empty($instance['title'])) ? $instance['title'] : __('Recent Posts');

		/**
		 * This filter is documented in wp-includes/default-widgets.php
		 */
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		$number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
		if (!$number) {
			$number = 5;
		}
		$show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

		$select = isset($instance['select']) ? $instance['select'] : '';

		$r = new \WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page' => $number,
					'no_found_rows'  => true,
					'post_status'    => 'publish',
					'post_type'      => array(
						'Post',
						'ignore_sticky_posts' => true,
					),
				)
			)
		);
		if ($r->have_posts()) :
?>
			<?php printf($args['before_widget']); ?>
			<?php
			if ($title) {
				printf($args['before_title'] . $title . $args['after_title']);
			}
			?>

				<ul class="recent-campaigns recent-news">
				<!-- Recent Post -->
				<?php
				while ($r->have_posts()) :
					$r->the_post();
				?>
					<li>
						<div class="inner">   
							<div class="img-box">
							<?php the_post_thumbnail('loveicon-recent-post-size'); ?>
								<div class="overlay-content">
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
								</div>    
							</div>
							<div class="title-box">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><</a></h4>
								<p><?php loveicon_posted_on();?></p>
							</div>
						</div>
					</li>
					
				<?php endwhile; ?>
				<!-- Recent Post -->
				</ul>
			<?php printf($args['after_widget']); ?>
		<?php
			wp_reset_postdata();
		endif;

		if (!$this->is_preview()) {
			$cache[$args['widget_id']] = ob_get_flush();
			wp_cache_set('loveicon_recent_blog_posts', $cache, 'widget');
		} else {
			ob_end_flush();
		}
	}

	public function update($new_instance, $old_instance)
	{
		$instance              = $old_instance;
		$instance['title']     = strip_tags($new_instance['title']);
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get('alloptions', 'options');
		if (isset($alloptions['wpsites_recent_tours'])) {
			delete_option('wpsites_recent_tours');
		}

		return $instance;
	}

	public function flush_widget_cache()
	{
		wp_cache_delete('loveicon_recent_blog_posts', 'widget');
	}

	public function form($instance)
	{
		$title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number    = isset($instance['number']) ? absint($instance['number']) : 5;
		$show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php printf($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php printf($this->get_field_id('title')); ?>" name="<?php printf($this->get_field_name('title')); ?>" type="text" value="<?php printf($title); ?>" />
		</p>

		<p><label for="<?php printf($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:'); ?></label>
			<input id="<?php printf($this->get_field_id('number')); ?>" name="<?php printf($this->get_field_name('number')); ?>" type="text" value="<?php printf($number); ?>" size="3" />
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php printf($this->get_field_id('show_date')); ?>" name="<?php printf($this->get_field_name('show_date')); ?>" />
			<label for="<?php printf($this->get_field_id('show_date')); ?>"><?php _e('Display post date?'); ?></label>
		</p>
<?php
	}
}