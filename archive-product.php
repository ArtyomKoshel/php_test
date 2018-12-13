<?php
/**
 * The template for displaying archive-product pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>


    <div class="container-fluid">
    <div class="row">

    <div class="col-md-9 wp-bp-content-width">

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="loader" id="loader"></div>
                <div id="prodcat-results">

                </div>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
    <!-- /.col-md-8 -->

    <div class="col-md-3 wp-sidebar-product-archive">
        <form id="prodcat-search">
            <input type="text" class="text-search" placeholder="Найти товар..." />
        </form>

        <div id="prodcat-filter">
            <?php echo get_prodcat_filters(); ?>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container -->

<?php
get_footer();

