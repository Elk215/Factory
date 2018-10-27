<?php get_header(); ?>

<?php 
$title = get_field('banner-title');
if( !empty($title) ): ?>                   
<section class="inner-banner" style="background-image: url(<?php the_field('banner-img'); ?>);">
	<div class="container text-center">
		<h2>Search Results</h2>
	</div>
</section>
<?php endif; ?>
<section class="news-content section-padding">
	<div class="container">
        <div class="row">
			<div class="col-md-12">
                <div class="single-sidebar-box category-widget">  
                <?php
                $s=get_search_query();
                $args = array(
                                's' =>$s
                            );
                    // The Query
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : ?>
                    <div class="title">
						<h3>Search Results for: <?php echo get_query_var('s');?></h3>
					</div>
                    <ul> 
                        <?php while ( $the_query->have_posts() ): ?>
                        <?php $the_query->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>

                         <?php endwhile; ?>
                    </ul>    
                    <?php else :  ?>
                    <div class="title">
						<h3>Nothing Found for: <?php echo get_query_var('s');?></h3>
					</div>

                <?php endif; ?>
                </div>
            </div>
		</div>
	</div>
</section>
<?php get_footer(); ?>