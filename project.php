<?php /* 
Template Name: Project 
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

<section class="single-project-content section-padding">
	<div class="container">
	<?php while(the_flexible_field("project")): ?>
	<?php if(get_row_layout() == "projects-full"): ?>

		<?php $images = get_sub_field('project-full-slider');
		if( $images ): ?>
		<div class="single-project-carousel owl-carousel owl-theme">
		<?php foreach( $images as $image ): ?>
			<div class="item">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			</div>
		<?php endforeach; ?>
		</div>
		<?php endif; ?>
        <div class="single-project-content">
			<?php
			$tags = wp_get_post_tags($post->ID);
				if($tags) {
				foreach($tags as $tag) {
					$result .= $tag->name . ' ';
				}
			}
			?>
			<div class="row">
				<div class="col-md-4">
					<div class="single-project-customer-info">
						<ul>
						<?php $term = get_sub_field('project-full-tags'); ?>
							<li><label>Customer&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;<?php the_sub_field('project-full-customer'); ?></li>
							<li><label>Live demo&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;<?php the_sub_field('project-full-link'); ?></li>
							<li><label>Category&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;<?php echo get_sub_field('project-full-category')['title']; ?></li>
							<li><label>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;<?php the_time('j F, Y'); ?></li>
							<li><label>Tags&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>&nbsp;&nbsp;&nbsp;<?php echo $result; ?></li>
						</ul>
					</div>
				</div>
				<div class="col-md-8">
					<h3><?php the_title(); ?></h3>
					<p><?php echo $post->post_content ?></p>
					<a href="<?php the_sub_field('project-full-link'); ?>" class="thm-btn">Launch Project</a>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php endwhile; ?>	
	</div>
</section>


<section class="section-padding project-content pt0">
	<div class="container">
		<div class="section-title ">
			<h2><span>Related Projects</span></h2>
        </div>
        <?php
		$idObj = get_category_by_slug('project');
		$id = $idObj->term_id;
		$post = get_post($id);?>
		
		<?php if ( have_posts() ) : query_posts('cat=' . $id);?>
        <div class="owl-carousel owl-theme related-project-carousel">
			<?php while (have_posts()) : the_post(); ?>
			<?php while(the_flexible_field("project")): ?>
			<?php if(get_row_layout() == "projects-short"): ?>
            <div class="item">
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
        <?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>      