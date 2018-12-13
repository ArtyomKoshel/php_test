<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>
<?php if (is_singular()): ?>
    <div class="prod_singl">
        <div class="row">
            <div class="col-md-5">
                <div class="img_singl_prod">
                    <?php wp_bootstrap_4_post_thumbnail(); ?>
                </div>
            </div>
            <div class="col-md-7">
                <div class="desc_side_prod">
                    <?php the_title('<h1 class="entry-title card-title h2">', '</h1>'); ?>
                    <div class="avail_prod">
                        <?php
                        $id = get_the_ID();
                        $meta = get_post_meta($id);
                        if ($meta['avail'][0] == "on"):
                            echo '<div class="avl">Есть в наличии <i class="fa fa-check"></i></div>';
                        else :
                            echo '<div class="not_avl">Нет в наличии <i class="fa fa-times"></i></div>';
                        endif;
                        ?>
                    </div>
                    <div class="price">
                        Цена: <?php echo $meta['price'][0].' руб.' ?>
                    </div>
                    <div class="excerp_prod">
                        <?php

                        the_excerpt();
                        wp_bootstrap_4_posted_on();
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="description">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <a class="home btn-primary" href="http://phptest/product/"><span>К каталогу<i class="fa fa-share"></i></span></a>
    </div>

<?php else: ?>

    <div class="col-md-3 pb-4">
        <div class="card h-100" id="post-<?php the_ID(); ?>" <?php post_class('card_prod'); ?>>
            <?php the_post_thumbnail('full', array('class' => "card-img-top")); ?>
            <div class="card-body d-flex flex-column">
                <?php
                the_title('<h2 class="entry-title card-title h3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark" class="text-dark">', '</a></h2>');
                ?>

                <?php htmlspecialchars(the_excerpt());
                ?>
                <?php
                $id = get_the_ID();
                $meta = get_post_meta($id);
                ?>
                <div class="price">
                    Цена: <?php echo $meta['price'][0].' руб.' ?>
                </div>
                <div class="more_detail justify-content-center mt-auto">
                    <a href="<?php echo esc_url(get_permalink()); ?>"
                       class="btn btn-primary btn-sm"><?php esc_html_e('Перейти к товару'); ?>
                        <small class="oi align-self-center oi-chevron-right ml-1"></small>
                    </a>
                </div>


            </div>
            <div class="card-footer">
                <small class="text-muted"><?php wp_bootstrap_4_posted_on(); ?></small>
            </div>
        </div>

    </div><!-- #post<?php the_ID(); ?> --!>
<?php endif; ?>



