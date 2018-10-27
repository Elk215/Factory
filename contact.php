<?php /* 
Template Name: Contact
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

<section class="contact-section section-padding">
	<div class="container">
		<div class="section-title">
			<h2><span>Contact</span></h2>
		</div>
		<div class="row">
			<div class="col-md-6">
            <?php $idContact = get_page_by_title('Contact'); ?>
                <?php echo $idContact->post_content; ?>
			</div>
			<div class="col-md-6">
                <?php echo do_shortcode('[contact-form-7 id="6835" title="Contact"]'); ?>
			</div>
		</div>
		
	</div>	
</section>

<section class="contact-infos section-padding pt0">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="single-contact-info">
					<div class="icon-box">
						<div class="box">
							<i class="flaticon-placeholder"></i>
						</div>
					</div>
					<div class="text-box">
                        <h3>Address:</h3>
                        <?php while( have_rows('address', 'option') ): the_row(); ?>
                            <p><?php the_sub_field('address1', 'option'); ?> <?php the_sub_field('address2', 'option'); ?></p>
                        <?php endwhile; ?>
						
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="single-contact-info">
					<div class="icon-box">
						<div class="box">
							<i class="flaticon-technology"></i>
						</div>
					</div>
					<div class="text-box">
						<h3>Phone & Mail</h3>
						<p><?php the_field('phone', 'option'); ?> <?php the_field('email', 'option'); ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-0">
				<div class="single-contact-info">
					<div class="icon-box">
						<div class="box">
							<i class="flaticon-time"></i>
						</div>
					</div>
					<div class="text-box">
						<h3>Working Hours</h3>
						<p><?php the_field('workTime', 'option'); ?></p>
					</div>
				</div>
			</div>
		</div>
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