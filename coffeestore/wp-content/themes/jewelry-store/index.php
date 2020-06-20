<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

    <?php get_template_part('section-all/section-breadcrumb'); ?>
    
    <div id="main" class="main main-content">
        <div class="">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-<?php if(!is_active_sidebar('sidebar-1')){ echo '12'; }else{ echo '8'; } ?> primary">
                        <?php
                        
                        if ( have_posts() ) :                      
                            
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content/post/content', get_post_format() );
                                
                            endwhile;
                            
                            the_posts_pagination( array(
                                    'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                                    'next_text' => '<i class="fa fa-angle-double-right"></i>',
                                ) );
                        
                        else :
                            
                            get_template_part( 'template-parts/content/post/content', 'none' );
                            
                        endif;
                        ?>                        
                    </div><!-- end .col-md-8 -->

                    <?php get_sidebar(); ?>                
                                            
                </div>
            </div>
        </div>
    </div><!-- end .jsgroup-blog -->
    
</div><!-- end .site -->

<?php get_footer(); ?>