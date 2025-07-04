<?php

namespace Microthemer;

// Stop direct call
if (!defined( 'ABSPATH')) {
	exit;
}

/*
 * AssetLoad
 *
 * Minimal functionality to add CSS, JS (user animation), body classes, Google Fonts, and the viewport meta tag.
 * This file is copied to /wp-content/micro-themes upon activation, to support deactivating Microthemer.
 * It can be manually included as a standalone file using require(ABSPATH . '/wp-content/micro-themes/AssetLoad.php');
 * Alternatively, it can be installed as a simple plugin: mt-inactive.zip
 */

if (!class_exists('\Microthemer\AssetLoad')){

	class AssetLoad {

		use FrontAndBackTrait;

		protected $isBlockEditorScreen;
		var $logicSettings = array();
		public $context = 'load';

		public $isFrontend = true;
		public $isAdminArea = false;

		var $contentClass;
		var $cssClass;
		var $preferences = array();
		var $draft = false;
		var $assetLoadingKey = 'asset_loading_published';
		var $globalStylesheetRequiredKey = "global_stylesheet_required_published";
		var $globalJSRequiredKey = "load_js_published";
		var $defaultActionHookOrder = 999999;
		var $asyncAssets = array(
			'css' => array(),
			'js' => array(),
		);
		var $folderLoading = array();
		var $folderLoadingChecked = false;
		var $mtv;
		var $mts;
		var $cacheParam;
		var $rootUrl;
		var $rootDir;
		var $fileStub = 'active';
		var $menuSlugs = array(); // for adding first/last classes to menus
		var $menuItemCount = 0;

		public $hooks = array(
			'head' => 'wp_head',
			'footer' => 'wp_footer',
			'enqueue_scripts' => 'wp_enqueue_scripts'
		);

		function __construct($standalone = false){

			// bail if this class is being called as a standalone script, but Microthemer is active
			if ($standalone && defined('MT_IS_ACTIVE')){
				return;
			}

			// all good, initiate
			$this->init();
		}

		function init(){

			$p = $this->getPreferences();
			$this->checkAdminVsFront();

			if ($this->hasContentCapability()){
				$this->contentClass = new Content\AssetLoadContent($this, TVR_DEV_MODE);
			}

			// Set the app name
			$this->setAppName();

			// setup version and path vars
			$this->mtv = 'mtv=' . (!empty($p['version']) ? $p['version'] : 7);
			$this->mts = 'mts=' . (!empty($p['num_saves']) ? $p['num_saves'] : 0);
			$this->cacheParam = $this->getCacheParam();
			$this->getPaths();

			$this->hookCaptureTemplate($p);

			// if admin, delay hook until current screen can be checked
			$this->deferHookIfAdmin('current_screen', 'hookCSS');

			if ($this->isFrontend){
				$this->hookJS($p);
				$this->hookViewportMeta($p);
				$this->hookClasses($p);
				$this->hookLegacy($p);
			}

		}

		// For admin, we need to use enqueue_block_assets on block editor pages
		// so defer setting CSS hook until the necessary WP functions are available to check that
		function deferHookIfAdmin($hookAction, $hookMethod){
			if ($this->isAdminArea){
				add_action($hookAction, array(&$this, $hookMethod));
			} else {
				$this->$hookMethod();
			}
		}

		// get the directory path for /wp-content/micro-themes/, accounting for multisite
		function getPaths(){

			$microDir = '/micro-themes/';
			$url = content_url();
			$dir = WP_CONTENT_DIR;

			// Not multisite
			if (!is_multisite()) {
				$this->rootUrl = $url . $microDir;
				$this->rootDir = $dir . $microDir;
				return;
			}

			// It is multisite, resolve the path
			$blog_id = get_current_blog_id();
			$primarySite = $blog_id === 1;
			$sitesPath = file_exists( $dir . "/blogs.dir/")
				? '/blogs.dir'
				: '/uploads/sites';
			$subPath = $primarySite
				? $microDir
				: '/' . $blog_id . $microDir;

			$this->rootUrl = $url . $sitesPath . $subPath;
			$this->rootDir = $dir . $sitesPath . $subPath;
		}

		function checkAdminVsFront(){

			if (is_admin()){
				$this->isFrontend = false;
				$this->isAdminArea = true;
				$this->hooks = array(
					'head' => 'admin_enqueue_scripts', // 'admin_head',
					'footer' => 'admin_footer',
					'enqueue_scripts' => 'admin_enqueue_scripts'
				);
			}
		}

		function checkBlockEditorScreen(){

			if ($this->isAdminArea){

				global $pagenow;

				$screen = function_exists('get_current_screen')
					? get_current_screen()
					: null;

				$this->isBlockEditorScreen = !empty($screen->is_block_editor) || $pagenow === 'site-editor.php';

				return $this->isBlockEditorScreen;
			}

			return false;
		}

		function supportAdminAssets(){
			$p = $this->preferences;
			return !empty($p['admin_asset_loading']) || !empty($p['admin_asset_editing']);
		}

		function getCacheParam(){
			return $this->mts;
		}

		function getCSSActionHook($p){
			$logic_test = isset($_GET['test_logic']);

			return !empty($p['stylesheet_in_footer']) && !$logic_test
				? $this->hooks['footer']
				// with test_logic, we want logic checked before output buffer HTML in head screws up JSON
				: (!empty($p['stylesheet_order']) && !$logic_test
					? $this->hooks['head']
					: ($this->checkBlockEditorScreen()
						? 'enqueue_block_assets'
						: $this->hooks['enqueue_scripts']
					)
				);
		}

		function getCSSActionOrder($p){
			return !empty($p['stylesheet_order']) && !isset($_GET['test_logic'])
				? intval($p['stylesheet_order'])
				: $this->defaultActionHookOrder;
		}

		function hookCSS(){

			$p = $this->preferences;

			// do not load assets when a builder has replaced the frontend with a UI
			if ($this->isBricksUi()){
				return;
			}

			// determine which action to hook into
			$action_hook = $this->getCSSActionHook($p);

			// determine the action execution order
			$action_order = $this->getCSSActionOrder($p);

			// add CSS
			add_action($action_hook, array(&$this, 'addCSS'), $action_order);

			// Also add CSS to the login page unless specified otherwise
			if ($this->isFrontend && !empty($p['global_styles_on_login'])){
				add_action('login_enqueue_scripts', array(&$this, 'addCSS'), $action_order);
			}

			// allow style tag atts to be updated if they are async
			add_filter( 'style_loader_tag', array(&$this, 'asyncStyleTag'), 10, 4 );

		}

		function addInsteadOfEnqueue(){
			return !empty($this->preferences['stylesheet_order'])
			       || !empty($this->preferences['stylesheet_in_footer']);
		}

		function addGlobalGoogleFonts($p, $add){

			if (!empty($p['g_fonts_used'])){

				$google_url = !empty($p['g_url_with_subsets'])
					? $p['g_url_with_subsets']
					: (!empty($p['gfont_subset'])
						? $p['g_url'].$p['gfont_subset']
						: $p['g_url']);

				$this->enqueueOrAdd($add, 'microthemer_g_font', $google_url);
			}
		}

		function addGlobalStylesheet(&$p, $add){

			$path = $this->fileStub . '-styles.css';

			if (
				file_exists($this->rootDir . $path)
				&& !empty($p[$this->globalStylesheetRequiredKey]) || !isset($p[$this->globalStylesheetRequiredKey])
			){

				$this->enqueueOrAdd(
					$add,
					'microthemer',
					$this->rootUrl . $path . '?' . $this->cacheParam
				);
			}
		}

		function addCSS(){

			global $wp_styles;

			$p = &$this->preferences;
			$asset_loading = !empty($p[$this->assetLoadingKey])
				? $p[$this->assetLoadingKey]
				: array();
			$action_hook = $this->getCSSActionHook($p);
			$origConcatSettings = $wp_styles->do_concat;

			// ensure that do_item() doesn't echo immediately as this could echo styles before the <html>
			// When using enqueue_block_assets on the Gutenberg Edit Post/Page screen
			// The code below means we shouldn't need the deferredHandles workaround
			if ($action_hook === 'enqueue_block_assets'){
				$wp_styles->do_concat = true;
			}

			// if stylesheet order is set, we add to $wp_styles object rather than enqueuing
			$add = $this->addInsteadOfEnqueue();

			// if Auth, we add a placeholder to update conditional styles on synced other tabs
			$this->addMTPlaceholder();

			// maybe load Tailwind - frontend and back so editor matches up with frontend styling
			$this->contentMethod('maybeLoadTailwind', array(&$p, $add));

			// Global CSS is just for the frontend
			if ($this->isFrontend
			    || ($this->isBlockEditorScreen && !empty($p['admin_asset_loading']))
			){

				// enqueue any Google Fonts
				$this->addGlobalGoogleFonts($p, $add);

				// load the Microthemer stylesheet if new preference hasn't been set, or it has been set to true
				$this->addGlobalStylesheet($p, $add);
			}

			// Load conditional assets
			if (isset($asset_loading['logic']) && (count($asset_loading['logic']) || isset($_GET['test_logic']) )){
				$this->conditionalAssets($asset_loading['logic']);
			}

			// insert MT interface CSS here if AssetAuth child class is running
			$this->addMTCSS();

			// restore the default do_concat setting
			// (which may have been changed if using enqueue_block_assets hook)
			$wp_styles->do_concat = $origConcatSettings;

		}

		function supportLogicTest(){
			return false;
		}

		function doLogicTest($folders, $logic, $forceAll = false){}

		function loadConditionalAssets($folders, $logic){

			// bail if the user has not enabled admin assets
			if ($this->isAdminArea && !$this->supportAdminAssets()){
				return;
			}

			$subDir = 'mt/conditional/' . $this->fileStub . '/';
			$dir = $this->rootDir . $subDir;
			$url = $this->rootUrl . $subDir;
			$add = $this->addInsteadOfEnqueue();
			$foldersDone = array();

			foreach ($folders as $folder){

				if (isset($folder['expr']) && !isset($foldersDone[$folder['slug']])){

					$slug = $folder['slug'];
					$this->folderLoading[$slug] = 0;
					$result = $logic->result(trim($folder['expr']));
					$cssFileName = $slug . '.css';
					$cssFile = $dir . $slug . '.css';
					$fileExists = file_exists($dir . $cssFileName);

					$this->folderLoading[$slug] = $result
						? ($fileExists
							? (is_string($result) ? $result : 1) // preserve string result like 'blocksOnly'
							: 'empty')
						: 0;

					// load content if true and the file exists
					if ($result && $fileExists){

						$inline = empty($folder['css_external']);
						$async = !empty($folder['css_async']);
						//echo '$cssFile: ' . $url . $cssFileName . '?' . $this->cacheParam;

						// force file_get_contents to get a non-cached version of the file
						if ($inline){
							touch($cssFile);
						}

						// load the CSS file
						if (!isset($_GET['get_front_data'])){
							$this->enqueueOrAdd(
								($add || $inline || $async),
								'microthemer-'.$slug, //.'-css',
								$url . $cssFileName . '?' . $this->cacheParam,
								array(
									'inline' => $inline,
									'async' => $async,
									'code' => $inline ? file_get_contents($cssFile) : false,
									'deps' => array('microthemer-css')
								)
							);
						}

					}
				}

				// ensure a folder never runs twice
				// which can happen if logic array has repetition (due to an unsolved bug)
				$foldersDone[$folder['slug']] = 1;
			}

			/*wp_die('<pre>loading: '.print_r([
					has_template("wp_template_part", "twentytwentyfive//header", "Template part - Header"),
				$this->folderLoading], true).'</pre>');*/

		}

		function asyncStyleTag($html, $handle, $href, $media){

			$noscript = $this->context === 'load' ? '<noscript>' . $html . '</noscript>' : '';

			if (!empty($this->asyncAssets['css'][$handle])){

				// The media print method - works in all browsers and doesn't change resource priority
				$html = '<link rel="stylesheet" href="'.$href.'" id="'.$handle.'-css" 
						media="print" onload="this.onload=null; this.media=\''.$media.'\';">'
				        . $noscript;
			}

			return $html;
		}

		function conditionalAssets($folders, $forceAll = false, $doingLogicTest = false){

			//echo 'condAssets ';

			if (!class_exists('Microthemer\Logic')){
				require_once dirname(__FILE__) . '/Logic.php';
			} if (!class_exists('Microthemer\Helper')){
				require_once dirname(__FILE__) . '/Helper.php';
			}

			$logic = new Logic($this->logicSettings);

			if (!$doingLogicTest && ($this->supportLogicTest() || $forceAll)){
				$this->doLogicTest($folders, $logic, $forceAll);
			}

			else {
				$this->loadConditionalAssets($folders, $logic);
				
				// Now we have folderLoading config, queue scripts and maybe hook HTML mods
				$this->contentMethod('initContentAmendments');
			}

			$this->folderLoadingChecked = true;

		}

		function hookViewportMeta($p){
			if (!empty($p['initial_scale'])) {
				add_action($this->hooks['head'], array(&$this, 'addViewportMeta'));
			}
		}

		function hookClasses($p){
			add_filter('body_class', array(&$this, 'addBodyClasses'));
		}

		// legacy functionality that is not enabled by default
		function hookLegacy($p){

			// insert dynamic classes to menus if preferred
			if (!function_exists('add_first_and_last')) {
				if (!empty($p['first_and_last'])) {
					add_filter('nav_menu_css_class', array(&$this, 'addMenuOrdinalClasses'), 10, 3);
				}
			}
		}

		// Add first and last classes to WordPress menus
		function addMenuOrdinalClasses($classes, $item, $args){

			// store menu item count if not done already
			if (empty($this->menuSlugs[$args->menu->slug])){
				$this->menuSlugs[$args->menu->slug] = $args->menu->count;
				$this->menuItemCount = 0;
			}

			// add first or last item
			if ( $this->menuItemCount === 0 ) {
				$classes[] = 'menu-item-first';
			} else if ($this->menuItemCount === $this->menuSlugs[$args->menu->slug]-1) {
				$classes[] = 'menu-item-last';
			}

			$this->menuItemCount++;
			
			return $classes;

		}

		function addViewportMeta(){
			echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
		}

		// return meta data about the current page
		function pageMeta(){

			global $wp_query, $post, $pagenow;

			$logic = null;
			$alt = array();
			$title = null;
			$type = null;
			$id = null;
			$post_id = 0;
			$post_status = '';
			$isFSE = $pagenow === 'site-editor.php';
			$permalink = home_url(); // default to the home page
			$post_title = '';
			$slug = null;
			$isAdminPostPageEdit = ($this->isAdminArea && !empty($_GET['post']) && isset($post->post_name));
			$screen = $this->isAdminArea && function_exists('get_current_screen')
				? get_current_screen()
				: null;
			$adminPrefix = esc_html__('Admin - ', 'microthemer');
			$blockPrefix = '';
			$isBlockEditorScreen = $this->isBlockEditorScreen;
			//wp_die('<pre>$post: '.print_r($post, 1).' </pre>');
			//wp_die('<pre>$current_screen: '.print_r($screen, 1).' </pre>');

			// single post/page on frontend or admin side
			if ( $wp_query->is_page || $wp_query->is_single || $isAdminPostPageEdit ) {
				$post_id = $id = $post->ID;
				$slug = $post->post_name ?: $post_id; // with certain previews the slug might not be set so default to the id
				$type = $wp_query->is_page ? 'page' : 'single';
				$blockPrefix = esc_html__('Blocks - ', 'microthemer');
				$post_title = $title = ($this->isAdminArea ? $adminPrefix : '') .  $post->post_title;
				$post_status = $post->post_status;

				// general page logic
				$pageLogic = $isAdminPostPageEdit
					? '\Microthemer\is_public_or_admin("'.$slug.'")'
					:  '\Microthemer\is_post_or_page('.$post_id.', "'.$post->post_title.'")'; // 'is_'.$type.'("'.$slug.'")';

				$logic = $pageLogic;

				// more alt logic for admin side
				if ($isAdminPostPageEdit && $screen){
					$alt[] = array(
						'logic' => '\Microthemer\query_admin_screen("base", "'.$screen->base.'")',
						'title' => $adminPrefix . ucwords($screen->base)
					);
				}

				// Save the permalink, for turning off Gutenberg
				$permalink = get_permalink($post_id);

			}

			// todo has_template() when using site editor templates, patterns, template parts,

			// any other admin screen that isn't edit post/page
			elseif ($this->isAdminArea && $screen) {

				// Add Post/Page - need to convert the folder to page-specific if editor content items exist inside
				// So flag with identifiable logic
				if ($screen->action === 'add' && $screen->base === 'post'){
					$logic = '\Microthemer\query_admin_screen("action", "add") && \Microthemer\query_admin_screen("base", "post")';
					$title = $adminPrefix . $screen->action . ' ' . $screen->base;
				}

				else {
					$logic = '\Microthemer\query_admin_screen("base", "'.$screen->base.'")';
					$title = $adminPrefix . $screen->base;
				}

				if ($screen->parent_base){
					$alt[] = array(
						'logic' => '\Microthemer\query_admin_screen("parent_base", "'.$screen->parent_base.'")',
						'title' => $adminPrefix . ucwords($screen->parent_base)
					);
				}

				// It's a full site editor page, see if we can get a link for pages
				if ($isFSE){
					$permalink = Helper::getFSEPermalink($permalink);
				}
			} elseif ( $wp_query->is_home ) {
				$logic = 'is_home()';
				$title = esc_html__('Blog home', 'microthemer');
				$type = 'blog-home';
			} elseif ( $wp_query->is_category ) {
				$id = $wp_query->query_vars['cat'];
				$slug = $wp_query->query['category_name'];
				$logic = 'is_category("'.$slug.'")';
				$title = esc_html__('Category archive: ', 'microthemer') . $wp_query->queried_object->name;
				$type = 'category';
			} elseif ( $wp_query->is_tag ) {
				$id = $wp_query->query_vars['tag'];
				$slug = $wp_query->query['tag_name'];
				$logic = 'is_tag()';
				$title = esc_html__('Tag archive', 'microthemer');
				$type = 'tag';
			} elseif ( $wp_query->is_author ) {
				$id = $wp_query->query_vars['author'];
				$slug = $wp_query->query['author_name'];
				$logic = 'is_author()';
				$title = esc_html__('Author archive', 'microthemer');
				$type = 'author';
			} elseif ( $wp_query->is_archive ) {
				$logic = 'is_archive()';
				$title = esc_html__('Archive', 'microthemer');
				$type = 'archive';
			} elseif ( $wp_query->is_search ) {
				$logic = 'is_search()';
				$title = esc_html__('Search results', 'microthemer');
				$type = 'search';
			} elseif ( $wp_query->is_404 ) {
				$logic = 'is_404()';
				$title = esc_html__('404 page', 'microthemer');
				$type = '404';
			}

			// Complete the 3 levels of logic when editing the admin area
			// 1 = most specific e.g. single page or current screen
			// 2 = base or parent base
			// 3 = is_admin()
			if ($this->isAdminArea){
				$alt[] = array(
					'logic' => 'is_admin()',
					'title' => esc_html__('Admin area', 'microthemer')
				);
			}

			$min = !TVR_DEV_MODE ? '-min' : '/page';

			// Tailwind data
			$tailwind = array(
				'classCache' => '',
				'siteWideCache' => '',
				'config' => ''
			);

			$this->contentMethod('getFrontendDataTailwindCache', array($type, $id, &$tailwind));

			return array_merge(array(
				'post_id' => $post_id,
				'post_title' => $post_title,
				'id' => $id,
				'post_status' => $post_status,
				'slug' => $slug,
				'title' => $title,
				'logic' => $logic,
				'alt_logic' => $alt,
				'type' => $type,
				'isBlockEditorScreen' => $isBlockEditorScreen,
				'adminPrefix' => $adminPrefix,
				'blockPrefix' => $blockPrefix,
				'permalink' => $permalink,
				'pagenow' => $pagenow,
				'tailwind' => $tailwind
			), $this->authOnlyData($min));

		}

		function authOnlyData($min){
			return array();
		}

		// Microthemer updates a separate database entry with a handful of preferences that are needed on the frontend
		// and these preferences autoload, saving an extra DB request
		function getPreferences(){

			// fallback to the full preferences if frontend preferences haven't been set somehow
			// (or an empty array but that's just to address PHP 8.2 type warnings)
			$this->preferences = ( get_option('microthemer_autoload_preferences')
					?: get_option('preferences_themer_loader') )
						?: array();

			return $this->preferences;

		}

		function hookCaptureTemplate(){
			add_filter( 'template_include', array(&$this, 'captureTemplate'), 9999999);
		}

		function captureTemplate($template){

			global $_wp_current_template_id;

			$themeSlug = get_stylesheet();

			// cache the current template slug for later logic comparison
			$this->logicSettings['currentTemplate'] = !empty($_wp_current_template_id)
				? Helper::removeRedundantThemePrefix(
					Helper::maybeMakeNumber($_wp_current_template_id), $themeSlug
				)
				: basename($template); // probably a classic .php template file

			return $template;
		}

		function hookJS($p){

			add_action($this->hooks['enqueue_scripts'], array(&$this, 'addJS'), $this->defaultActionHookOrder);

			// allow login page to be editable unless disabled
			if ($this->isFrontend && !empty($p['global_styles_on_login'])){
				add_action('login_enqueue_scripts', array(&$this, 'addJS'), $this->defaultActionHookOrder);
			}

		}

		function addMTPlaceholder(){}
		function addMTCSS(){}
		function addMTJS(){}

		function addJS() {

			$p = &$this->preferences;

			$deps = !empty($p['active_scripts_deps'])
				? preg_split("/[\s,]+/", $p['active_scripts_deps'])
				: array();

			// enqueue any script libraries
			if (!empty($p['enq_js']) and is_array($p['enq_js'])){
				foreach ($p['enq_js'] as $k => $arr){
					if (empty($arr['disabled'])){
						wp_enqueue_script($arr['display_name']);
						$deps[] = $arr['display_name'];
					}
				}
			}

			// insert MT JavaScript here if AssetAuth child class is running
			// This needs to come before the user's JavaScript so that we can catch/log their JS errors
			$this->addMTJS();

			// enqueue any user JavaScript
			if (!empty($p[$this->globalJSRequiredKey]) ||
			    (!isset($p[$this->globalJSRequiredKey]) && !empty($p['load_js'])) // legacy config
			) {
				$h = 'mt_user_js';
				wp_register_script($h, $this->rootUrl . $this->fileStub . '-scripts.js?'.$this->cacheParam);
				wp_enqueue_script($h, false, $deps, null, !empty($p['active_scripts_footer']));
			}

			// enqueue JS animations if used
			if (!empty($p['active_events'])) {
				$h = 'mt_animation_events';
				wp_register_script($h, $this->rootUrl.'animation-events.js?'.$this->mtv, array('jquery'));
				wp_enqueue_script($h);
				wp_localize_script( $h, 'MT_Events_Data', json_decode($p['active_events'], true) );
			}
		}

		function enqueueOrAdd($add, $handle, $url, $config = array()){

			global $wp_styles;

			// Allow for dependencies to be passed in - this doesn't work if do_item is run, but we need that
			$deps = isset($config['deps']) ? $config['deps'] : array();

			// add to $wp_styles
			if ($add){

				// add content as inline style
				if (!empty($config['inline'])){
					$wp_styles->add($handle, false, $deps);
					$wp_styles->enqueue(array($handle));
					$wp_styles->add_inline_style($handle, $config['code']);
				}

				// regular external stylesheet
				else {

					$wp_styles->add($handle, $url, $deps);
					$wp_styles->enqueue(array($handle));

					if (!empty($config['data_key'])){
						$wp_styles->add_data($handle, $config['data_key'], $config['data_val']);
					}

					if (!empty($config['async'])){
						$wp_styles->add_data($handle, 'async', '1');
						$this->asyncAssets['css'][$handle] = 1;
					}
				}

				if (empty($config['doNotDoItem']) && !isset($_GET['get_front_data'])){
					$wp_styles->do_item($handle);
					$wp_styles->done[] = $handle;
				}

			}

			// or enqueue normally
			else {
				wp_register_style($handle, $url, false);
				wp_enqueue_style($handle);
			}
		}

		function addBodyClasses($classes){
			
			global $post;

			$p = &$this->preferences;
			
			if (isset($post)) {

				$pfx = !empty($p['page_class_prefix']) ? $p['page_class_prefix'] : 'mt';
				$classes[] = $pfx.'-'.$post->ID;
				$classes[] = $pfx.'-'.$post->post_type.'-'.$post->post_name;

				if (!empty($p['insert_custom_field_classes'])){

					$custom_classes = get_post_meta($post->ID, 'my_body_classes', true);

					if ($custom_classes){
						$classes = array_merge($classes, preg_split("/\s+/", trim($custom_classes)));
					}
				}
			}

			return $classes;
		}

		/* Integrations */

		function isBricksUi(){
			return !isset($_GET['brickspreview']) && isset($_GET['bricks']) && $_GET['bricks'] === 'run';
		}

	}



}