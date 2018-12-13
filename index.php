<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

get_header(); ?>


	<div class="container">
		<div class="row">

				<div class="col-md-12 wp-bp-content-width">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
					<div class="entry-content">
                        <a class="home btn-primary" href="http://phptest/product/"><span class="">К каталогу<i class="fa fa-share"></i></span></a>
                    </div>
					</main><!-- #main -->
				</div><!-- #primary -->

		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

<?php
get_footer();
