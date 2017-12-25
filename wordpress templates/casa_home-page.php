<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>

    <!--   Banners       -->
    <div class="row text-center activity_list">

        <div class="col-md-3">
            <h3>Patients</h3>
            <div class="hovereffect">
                <a href="clients"><img class="img-thumbnail"
                                       src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/patients.jpg"
                                       alt="patients"></a>
                <div class="overlay">
                    <a class="info" href="clients">Patients</a>
                </div>
            </div>
            <a href="clients" class="btn btn-default"><?php _e('Read more...', 'bootstrapcanvaswp'); ?></a>
        </div>
        <div class="col-md-3">
            <h3>Providers</h3>
            <div class="hovereffect">
                <a href="providers"><img class="img-thumbnail"
                                         src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/providers.jpg"
                                         alt="providers"></a>
                <div class="overlay">
                    <a class="info" href="providers">Providers</a>
                </div>
            </div>
            <a href="providers" class="btn btn-default"><?php _e('Read more...', 'bootstrapcanvaswp'); ?></a>
        </div>
        <div class="col-md-3">
            <h3>Volunteers</h3>
            <div class="hovereffect">
                <a href="volunteer"><img class="img-thumbnail"
                                         src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/volunteers.jpg"
                                         alt="volunteers"></a>
                <div class="overlay">
                    <a class="info" href="volunteer">Volunteers</a>
                </div>
            </div>
            <a href="volunteer" class="btn btn-default"><?php _e('Read more...', 'bootstrapcanvaswp'); ?></a>
        </div>
        <div class="col-md-3">
            <h3>Donate</h3>
            <div class="hovereffect">
                <a href="donate"><img class="img-thumbnail"
                                      src="<?= site_url(); ?>/wp-content/themes/casa_buen/images/donate.jpg"
                                      alt="donate"></a>
                <div class="overlay">
                    <a class="info" href="donate">Donate</a>
                </div>
            </div>
            <a href="donate" class="btn btn-default"><?php _e('Read more...', 'bootstrapcanvaswp'); ?></a>
        </div>
    </div>

    <!--   Latest news       -->
    <h2 class="blog-post-title">News & Events</h2>
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4
);
$tsmn = new WP_Query($args);
$i = 1;
if ($tsmn->have_posts()) {
    while ($tsmn->have_posts()) {
        $tsmn->the_post();
        $date_format = get_option('date_format');

        if ($i % 2 != 0) echo '<div class="row">';
        ?>
        <div class="col-sm-6 blog-main">
            <h2 class="blog-post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <p class="blog-post-meta"><span class="glyphicon glyphicon-calendar"></span> <?php the_time($date_format) ?>
                - <span class="glyphicon glyphicon-user"></span> <?php the_author_link() ?></p>

            <div class="hovereffect">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large', array('class' => 'img-thumbnail')); ?></a>
            </div>
            <?php $content = get_the_content();
            $content = preg_replace("/<img[^>]+\>/i", " ", $content);
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            echo mb_strimwidth($content, 0, 400, '...'); ?>
            <br><a href="<?php the_permalink() ?>"
                   class="btn btn-default"><?php _e('Read more...', 'bootstrapcanvaswp'); ?></a>
        </div>
        <?php
        if ($i % 2 == 0) echo '</div>';
        $i++;
    }
    if ($i % 2 == 0) echo '</div>';
}
?>
    <div class="row">

        <!--   Page content       -->
        <div class="col-sm-12 blog-main">

            <div class="panel panel-danger">
                <div class="panel-body">
                    <h3 class="panel-title"><?php _e('Mision', 'bootstrapcanvaswp'); ?></h3>
                </div>
                <div class="panel-heading">
                    <?php
                    if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.blog-main -->

        <?php //get_sidebar(); ?>

    </div><!-- /.row -->

<?php get_footer(); ?>