<?php /* Template Name: About */ ?>

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

<section class="about-section section-padding about-page">
	<div class="container">		
		<div class="row about-text-wrapper">
			<div class="col-lg-6 col-md-12">
				<div class="owl-carousel owl-theme">
				<?php 
				$slider = get_field('about-slayder');
				if( $slider ): ?>
				<?php foreach( $slider as $slide ): ?>
					<div class="item">
						<img src="<?php echo $slide['url']; ?>" alt="<?php echo $slide['alt']; ?>" />
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
				</div>
				<div class="img-box">
				<?php 
				$images = get_field('about-gallery');
				if( $images ): ?>
				<?php foreach( $images as $image ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="right-textbox">
				<?php $idContact = get_page_by_title('About'); ?>
					<h2><?php the_field('about-title'); ?></h2>
					<p><?php echo $idContact->post_content; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$idObj = get_category_by_slug('features');
$id = $idObj->term_id;
$post = get_post($id);
if ( have_posts() ) : query_posts('cat=' . $id);?>
<section class="our-features">
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
$idTeam = get_category_by_slug('team');
$id = $idTeam->term_id;
$post = get_post($id);
if ( have_posts() ) : query_posts('cat=' . $id);?>
<section class="our-team-member section-padding">
	<div class="container">
		<div class="section-title text-center">
			<h2><span><?php echo get_cat_name($id);?></span></h2>
		</div>
        <div class="row">
        <?php while (have_posts()) : the_post(); ?>
            <div class="col-md-3 col-sm-6">
                <div class="single-team-member">
                    <div class="img-box">
                    <?php 
                    $image = get_field('team-img');
                    if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive" />
                    <?php endif; ?> 
                        <div class="overlay">
                            <div class="box">
                                <div class="box-content">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <p class="position"><?php the_field('team-position'); ?></p>
                    <?php the_content(); ?>
                    <p class="info"><span>Tel: <?php the_field('team-phone'); ?></span> <br> <span>Mail: <?php the_field('team-email'); ?></span></p>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php 
$title = get_field('contact-text', 'option');
if( !empty($title) ): ?>                   
<section class="call-to-action no-margin">
	<div class="container">
		<p><?php the_field('contact-text', 'option'); ?><a href="<?php the_field('contact-link', 'option'); ?>">Request Quote</a></p>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>      