<?php
/**
 * WP Bootstrap 4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_4
 */

if (!function_exists('wp_bootstrap_4_setup')) :
    function wp_bootstrap_4_setup()
    {

        // Make theme available for translation.
        load_theme_textdomain('wp-bootstrap-4', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Enable Post formats
        add_theme_support('post-formats', array('gallery', 'video', 'audio', 'status', 'quote', 'link'));

        // Enable support for woocommerce.
        add_theme_support('woocommerce');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'wp-bootstrap-4'),
        ));

        // Switch default core markup for search form, comment form, and comments
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('wp_bootstrap_4_custom_background_args', array(
            'default-color' => 'f8f9fa',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for core custom logo.
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'wp_bootstrap_4_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_4_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_bootstrap_4_content_width', 800);
}

add_action('after_setup_theme', 'wp_bootstrap_4_content_width', 0);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_bootstrap_4_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'wp-bootstrap-4'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget border-bottom %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 1', 'wp-bootstrap-4'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 2', 'wp-bootstrap-4'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 3', 'wp-bootstrap-4'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Column 4', 'wp-bootstrap-4'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'wp-bootstrap-4'),
        'before_widget' => '<section id="%1$s" class="widget wp-bp-footer-widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h5 class="widget-title h6">',
        'after_title' => '</h5>',
    ));
}

add_action('widgets_init', 'wp_bootstrap_4_widgets_init');


/**
 * Enqueue scripts and styles.
 */

function wp_bootstrap_4_scripts()
{
    wp_enqueue_style('open-iconic-bootstrap', get_template_directory_uri() . '/assets/css/open-iconic-bootstrap.css', array(), 'v4.0.0', 'all');
    wp_enqueue_style('bootstrap-4', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 'v4.0.0', 'all');
    wp_enqueue_style('font-awesom', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), 'v4.7.0', 'all');
    wp_enqueue_style('wp-bootstrap-4-style', get_stylesheet_uri(), array(), '1.0.2', 'all');

    wp_enqueue_script('bootstrap-4-js', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), 'v4.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'wp_bootstrap_4_scripts');


/**
 * Registers an editor stylesheet for the theme.
 */
function wp_bootstrap_4_add_editor_styles()
{
    add_editor_style('editor-style.css');
}

add_action('admin_init', 'wp_bootstrap_4_add_editor_styles');


// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

// Implement the Custom Comment feature.
require get_template_directory() . '/inc/custom-comment.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Custom Navbar
require get_template_directory() . '/inc/custom-navbar.php';

// Customizer additions.
require get_template_directory() . '/inc/tgmpa/tgmpa-init.php';

// Use Kirki for customizer API
require get_template_directory() . '/inc/theme-options/add-settings.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

// Load WooCommerce compatibility file.
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}


function codex_custom_init()
{
    $args = array(
        'public' => true,
        'has_archive' => true,
        'label' => 'Товары',
        'labels' => array(
            'add_new' => 'Добавить товар',
            'add_new_item' => 'Добавить новый товар',
            'new_item' => 'Новый товар',
            'view_item' => 'Посмотреть товар',
            'not_found' => 'Товаров не найдено',
            'menu_name' => 'Товары',
            'name' => 'Товары',
            'singular_name' => 'Товар',
            'search_items' => 'Искать товар',
            'all_items' => 'Все товары',
            'edit_item' => 'Редактировать товар',
            'new_item_name' => 'Новый товар',
        ),
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ),
    );
    register_post_type('product', $args);
}

add_action('init', 'codex_custom_init');

//Register product prodcat taxonomy
add_action('init', 'create_product_tax');

function create_product_tax()
{
    register_taxonomy(
        'prodcat',
        'product',
        array(
            'label' => 'Категория',
            'rewrite' => array('slug' => 'prodcat'),
            'hierarchical' => true,
            'name' => 'prodcats',
            'singular_name' => 'prodcat',
            'search_items' => 'Искать категорию',
            'all_items' => 'Все категории',
            'edit_item' => 'Изменить категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новая категория',
            'menu_name' => 'Категории',
        )
    );
}

//Get prodcat Filters
function get_prodcat_filters()
{
    $terms = get_terms('prodcat');
    $filters_html = false;

    if ($terms):
        $filters_html = '<div id="filt" class="filt" data-toggle="buttons">';

        foreach ($terms as $term) {
            $term_id = $term->term_id;
            $term_name = $term->name;
            $filters_html .= ' <label class="btn btn-primary term_id_' . $term_id . '">' . $term_name . '<input type="checkbox" name="filter_prodcat[]" value="' . $term_id . '"><span class="fa fa-check"></span> </label>';
        }
        $filters_html .= '<label id="clear-all" class="btn btn-primary  clear-all">Очистить </label>';
        $filters_html .= '</div>';

        $filters_html .= '<div id="sort" class="sort" data-toggle="buttons">';
        $filters_html .= '<p>По Наименованию</p>';
        $filters_html .= ' <label id="title" class="btn btn-primary"><i class="fa fa-arrow-up"></i><input id="sort" type="radio" name="title" value="ASC"></label>';
        $filters_html .= ' <label id="title" class="btn btn-primary"><i class="fa fa-arrow-down"></i><input id="sort" type="radio" name="title" value="DESC"></label>';
        $filters_html .= '<p>По цене</p>';
        $filters_html .= ' <label id="price" class="btn btn-primary"><i class="fa fa-arrow-up"></i><input id="sort" type="radio" name="price" value="ASC"></label>';
        $filters_html .= ' <label id="price" class="btn btn-primary"><i class="fa fa-arrow-down"></i><input id="sort" type="radio" name="price" value="DESC"> </label>';
        $filters_html .= '<p>По Дате</p>';
        $filters_html .= ' <label id="date" class="btn btn-primary"><i class="fa fa-arrow-up"></i><input id="sort" type="radio" name="date" value="ASC"></label>';
        $filters_html .= ' <label id="date" class="btn btn-primary"><i class="fa fa-arrow-down"></i><input id="sort" type="radio" name="date" value="DESC"></label>';
        $filters_html .= '</div>';


        return $filters_html;
    endif;
}

function enqueue_prodcat_ajax_scripts()
{
    wp_register_script('prodcat-ajax-js', get_bloginfo('template_url') . '/assets/js/genre.js', array('jquery'), '', true);
    wp_localize_script('prodcat-ajax-js', 'ajax_prodcat_params', array('ajax_url' => admin_url('admin-ajax.php')));
    wp_enqueue_script('prodcat-ajax-js');
}

add_action('wp_enqueue_scripts', 'enqueue_prodcat_ajax_scripts');

//Add Ajax Actions
add_action('wp_ajax_prodcat_filter', 'ajax_prodcat_filter');
add_action('wp_ajax_nopriv_prodcat_filter', 'ajax_prodcat_filter');

//Construct Loop & Results
function ajax_prodcat_filter()
{
    $query_data = $_GET;
    $prodcat_terms = ($query_data['prodcats']) ? explode(',', $query_data['prodcats']) : false;
    $sort_terms = ($query_data['sort']) ? explode('.', $query_data['sort']) : false;
    $tax_query = ($prodcat_terms) ? array(array(
        'taxonomy' => 'prodcat',
        'field' => 'id',
        'terms' => $prodcat_terms
    )) : false;
    $search_value = ($query_data['search']) ? $query_data['search'] : false;
    $paged = (isset($query_data['paged'])) ? intval($query_data['paged']) : 1;
    $product_args = array(
        'post_type' => 'product',
        's' => $search_value,
        'posts_per_page' => 999999999,
        'tax_query' => $tax_query,
        'paged' => $paged,
        'orderby' => $sort_terms['0'],
        'order'   => $sort_terms['1'],

    );

    $product_loop = new WP_Query($product_args);

    if ($product_loop->have_posts()):
        while ($product_loop->have_posts()): $product_loop->the_post();
            get_template_part('template-parts/content-product');
        endwhile;

        echo '<div class="prodcat-filter-navigation">';
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $product_loop->max_num_pages
        ));
        echo '</div>';
    else:
        get_template_part('template-parts/content-none');
    endif;
    wp_reset_postdata();

    die();
}


function add_your_fields_meta_box()
{
    add_meta_box(
        'product_meta', // $id
        'О продукте', // $title
        'show_product_meta_box', // $callback
        'product', // $screen
        'side', // $context
        'core' // $priority
    );
}

add_action('add_meta_boxes', 'add_your_fields_meta_box');

function show_product_meta_box()
{
    global $post;
    $meta = get_post_custom($post->ID); ?>

    <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">

    <p>
        <label for="your_fields[text]">Стоимость р.</label>
        <br>
        <input name="price" value="<?php echo $meta["price"][0] ?>"
    </p>
    <p>
        <label for="your_fields[checkbox]">В наличии <input type="checkbox" name="avail" <?php
            if
            (isset($meta['avail']) && ($meta['avail'][0] == "on")):
                echo "checked";
            else : echo "unchecked";
            endif;
            ?>>
        </label>
    </p>

<?php }

add_action('save_post', 'save_details');
function save_details()
{
    global $post;

    update_post_meta($post->ID, "price", $_POST["price"]);
    update_post_meta($post->ID, "avail", $_POST["avail"]);
}

add_filter('excerpt_length', function () {
    return 20;
});