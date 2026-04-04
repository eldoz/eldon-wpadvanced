<?php


get_header(); 




?>
<section class="news-hero py-5">
    <div class="container">
        <div class="hero-card p-4 text-white rounded-lg shadow-lg">
            <?php
                $hero_args = array('post_type'=>'post','posts_per_page'=>1,'category_name'=>'lajme');
                $hero = new WP_Query($hero_args);
                if($hero->have_posts()): $hero->the_post();
            ?>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="display-4 hero-title"><?php the_title(); ?></h1>
                        <p class="lead hero-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        <a class="btn btn-light btn-lg" href="<?php the_permalink(); ?>">Lexo më shumë</a>
                    </div>
                    <div class="col-md-6 hero-media">
                        <?php if(has_post_thumbnail()): the_post_thumbnail('large', ['class'=>'img-fluid rounded']); else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/hero-placeholder.jpg" class="img-fluid rounded" alt="hero"><?php endif; ?>
                    </div>
                </div>
            <?php wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<section class="news-grid py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Lajmet</h2>
            <p class="text-muted small mb-0">Të funditet nga kategoria Lajme</p>
        </div>

        <div class="row">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'category_name' => 'lajme'
            );
            $query = new WP_Query($args);

            if($query->have_posts()):
                while($query->have_posts()): $query->the_post();
            ?>
                <article class="col-md-4 mb-4">
                    <div class="card news-card h-100 shadow-sm overflow-hidden">
                        <div class="card-media">
                            <a href="<?php the_permalink(); ?>">
                                <?php if(has_post_thumbnail()): the_post_thumbnail('medium_large', ['class'=>'card-img-top']); else: ?><img src="<?php echo get_template_directory_uri(); ?>/assets/post-placeholder.jpg" class="card-img-top" alt="post"><?php endif; ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="card-text text-muted small mb-2"><?php echo get_the_date(); ?> &middot; <?php echo get_comments_number(); ?> komente</p>
                            <p class="mb-0"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0 p-3">
                            <a href="<?php the_permalink(); ?>" class="read-more">Lexo</a>
                        </div>
                    </div>
                </article>
            <?php
                endwhile;
            else:
                echo '<p>nuk ka lajme.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer();?>