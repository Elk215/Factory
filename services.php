<?php /* Template Name: Services */ ?>

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

<?php
$idObj = get_category_by_slug('features');
$id = $idObj->term_id;
$post = get_post($id);
if ( have_posts() ) : query_posts('cat=' . $id);?>
<section class="our-features in-wrapper section-padding">
	<div class="container">
		<div class="row">
			<?php while (have_posts()) : the_post(); ?>
			<div class="col-md-4">
				<div class="single-our-feature">
					<div class="overlay" style="background-image: url(<?php the_field('features-img'); ?>);">
						<div class="box">
							<div class="box-content">
								<a href="<?php the_field('features-link'); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
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
</section>
<? endif; wp_reset_query(); ?> 

<?php
$idObj = get_category_by_slug('services');
$id = $idObj->term_id;
$i = 1;
$count = get_category($id)->count; 
if ( have_posts($id) ) : ?>
<section class="our-services section-padding service-page pt0">
	<div class="container">
		<div class="section-title text-center">
			<h2><span><?php echo get_cat_name($id);?></span></h2>
		</div>
		<div class="row">
		<?php if ( have_posts() ) : query_posts(array('cat' => $id, 'offset' => 3));?>
		<?php while ( have_posts()) : the_post(); ?>
			<div class="col-md-4 col-sm-6">
				<div class="single-our-service">
					<div class="img-box">
						<?php while(the_flexible_field("service")): ?>
						<?php if(get_row_layout() == "service-short"): ?>
						<?php 
						$image = get_sub_field('service-short-img');
						if( !empty($image) ): ?>
						<div class="img-box">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>				
						<?php endif; ?>
						<?php endif; ?>
						<?php endwhile; ?>
						<div class="overlay">
							<div class="box">
								<div class="box-content">
									<a href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<?php the_content(); ?>
				</div>
			</div>
		<? endwhile; endif; wp_reset_query(); ?>
<? endif; ?> 

<?php
$idObj = get_category_by_slug('services');
$id = $idObj->term_id;
$i = 1;
$count = get_category($id)->count; 
if ( have_posts($id) ) : ?>
		<?php if ( $count >= 3 && have_posts() ) : query_posts(array('cat' => $id));?>
		<?php while ( $i <= 3 && have_posts()) : the_post(); ?>
			<div class="col-md-4 has-divider col-sm-6">
				<div class="single-our-service">
					<div class="img-box">
						<?php while(the_flexible_field("service")): ?>
						<?php if(get_row_layout() == "service-short"): ?>
						<?php 
						$image = get_sub_field('service-short-img');
						if( !empty($image) ): ?>
						<div class="img-box">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>				
						<?php endif; ?>
						<?php endif; ?>
						<?php endwhile; ?>
						<div class="overlay">
							<div class="box">
								<div class="box-content">
									<a href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<?php the_content(); ?>
				</div>
			</div>
		<? $i++; endwhile;  ?>
		<?php elseif(true): ?>
		<?php while ( have_posts()) : the_post(); ?>
			<div class="col-md-4  col-sm-6">
				<div class="single-our-service">
					<div class="img-box">
						<?php while(the_flexible_field("service")): ?>
						<?php if(get_row_layout() == "service-short"): ?>
						<?php 
						$image = get_sub_field('service-short-img');
						if( !empty($image) ): ?>
						<div class="img-box">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>				
						<?php endif; ?>
						<?php endif; ?>
						<?php endwhile; ?>
						<div class="overlay">
							<div class="box">
								<div class="box-content">
									<a href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
					<?php the_content(); ?>
				</div>
			</div>
		<? endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
</section>
<? endif; ?>



<?php get_footer(); ?>      