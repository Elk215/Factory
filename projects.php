<?php /* Template Name: Projects */ ?>

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
$idObj = get_category_by_slug('projects');
$id = $idObj->term_id;
$post = get_post($id);
if ( have_posts() ) : query_posts('cat=' . $id);?>
<section class="project-content section-padding">
	<div class="container">
		<div class="mixit-gallery">

			<ul class="gallery-filter list-inline text-center">
				<li class="filter" data-filter="all"><span>Show All</span></li>
				<?php
				$tags = get_tags(); ?>
				<?php if($tags): ?>
					<?php foreach($tags as $tag): ?>
						<li class="filter" data-filter=".<?php echo $tag->slug; ?>"><span><?php echo $tag->name; ?></span></li>
					<?php endforeach;?>
				<?php endif;?>
			</ul>
		
			<div class="row">
			<?php while (have_posts()) : the_post(); ?>
			<?php while(the_flexible_field("project")): ?>
			<?php if(get_row_layout() == "projects-short"): ?>
				
				<div class="col-md-4 mix col-sm-6 <?php
				$tags = wp_get_post_tags($post->ID);
				if($tags) {
					foreach($tags as $tag) {
						echo ' ' . $tag->slug;
					}
				}
				?>">
					<div class="single-project-item">
						<div class="img-box">
							<?php 
							$image = get_sub_field('project-short-img');
							if( !empty($image) ): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?> 
							<div class="overlay">
								<div class="box">
									<div class="top-box">
										<div class="title">
											<h3><?php the_title(); ?></h3>
										</div>
									</div>
									<div class="bottom-box">
										<ul>
											<li><a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a></li>
											<li><a href="<?php echo $image['url']; ?>" data-fancybox-group="simple-project" class="fancybox"><i class="fa fa-search-plus"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endwhile; ?>
			</div>
		

		</div>
	</div>
</section>
<?php endif; wp_reset_query(); ?>

<?php get_footer(); ?>      