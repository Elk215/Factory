<?php get_header(); ?>

<?php if( have_rows('slayder', 'option') ): ?>
	<section class="rev_slider_wrapper ">
		<div id="slider1" class="rev_slider"  data-version="5.0">
			<ul>
			<?php while( have_rows('slayder', 'option') ): the_row(); ?>
			<li data-transition="slidingoverlayleft">
					<img src="<?php the_sub_field('slayder-img', 'option'); ?>"  alt=""  width="1920" height="705" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="2">

					<div class="tp-caption sfl tp-resizeme factory-caption-h1" 
						data-x="left" data-hoffset="0" 
						data-y="top" data-voffset="90" 
						data-whitespace="nowrap"
						data-transform_idle="o:1;" 
						data-transform_in="o:0" 
						data-transform_out="o:0" 
						data-start="500">
						<?php the_sub_field('slayder-title', 'option'); ?> 
					</div>
					<div class="tp-caption sfl tp-resizeme factory-caption-p" 
						data-x="left" data-hoffset="0" 
						data-y="top" data-voffset="255" 
						data-whitespace="nowrap"
						data-transform_idle="o:1;" 
						data-transform_in="o:0" 
						data-transform_out="o:0" 
						data-start="500">
						<?php the_sub_field('slayder-subtitle', 'option'); ?>
					</div>
					<?php if( have_rows('slayder-btn', 'option') ): ?>
						<?php while( have_rows('slayder-btn', 'option') ): the_row(); ?>
						<div class="tp-caption sfl tp-resizeme factory-caption-p" 
							data-x="left" data-hoffset="0" 
							data-y="top" data-voffset="355 " 
							data-whitespace="nowrap"
							data-transform_idle="o:1;" 
							data-transform_in="o:0" 
							data-transform_out="o:0" 
							data-start="500">
							<a href="<?php the_sub_field('slayder-btn-links', 'option'); ?>" class="<?php the_sub_field('slayder-btn-color', 'option'); ?>"><?php the_sub_field('slayder-btn-text', 'option'); ?></a>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>

<section class="call-to-action">
	<div class="container">
		<p><?php the_field('contact-text', 'option'); ?><a href="<?php the_field('contact-link', 'option'); ?>">Request Quote</a></p>
	</div>
</section>
<?php wp_reset_query(); ?>


<?php
$idObj = get_category_by_slug('services');
$id = $idObj->term_id;
$post = get_post($id);
if ( have_posts() ) : query_posts(array('cat' => $id,'posts_per_page' => 3));?>
<section class="our-services section-padding">
	<div class="container">
		<div class="row">
		<?php while (have_posts()) : the_post(); ?>
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
		<? endwhile; ?>
		</div>
	</div>
</section>
<? endif; wp_reset_query(); ?> 

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

<?php $idAbout = get_page_by_title('About'); ?>
<section class="about-section section-padding">
	<div class="container">
		<div class="section-title text-center">
			<h2><span><?php echo $idAbout->post_title; ?></span></h2>
		</div>
		<div class="row about-text-wrapper">
			<div class="col-lg-6  col-md-12">
				<div class="img-box">
				<?php 
				$images = get_field('about-gallery', $idAbout );
				
				if( $images ): ?>
				<?php foreach( $images as $image ): ?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endforeach; ?>
				<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="right-textbox">
					<p><?php echo $idAbout->post_content; ?></p>
				</div>
			</div>
		</div>
		<?php
		$idObj = get_category_by_slug('team');
		$id = $idObj->term_id;
		$post = get_post($id);
		if ( have_posts() ) : query_posts('cat=' . $id);?>
		<div class="row">
			<div class="team-wrapper clearfix">
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-3 col-sm-6">
					<div class="single-team-member">
						<div class="img-box">
						<?php 
						$image = get_field('team-img');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
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
		<?php endif; wp_reset_query(); ?>
	</div>
</section>

<?php 
$field = get_field('cta-text', 'option');
if( !empty($field) ): ?>                   
<section class="call-to-action-home">
	<div class="container">
		<h3><?php the_field('cta-text', 'option'); ?></h3>
	</div>
</section>
<?php endif; ?>



<section class="faq-blog-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<?php
                $idObj = get_category_by_slug('faq');
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
					<? endwhile; endif; wp_reset_query(); ?>  
				</div>

			</div>
			<div class="col-lg-6 col-md-12">
				<div class="section-title">
					<h2><span>Latest News</span></h2>
				</div>
				<?php
                    $idObj = get_category_by_slug('news');
                    $id = $idObj->term_id;
					$post = get_post($id);
					?>
				<?php if ( have_posts() ) : query_posts(array('cat' => $id,'posts_per_page' => 2));?>
				<?php while (have_posts()) : the_post(); ?>
				<div class="single-blog-post">
					<div class="img-box">
						<?php 
						$image = get_field('news-img');
						if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?> 
						<div class="overlay">
							<div class="box">
								<div class="box-content">
									<a href="<?php the_permalink(); ?>"><span>Read More <i class="fa fa-angle-double-right"></i></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="content-box">
						<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
						<ul>
							<li><a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i> <?php the_time('j F, Y'); ?></a></li>
							<li><a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o"></i> <?php comments_number( '0 Comment', 'Comment', '% Comments' ); ?></a></li>
						</ul>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php
	$idObj = get_category_by_slug('reviews');
	$id = $idObj->term_id;
	$post = get_post($id);
	if ( have_posts() ) : query_posts('cat=' . $id);
	?>
<section class="testimonials-section section-padding">
	<div class="container">
		<div class="section-title">
			<h2><span><?php echo get_cat_name($id);?></span></h2>
		</div>
		<div class="owl-theme owl-carousel">
			<?php while (have_posts()) : the_post(); ?>
			<div class="item">
				<div class="single-testimonials">
					<div class="review-text">
					<?php the_content(); ?>
					</div>
					<div class="info-box">
						<div class="img-box">
							<?php 
                            $image = get_field('reviews-ava');
                            if( !empty($image) ): ?>
                              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
						</div>
						<div class="content-box">
							<h3><span class="name"><?php the_title(); ?></span> - <?php the_field('reviews-position'); ?> </h3>
							<ul class="star">
							<?php 
                            $value = get_field('reviews-value');
                            ?>
							<?php while ($value >= 1 ): ?>
								<li><i class="fa fa-star"></i></li>
								<? $value--; endwhile; ?>     
							</ul>
						</div>
					</div>
				</div>
			</div>
			<? endwhile; ?>
		</div>
	</div>
</section>
<? endif; wp_reset_query(); ?>

<section class="contact-section section-padding">
	<div class="container">
		<?php $idContact = get_page_by_title('Contact'); ?>
		<div class="section-title">
			<h2><span><?php echo $idContact->post_title; ?></span></h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p><?php echo $idContact->post_content; ?></p>
			</div>
			<div class="col-md-6">
				<?php echo do_shortcode('[contact-form-7 id="6835" title="Contact"]'); ?>
			</div>
		</div>
		<?php $idObj = get_category_by_slug('clients');
		$id = $idObj->term_id;
		$post = get_post($id);
		if ( have_posts() ) : query_posts('cat=' . $id);
		?>
		<div class="client-carousel owl-carousel owl-theme">
		<?php while (have_posts()) : the_post(); ?>
			<div class="item">
			<?php 
			$image = get_field('clients-img');
			if( !empty($image) ): ?>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<?php endif; ?>
			</div>
		<? endwhile; ?> 
		</div>
		<? endif; wp_reset_query(); ?> 
	</div>	
</section>

<?php $location = get_field('map', 'option');
$marker = get_field('map_marker', 'option');
	if( !empty($location) ):?>
<section class="home-google-map">
	<div 
		class="google-map" 
		id="contact-google-map" 
		data-map-lat="<?php echo $location['lat']; ?>" 
		data-map-lng="<?php echo $location['lng']; ?>" 
		data-icon-path="<?php echo $marker; ?>"
		data-map-title="<?php echo $location['address']; ?>"
		data-map-zoom="<?php echo $location['zoom']; ?>" >
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>      