<!-- Block name: Post Slider -->
<section class="post-slider splide" aria-label="Splide Basic HTML Example">
    <?php
    // Check rows exists.
    if (have_rows('carousel_posts')): ?>

        <div class="splide__track">
            <div class="post__grid splide__list">
                <?php
                while (have_rows('carousel_posts')) : the_row();
                    $post_object = get_sub_field('post');

                    if ($post_object) :
                        // Setup post data
                        $post_id = $post_object->ID;
                        $title   = get_the_title($post_id);
                        $excerpt = wp_trim_words(get_the_excerpt($post_id), 20, '...');
                        $image   = get_the_post_thumbnail_url($post_id, 'medium');
                        $link    = get_permalink($post_id);
                ?>
                        <div class="post splide__slide">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="post__img">
                            <h3 class="post__title">
                                <a href="<?php echo esc_url($link); ?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            </h3>
                            <p class="post__excerpt">
                                <?php echo esc_html($excerpt); ?>
                            </p>
                        </div>

                <?php endif;
                endwhile; ?>
            </div>
        </div>
    <?php else : ?>
        <div class="block-empty">
            <p>This block is currently empty, please update via block settings in sidebar</p>
        </div>
    <?php
    endif;
    ?>

</section>