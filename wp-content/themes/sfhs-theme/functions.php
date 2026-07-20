<?php
/**
 * SFS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SFS
 */

if ( ! function_exists( 'school_website_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function school_website_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on SFS, use a find and replace
		 * to change 'school-website' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'school-website', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-navigation' => esc_html__( 'Primary', 'school-website' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'school_website_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'school_website_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function school_website_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'school_website_content_width', 640 );
}
add_action( 'after_setup_theme', 'school_website_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function school_website_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'school-website' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'school-website' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'school_website_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function school_website_scripts() {

// Custom Stylesheet
	wp_enqueue_style( 'normalize-css', get_stylesheet_directory_uri() . '/assets/css/normalize.css' );
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome-css', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick/slick.css' );
	wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/assets/css/slick/slick-theme.css' );
	wp_enqueue_style( 'video-js', get_stylesheet_directory_uri() . '/assets/css/video-js.css' );
	wp_enqueue_style( 'waves-js', get_stylesheet_directory_uri() . '/assets/css/waves.min.css' );	
	wp_enqueue_style( 'school-website-style', get_stylesheet_uri() );



	wp_enqueue_script( 'school-website-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'school-website-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


// Custom JS

	// Jquery
	wp_enqueue_script('jquery-script' , get_stylesheet_directory_uri() . '/assets/js/jquery.min.js' , array('jquery'));
	// Bootstrap
	wp_enqueue_script('bootstrap-script' , get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js' , array('jquery'));
	// Slick
	wp_enqueue_script('slick-script' , get_stylesheet_directory_uri() . '/assets/js/slick/slick.min.js' , array());
	// TweenMax and Scroll Magic
	wp_enqueue_script('Tweenmax-script' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/TweenMax.min.js' , array());
	wp_enqueue_script('scrollmagic-script' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/ScrollMagic.min.js' , array());
	wp_enqueue_script('animation-script' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/plugins/animation.gsap.min.js' , array());
	wp_enqueue_script('indicators-script' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/plugins/debug.addIndicators.min.js' , array());
	wp_enqueue_script('animation-velocity' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/plugins/animation.velocity.min.js' , array());
	wp_enqueue_script('css-plugin' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/plugins/CSSPlugin.min.js' , array());
	wp_enqueue_script('css-rule-plugin' , get_stylesheet_directory_uri() . '/assets/js/scrollmagic/plugins/CSSRulePlugin.min.js' , array());

	// Video JS
	wp_enqueue_script('videojs-script' , get_stylesheet_directory_uri() . '/assets/js/videojs/video.min.js' , array());
	// Mouse Stop
	wp_enqueue_script('mouse-stop-js' , get_stylesheet_directory_uri() . '/assets/js/mousestop.min.js' , array());
	// Web TIcker
	wp_enqueue_script('ticker-js' , get_stylesheet_directory_uri() . '/assets/js/jquery.webticker.min.js' , array());	
	// Lottie
	wp_enqueue_script('lottie-js' , get_stylesheet_directory_uri() . '/assets/js/lottie.min.js' , array());
	// Isotope
	wp_enqueue_script('isotope-js' , get_stylesheet_directory_uri() . '/assets/js/isotope.min.js' , array());
	// ViewPort
	wp_enqueue_script('viewport-js' , get_stylesheet_directory_uri() . '/assets/js/isInViewport.min.js' , array());
	// Cookie Effect
	wp_enqueue_script('cookie-js' , get_stylesheet_directory_uri() . '/assets/js/cookie.min.js' , array()); 
	
	wp_enqueue_script('waves-js' , get_stylesheet_directory_uri() . '/assets/js/waves.min.js' , array()); 

	// Custom Cookie Script
	// wp_enqueue_script('ripple-js' , get_stylesheet_directory_uri() . '/assets/js/ripple.js' , array()); 
	// Custom Script
	wp_enqueue_script('custom-script' , get_stylesheet_directory_uri() . '/assets/js/script.js' , array());




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'school_website_scripts' );

// Custom Post Pagination Function
function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
			'prev_text'          => '',
			'next_text'          => '',
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
			'total' => $total_pages,
			
			
        ));
    }
}
// end of pagination function 

//Exclude pages from WordPress Search

add_action( 'pre_get_posts', 'wpse67626_exclude_posts_from_search' );
function wpse67626_exclude_posts_from_search( $query ) {
    if ( $query->is_main_query() && $query->is_search() ) {
		
        // Get an array of all page IDs with `get_all_page_ids()` function
		$query->set( 'post__not_in', array(115) );
		

    }
}

// end of exclude page WordPress Search 

//AJAX Live Search Function

// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchPage(page = 1) {
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: {
            action: 'data_fetch',
            keyword: jQuery('#keyword').val(),
            paged: page, // Pass the current page number
        },
        success: function (data) {
            jQuery('#datafetch').html(data);
        }
    });
}

// Bind the pagination click events
jQuery(document).on('click', '.pagination a', function (e) {
    e.preventDefault();
    const page = jQuery(this).attr('data-page'); // Assuming pagination links include data-page attribute
    fetchPage(page);
});

</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');

function data_fetch() {
    // Sanitize inputs
    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1; // Get the current page number
    $posts_per_page = 9;

    // Create WP_Query arguments
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        's' => $keyword,
        'category_name' => 'news', // Target specific category
    );

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            // Use your specific content template for each post
            get_template_part('template-parts/content', 'news');
        }
    } else {
        // Show no results found template
        get_template_part('template-parts/content', 'none');
    }

    wp_reset_postdata();
    wp_die(); // Properly terminate AJAX requests
}


// End of Live Search PHP


// News Search will only search in post titles not the whole post 
function search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if ( empty( $search ) )
        return $search; // skip processing - no search term in query
    $q = $wp_query->query_vars;
    $n = ! empty( $q['exact'] ) ? '' : '%';
    $search = '';
    $searchand = '';
    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter( 'posts_search', 'search_by_title_only', 500, 2 );


// Change Excerpt [....]

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug( $post_link, $post ) {
    if ( 'templates' === $post->post_type && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }
    return $post_link;
}
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 2 );
/**
 * Have WordPress match postname to any of our public post types (post, page, race).
 * All of our public post types can have /post-name/ as the slug, so they need to be unique across all posts.
 * By default, WordPress only accounts for posts and pages where the slug is /post-name/.
 *
 * @param $query The current query.
 */
function gp_add_cpt_post_names_to_main_query( $query ) {
	// Bail if this is not the main query.
	if ( ! $query->is_main_query() ) {
		return;
	}
	// Bail if this query doesn't match our very specific rewrite rule.
	if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
		return;
	}
	// Bail if we're not querying based on the post name.
	if ( empty( $query->query['name'] ) ) {
		return;
	}
	// Add CPT to the list of post types WP will include when it queries based on the post name.
	$query->set( 'post_type', array( 'post', 'page', 'templates' ) );
}
add_action( 'pre_get_posts', 'gp_add_cpt_post_names_to_main_query' );


// Mega Menu Function
function wpmm_setup() {
    register_nav_menus( array(
		'mega_menu-main' => 'Mega Menu Main',
		'mega_menu-sub-1' => 'More About SFHS',
		'mega_menu-sub-2' => 'Process',
		'mega_menu-sub-3' => 'Happenings',
		'mega_menu-sub-4' => 'Life At SFHS',
		'mega_menu-sub-5' => 'Connect',
		'footer_menu' => 'Footer Menu',
    ) );
}
add_action( 'after_setup_theme', 'wpmm_setup' );

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div>
	<input type="submit" class="searchBtn" id="searchsubmit" value="" />
	<input type="search" value="' . get_search_query() . '" name="s" id="s" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

// Custom Favicon for WordPress Website
// First, create a function that includes the path to your favicon
function add_favicon() {
	$favicon_url = get_stylesheet_directory_uri() . '/assets/resources/icons/admin-favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}

// Now, just make sure that function runs when you're on the login page and admin pages  
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

// Add custom button in Tinymce 
function make_mce_awesome( $init ) {
	// our Options will go here..
	$init['theme_advanced_blockformats'] = 'h3,h4,h5,h6,p,pre';
	$init['theme_advanced_text_colors'] = 'd0021b';
	return $init;
}

add_filter('tiny_mce_before_init', 'make_mce_awesome');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
add_filter('the_content', function( $content ) {
    if (empty($content)) {
        return $content;
    }

    // Initialize DOMDocument
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suppress errors for invalid HTML
    $dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    // Use XPath to target elements with inline styles
    $xpath = new DOMXPath($dom);
    foreach ($xpath->query('//*[@style]') as $node) {
        $node->removeAttribute('style'); // Remove the style attribute
    }

    // Return the cleaned HTML
    $cleaned_content = $dom->saveHTML();
    libxml_clear_errors();

    return $cleaned_content;
}, 20);