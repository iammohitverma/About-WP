<?php
//  for front page 

// include header using wp prebuilt function
get_header();
?>




<div class="home-page">
    <div class="container-fluid px-0">
        <div class="inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-page-content">
                        <!-- Hero Area start -->
                        <section class="hero-area">
                            <div class="inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="hero-wrap">
                                                <h1 class="hero-title">
                                                    ALL THE BEST STORIES
                                                </h1>
                                                <div class="hero-slider">
                                                    <div class="owl-carousel owl-theme">
                                                        <?php
                                                            $args = array(
                                                            'post_type'=> 'post',
                                                            'orderby'    => 'ID',
                                                            'post_status' => 'publish',
                                                            'order'    => 'DESC',
                                                            'offset'=> 5,
                                                            'posts_per_page' => 6 // this will retrive all the post that is published 
                                                            );
                                                            
                                                        $result = new WP_Query( $args );
                                                        if ( $result-> have_posts() ) : ?>
                                                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                                                            <div class="item">
                                                                <div class="image-wrap">
                                                                    <figure>
                                                                        <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                                                                    </figure>
                                                                </div>
                                                                <div class="post_content">
                                                                    <div class="inner">
                                                                        <div class="category">
                                                                            <?php
                                                                                $categories = get_the_category();
                                                                                if ( ! empty( $categories ) ) {
                                                                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                        <h2 class="post-title animate__animated animate__bounce">
                                                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                                        </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endwhile; ?>
                                                        <?php endif; wp_reset_postdata(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- whats new section -->
                        <section class="sec-t-pad">
                            <div class="container">
                                <div class="sec-title">
                                    <h2>WHAT’S NEW AND FRESH</h2>
                                </div>
                                <div class="row">
                                    <?php
                                        $whats_new_posts_args = array(
                                        'post_type'=> 'post',
                                        'orderby'    => 'ID',
                                        'post_status' => 'publish',
                                        'order'    => 'DESC',
                                        'offset'=> 7,
                                        'posts_per_page' => 6 // this will retrive all the post that is published 
                                        );
                                        
                                    $whats_new_posts_result = new WP_Query( $whats_new_posts_args );
                                    if ( $whats_new_posts_result-> have_posts() ) : ?>
                                    <?php while ( $whats_new_posts_result->have_posts() ) : $whats_new_posts_result->the_post(); ?>
                                        <div class="col-lg-4 col-md-6">
                                            <article class="post_article">
                                                <div class="post_wrap">
                                                    <div class="post_img">
                                                        <figure>
                                                            <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                                                        </figure>
                                                    </div>
                                                    <div class="post_content">
                                                        <div class="post_category">
                                                            <?php
                                                                $categories = get_the_category();
                                                                if ( ! empty( $categories ) ) {
                                                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="post_title">
                                                            <h3><?php workreap_get_post_title($post->ID); ?></h3>
                                                        </div>
                                                        <div class="post_date">
                                                            <?php workreap_get_post_date($post->ID);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>   
                                    <?php endwhile; ?>
                                    <?php endif; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </section>

                        <!-- Full width post -->
                        <section class="full_width_post sec-t-pad">
                            <div class="inner">
                                <div class="container">
                                    <div class="sec-title">
                                        <h2>DON'T MISS OUT ON THIS</h2>
                                    </div>
                                        <div class="post-wrap">
                                            <div class="row no-gutters gx-0">                                       
                                                <?php
                                                    $query = new WP_Query( array('category_name' =>'global-networking','posts_per_page' => 1) ); 
                                                    while($query->have_posts()) : $query->the_post();
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="post-image">
                                                        <figure>
                                                            <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="post_content">
                                                        <div class="inner">
                                                            <div class="category">
                                                                <?php
                                                                    $categories = get_the_category();
                                                                    if ( ! empty( $categories ) ) {
                                                                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                                    }
                                                                ?>
                                                            </div>
                                                            <h2 class="post-title">
                                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a>                                                            
                                                            </h2>
                                                            <div class="description">
                                                            <?php the_excerpt()?>
                                                            </div>
                                                            <div class="post_date">
                                                                <span> <?php echo get_the_date('F d, Y') ?> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_postdata(); ?>
                                            </div>
                                        </div>

                                        <!-- Advertise Banner -->
                                        <div class="advertise_banner">
                                            <div class="inner">
                                                <figure>
                                                    <img src="https://hireblog.tmdemo.in/wp-content/uploads/2022/02/addbanner.png">
                                                </figure>
                                            </div>
                                        </div>

                                        <div class="post-wrap">
                                            <div class="row no-gutters gx-0">                                       
                                                <?php
                                                    $query = new WP_Query( array('category_name' =>'php-development','posts_per_page' => 1) ); 
                                                    while($query->have_posts()) : $query->the_post();
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="post-image">
                                                        <figure>
                                                            <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="post_content">
                                                        <div class="inner">
                                                            <div class="category">
                                                                <?php
                                                                    $categories = get_the_category();
                                                                    if ( ! empty( $categories ) ) {
                                                                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                                    }
                                                                ?>
                                                            </div>
                                                            <h2 class="post-title">
                                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title();?></a>                                                            
                                                            </h2>
                                                            <div class="description">
                                                            <?php the_excerpt()?>
                                                            </div>
                                                            <div class="post_date">
                                                                <span> <?php echo get_the_date('F d, Y') ?> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endwhile; ?>
                                                <?php wp_reset_postdata(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <!-- LATEST & TRENDING -->
                        <section class="sec-pad">
                            <div class="container">
                                <div class="sec-title">
                                    <h2>LATEST & TRENDING</h2>
                                </div>
                                <div class="row">
                                    <?php
                                        $whats_new_posts_args = array(
                                        'post_type'=> 'post',
                                        'orderby'    => 'ID',
                                        'post_status' => 'publish',
                                        'order'    => 'DESC',
                                        'offset'=> 7,
                                        'posts_per_page' => 6 // this will retrive all the post that is published 
                                        );
                                        
                                    $whats_new_posts_result = new WP_Query( $whats_new_posts_args );
                                    if ( $whats_new_posts_result-> have_posts() ) : ?>
                                    <?php while ( $whats_new_posts_result->have_posts() ) : $whats_new_posts_result->the_post(); ?>
                                        <div class="col-lg-4 col-md-6">
                                            <article class="post_article">
                                                <div class="post_wrap">
                                                    <div class="post_img">
                                                        <figure>
                                                            <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="">
                                                        </figure>
                                                    </div>
                                                    <div class="post_content">
                                                        <div class="post_category">
                                                            <?php
                                                                $categories = get_the_category();
                                                                if ( ! empty( $categories ) ) {
                                                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="post_title">
                                                            <h3><?php workreap_get_post_title($post->ID); ?></h3>
                                                        </div>
                                                        <div class="post_date">
                                                            <?php workreap_get_post_date($post->ID);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>   
                                    <?php endwhile; ?>
                                    <?php endif; wp_reset_postdata(); ?>
                                </div>
                                <!-- Advertise Banner -->
                                <div class="advertise_banner">
                                    <div class="inner">
                                        <figure>
                                            <img src="https://hireblog.tmdemo.in/wp-content/uploads/2022/02/addbanner-2.png">
                                        </figure>
                                    </div>
                                </div>      
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery('.owl-carousel').owlCarousel({
            loop: false,
            margin: 0,
            responsiveClass: true,
            nav: false,
            dots: true,
            items: 1,
            autoHeight: true,
        });
    });
</script>

<?php get_footer();?>