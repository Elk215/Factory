<?php /* A Simple Category Template*/ ?>

<?php get_header(); ?>
<section class="news-content section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="single-blog-post">
                <div class="content-box">
                <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                <p><?php the_excerpt(); ?></p>
                </div>
            </div>

            <?php endwhile; ?>
            
            <?php else: ?>
            <div class="single-blog-post">
                <div class="content-box">
                <p>Sorry, no posts matched your criteria.</p>
                </div>
            </div>
            
            <?php endif; ?>
            </div>
		</div>
	</div>
</section>
<?php get_footer(); ?>