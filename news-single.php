<?php /* 
Template Name: News single 
Template Post Type: post    
*/ ?>

<?php get_header(); ?>


<?php 
$title = get_field('banner-title');
if( !empty($title) ): ?>                   
<section class="inner-banner" style="background-image: url(<?php the_field('banner-img'); ?>);">
	<div class="container text-center">
		<h2><?php the_field('banner-title'); ?></h2>
	</div>
</section>
<?php endif; ?>

<?php 
if( !is_front_page() ): ?> 
<section class="bread-cumb">
	<div class="container text-center">
	<ul>
		<?php echo get_breadcrumbs(); ?>
	</ul>
	</div>
</section>
<?php endif; ?>

<section class="news-content section-padding single-news-page">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="single-blog-post">
                    <?php 
                    $image = get_field('news-img');
                    if( !empty($image) ): ?>
                    <div class="img-box">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                        
                    <?php endif; ?> 
					<div class="content-box">
                        <h3><?php the_title(); ?></h3>
                        <?php
                        $tags = wp_get_post_tags($post->ID);
                            if($tags) {
                            foreach($tags as $tag) {
                                $result .= $tag->name . ', ';
                            }
                        }
                        ?>
						<ul class="content-box-list">
							<li><a href="news.html#"><i class="fa fa-clock-o"></i> <?php the_time('j F, Y'); ?></a></li>
							<li><a href="news.html#"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
							<li><a href="news.html#"><i class="fa fa-tags"></i> <?php echo $result; ?></a></li>
							<li><a href="news.html#"><i class="fa fa-comment-o"></i> <?php comments_number( '0 Comment', 'Comment', '% Comments' ); ?></a></li>
						</ul>
						<?php the_content(); ?>
						
						<div class="bottom-box clearfix">
							<h3 class="pull-left">Did You Like This Post? Share it :</h3>
							<div class="share-box pull-right">
								<ul>
									<li><a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="comment-box">
						<?php if ( comments_open() || get_comments_number() ) {
							comments_template();
						}?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="single-sidebar-box search-widget">
					<?php get_search_form(); ?>
				</div>
				<div class="single-sidebar-box category-widget">
					<div class="title">
						<h3>CATEGORIES</h3>
					</div>
					<ul>
                    <?php
                    $tags = get_tags($post->ID);
                        if($tags): ?>
                        <?php foreach($tags as $tag): ?>
                            <li><a href="/"><?php echo $tag->name; ?></a></li>
                         <?php endforeach;?>
                    <?php endif;?>
					</ul>
				</div>
				
				<div class="single-sidebar-box recent-news-widget">
					<div class="title">
						<h3>Recent News</h3>
                    </div>
                    <?php
					
                    $idObj = get_category_by_slug('news');
                    $id = $idObj->term_id;
					$post = get_post($id);
                    if ( have_posts() ) : query_posts(array('cat' => $id,'posts_per_page' => 3));?>
					<ul>
                    <?php while (have_posts()) : the_post(); ?>
						<li>
                            <?php 
                            $image = get_field('news-img');
                            if( !empty($image) ): ?>
                            <div class="img-box dtc">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                                
                            <?php endif; ?> 
							<div class="content-box dtc">
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
								<a class="date" href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i> <?php the_time('j F, Y'); ?></a>
							</div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
					<?php endif; ?>
				</div>
				<?php
				$idObj = get_category_by_slug('reviews');
				$id = $idObj->term_id;
				$post = get_post($id);
				if ( have_posts() ) : query_posts('cat=' . $id);
				?>
				<div class="single-sidebar-box testimonials-widget">
					<div class="title">
						<h3>Testimonals</h3>
					</div>
					<div class="testimonial-carousel owl-theme owl-carousel">
					<?php while (have_posts()) : the_post(); ?>
						<div class="item">
							<div class="single-testi-carousel">
								<div class="box">
								<?php the_content(); ?>
									<span><b><?php the_title(); ?></b> - <?php the_field('reviews-position'); ?></span>
								</div>
								<?php 
								$image = get_field('reviews-ava');
								if( !empty($image) ): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<?php endif; ?>
							</div>
						</div>
					<? endwhile; ?>
					</div>
				</div>
				<? endif; wp_reset_query(); ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>