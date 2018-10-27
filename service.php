<?php /* 
Template Name: Service 
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

<section class="news-content section-padding single-service-page our-features in-wrapper no-container">
	<div class="container">
		<div class="row">			
			<div class="col-md-3">
				<?php
				$idObj = get_category_by_slug('services');
				$id = $idObj->term_id;
				$post = get_post($id);
				if ( have_posts() ) : query_posts(array('cat' => $id, 'orderby' => 'title', 'order' => 'ASC'));
				?>
				<div class="single-sidebar-box service-link-widget">
					<ul>
					<?php while (have_posts()) : the_post(); ?>
						<?php 
						$current_url = home_url( $wp->request ) . '/';
						$link = get_permalink();?>
						<?php if($current_url == $link): ?>
							<li class="active"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<? else: ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <? endif; ?>
					<? endwhile; ?>
					</ul>
				</div>
				<? endif; wp_reset_query(); ?>
				<div class="single-sidebar-box broucher-widgets">
					<a href="material.html#"><div class="icon-box">
						<img src="img/icon/wrench.png" alt="">
					</div>
					<div class="text-box">
						<h4>Download Brochures</h4>
					</div></a>
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
			<div class="col-md-9">
			<?php while(the_flexible_field("service")): ?>
			<?php if(get_row_layout() == "service-full"): ?>
				<?php 
				$image = get_sub_field('service-full-img');
				if( !empty($image) ): ?>
				<div class="img-box">
					<img src="<?php echo $image['url']; ?>" height="435" width="870" alt="<?php echo $image['alt']; ?>" />
				</div>				
				<?php endif; ?>
				
				<div class="content-box">
					<p><?php the_sub_field('service-full-text'); ?></p>
				</div>
			<?php endif; ?>
			<?php endwhile; ?>
			
				<?php
				$idObj = get_category_by_slug('features');
				$id = $idObj->term_id;
				$post = get_post($id);
				if ( have_posts() ) : query_posts('cat=' . $id);?>
				<div class="our-features-wrap">
					<div class="row">
						<?php while (have_posts()) : the_post(); ?>
						<div class="col-md-4 col-sm-6">
							<div class="single-our-feature">
								<div class="icon-box">
									<i class="<?php the_field('features-icon'); ?>"></i>
								</div>
								<h3><?php the_field('features-title'); ?></h3>
								<p><?php the_field('features-text'); ?></p>
							</div>
						</div>
						<? endwhile; ?>
					</div>
				</div>
				<? endif;  ?> 

				<?php
                $idObj = get_category_by_slug('secret');
                $id = $idObj->term_id;
                $post = get_post($id);
            	?>
				<div class="section-title">
					<h2><span><?php echo get_cat_name($id);?></span></h2>
				</div>
				<div class="accrodion-grp" data-grp-name="faq-accrodion">
				<?php
				if ( have_posts() ) : query_posts('cat=' . $id);
				while (have_posts()) : the_post(); ?>
					<div class="accrodion ">
						<div class="accrodion-title">
							<h4 class="clearfix"><span><?php the_title(); ?></span></h4>
						</div>
						<div class="accrodion-content">
						<?php the_content(); ?>
						</div>
					</div>
				<? endwhile; endif;  ?> 
				</div>
				
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>      