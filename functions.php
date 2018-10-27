<?php
	// Include style
	function theme_style_load() {
		wp_enqueue_style( 'style.min', get_template_directory_uri() . '/css/style.css');	
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
		wp_enqueue_style( 'color', get_template_directory_uri() . '/css/color.css');			
	}

	add_action( 'wp_enqueue_scripts', 'theme_style_load' );

	// Include script
	function theme_script_load() {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/jquery/jquery-1.11.3.min.js', '', '', true);
		wp_register_script( 'googleapis', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUHYWsNLthNIjXhsLDtpDHJ19O-jBls0');
		wp_enqueue_script( 'googleapis');
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', '', '', true);
		wp_enqueue_script( 'script1', get_template_directory_uri() . '/assets/jquery-ui-1.11.4/jquery-ui.js', '', '', true);
		wp_enqueue_script( 'script2', get_template_directory_uri() . '/assets/owl.carousel-2/owl.carousel.min.js', '', '', true);
		wp_enqueue_script( 'script3', get_template_directory_uri() . '/assets/jquery-validation/dist/jquery.validate.min.js', '', '', true);
		wp_enqueue_script( 'script4', get_template_directory_uri() . '/assets/gmap.js', '', '', true);
		wp_enqueue_script( 'script5', get_template_directory_uri() . '/assets/jquery.mixitup.min.js', '', '', true);
		wp_enqueue_script( 'script6', get_template_directory_uri() . '/assets/jquery.fitvids.js', '', '', true);
		wp_enqueue_script( 'script7', get_template_directory_uri() . '/assets/revolution/js/jquery.themepunch.tools.min.js', '', '', true);
		wp_enqueue_script( 'script8', get_template_directory_uri() . '/assets/revolution/js/jquery.themepunch.revolution.min.js', '', '', true);
		wp_enqueue_script( 'script9', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.actions.min.js', '', '', true);
		wp_enqueue_script( 'script10', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.carousel.min.js', '', '', true);
		wp_enqueue_script( 'script11', get_template_directory_uri() . '/sets/revolution/js/extensions/revolution.extension.kenburn.min.js', '', '', true);
		wp_enqueue_script( 'script12', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js', '', '', true);
		wp_enqueue_script( 'script13', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.migration.min.js', '', '', true);
		wp_enqueue_script( 'script14', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.navigation.min.js', '', '', true);
		wp_enqueue_script( 'script15', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.parallax.min.js', '', '', true);
		wp_enqueue_script( 'script16', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.slideanims.min.js', '', '', true);
		wp_enqueue_script( 'script17', get_template_directory_uri() . '/assets/revolution/js/extensions/revolution.extension.video.min.js', '', '', true);
		wp_enqueue_script( 'script18', get_template_directory_uri() . '/assets/fancyapps-fancyBox/source/jquery.fancybox.pack.js', '', '', true);
		wp_enqueue_script( 'script19', get_template_directory_uri() . '/assets/Polyglot-Language-Switcher-master/js/jquery.polyglot.language.switcher.js', '', '', true);
		wp_enqueue_script( 'script20', get_template_directory_uri() . '/assets/nouislider/nouislider.js', '', '', true);
		wp_enqueue_script( 'script21', get_template_directory_uri() . '/assets/bootstrap-touch-spin/jquery.bootstrap-touchspin.js', '', '', true);
		wp_enqueue_script( 'script22', get_template_directory_uri() . '/assets/jquery-appear/jquery.appear.js', '', '', true);
		wp_enqueue_script( 'script23', get_template_directory_uri() . '/assets/jquery.countTo.js', '', '', true);
		wp_register_script( 'js-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js');
		wp_enqueue_script( 'js-cookie');
		wp_enqueue_script( 'script24', get_template_directory_uri() . '/assets/jQuery.style.switcher.min.js', '', '', true);
		wp_enqueue_script( 'script25', get_template_directory_uri() . '/js/default-map.js', '', '', true);
		wp_enqueue_script( 'script26', get_template_directory_uri() . '/js/custom.js', '', '', true);

	}
	add_action( 'wp_enqueue_scripts', 'theme_script_load' );

	function my_acf_init() {
	
		acf_update_setting('google_api_key', 'AIzaSyCkUHYWsNLthNIjXhsLDtpDHJ19O-jBls0');
	}
	
	add_action('acf/init', 'my_acf_init');

	add_theme_support('post-thumbnails');
	show_admin_bar(false);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');

	add_action( 'after_setup_theme', function () {
		register_nav_menus( [
			'topMenu' => 'Верхнее меню',
			'bottomMenu' => 'Нижнее меню',
			'bottomLinksMenu' => 'Нижнее меню ссылок',
		] );
	} );

	
	add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );
	function filter_nav_menu_css_classes( $classes, $item, $args, $depth ) {
		if ( $args->theme_location === 'Верхнее меню' ) {
			$classes = [
				''
			];
			if ( $item->current ) {
				$classes[] = 'active';
			}
		}
		return $classes;
	}

	class magomra_walker_nav_menu extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth ) {
			// depth dependent classes
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 1); // because it counts the first submenu as 0
			$classes = 'submenu';
			

			// build html
			$output .= "\n" . $indent . '<ul class="' . $classes . '">' . "\n";
		}

		// add script/sub classes to li's and links

	}

	function get_breadcrumbs() {
		$text['home']     = 'Home';
		$text['category'] = '%s';
		$text['search']   = '%s';
		$text['tag']      = '%s';
		$text['page']     = '%s';
		$text['404']      = '404';
		$show_current   = 1;
		$show_on_home   = 0;
		$show_home_link = 1;
		$show_title     = 1;
		$delimiter      = ' ';
		$before         = '<span>';
		$after          = '</span>';
		global $post;
		$home_link    = home_url('/');
		$link_before  = '<li>';
		$link_after   = '</li>';
		$link         = '<li><a href="%1$s">%2$s</a></li>';
		$parent_id    = $parent_id_2 = $post->post_parent;
		$frontpage_id = get_option('page_on_front');
		if (is_home() || is_front_page()) {
			if ($show_on_home == 1) echo '<li><a href="' . $home_link . '">' . $text['home'] . '</a></li>';
		}
		else {
			if ($show_home_link == 1) {
				echo sprintf($link, $home_link, $text['home']);
				if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
			}
			if ( is_category() ) {
				$this_cat = get_category(get_query_var('cat'), false);
				if ($this_cat->parent != 0) {
					$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
					if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo $cats;
				}
				if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}  elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($show_current == 1) echo '<li>' . $before . get_the_title() . $after . '</li>';
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, $delimiter);
					if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
					$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
					$cats = str_replace('</a>', '</a>' . $link_after, $cats);
					if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
					echo $cats;
					if ($show_current == 1) echo '<li>' . $before . get_the_title() . $after . '</li>';
				}
			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;
			} elseif ( is_attachment() ) {
				$parent = get_post($parent_id);
				$cat = get_the_category($parent->ID); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				printf($link, get_permalink($parent), $parent->post_title);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} elseif ( is_page() && !$parent_id ) {
				if ($show_current == 1) echo '<li>' . $before . get_the_title() . $after . '</li>';
			} elseif ( is_page() && $parent_id ) {
				if ($parent_id != $frontpage_id) {
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						if ($parent_id != $frontpage_id) {
							$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
						}
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					for ($i = 0; $i < count($breadcrumbs); $i++) {
						echo $breadcrumbs[$i];
						if ($i != count($breadcrumbs)-1) echo $delimiter;
					}
				}
				if ($show_current == 1) {
					if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
					echo '<li>' . $before . get_the_title() . $after . '</li>';
				}
			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;
			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}
			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo __('Page') . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			};
		}
	}

	function customTitle($limit) {
		$title = get_the_title($post->ID);
		if(strlen($title) > $limit) {
			$title = mb_substr($title, 0, $limit) . '...';
		}
		
		echo $title;
	}

	function mytheme_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
	?>
		<li <?php comment_class(); ?> id=&amp;quot;li-comment-<?php comment_ID() ?>&amp;quot;>
				<div class="single-comment-box" id=&amp;quot;comment-<?php comment_ID(); ?>&amp;quot;>
					<div class="img-box">
						<?php echo get_avatar( $comment->comment_author_email, $args['avatar_size']); ?>
					</div>
					<div class="text-box">
						<div class="top-box">
							<h2><?php echo get_comment_author_link(); ?></h2>
							<span><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' назад'; ?></span>
						</div>
					
	<?php if ($comment->comment_approved == '0') : ?>
					<div class=&amp;quot;comment-awaiting-verification&amp;quot;><?php _e('Your comment is awaiting moderation.') ?></div>
				<br />
	<?php endif; ?>
						<div class="content">
							<?php comment_text() ?>
							<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>									
					</div>
				</div>
			
	<?php
			break;
			case 'pingback'  :
			case 'trackback' :
	?>
				<li class=&amp;quot;post pingback&amp;quot;>
					<?php comment_author_link(); ?>
					<?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?>
	<?php
			break;
		endswitch;
	}

	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
	return '
	<nav class="%1$s" role="navigation">
	<ul class="post-pagination list-inline text-center">%3$s</ul>
	</nav>    
	';
	}


?>