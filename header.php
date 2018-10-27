<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FactoryPress</title>

	<!-- mobile responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">


  <?php wp_head(); ?>
</head>
<body>

	<div class="boxed_wrapper">

<section class="top-bar">
	<div class="container">

		<div class="top-bar-right pull-right">			
			<div class="top-info">
				<ul>
					<li><span>No1 :</span> World’s Leading Industrial Solution Provider USA</li>
					<li><i class="flaticon-interface"></i> 
					<?php the_field('email', 'option'); ?>
				</li>
				</ul>
			</div>
			<div class="social">
				<ul>
					<li><a href="index.html#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="index.html#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="index.html#"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="index.html#"><i class="fa fa-youtube"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<header class="header">
	<div class="container">
		<div class="logo pull-left">
			<a href="<?php  echo home_url(); ?>">
			<?php
			$image1 = get_field('topLogo', 'option');;
			if( !empty($image1) ): ?>
			<img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" id="theme-logo" />
			<?php endif; ?>	
			</a>
		</div>
		<div class="header-right pull-right">
			<div class="single-header-right">
				<div class="icon-box">
					<i class="flaticon-placeholder"></i>
				</div>
				<div class="content-box">
				<?php while( have_rows('address', 'option') ): the_row(); ?>
					<b><?php the_sub_field('address1', 'option'); ?></b>
					<p><?php the_sub_field('address2', 'option'); ?></p>
				<?php endwhile; ?>	
				</div>
			</div>
			<div class="single-header-right">
				<div class="icon-box">
					<i class="flaticon-technology"></i>
				</div>
				<div class="content-box">
					<b><?php the_field('phone', 'option'); ?></b>
					<p>Troll Free Number</p>
				</div>
			</div>
			<div class="single-header-right">
				<a href="index.html#" data-toggle="tooltip" data-placement="top" title="Download" class="icon-btn"><i class="flaticon-cloud"></i></a>
				<button class="thm-btn"><i class="fa fa-share"></i> get a Quote</button>
			</div>
		</div>
	</div>
</header>


<section class="mainmenu-wrapper stricky">
	<div class="container">
		<nav class="mainmenu-holder pull-left">
			<div class="nav-header">
				<?php wp_nav_menu( array(
				'theme_location'  => 'Верхнее меню',
				'menu'            => 'topMenu', 
				'container'       => 'ul', 
				'menu_class'      => 'navigation', 
				'echo'            => true,
				'walker'          => new magomra_walker_nav_menu
				
				) );?>
			</div>
			<div class="nav-footer hidden-lg">
				<ul>
					<li><button class="menu-expander"><i class="fa fa-list-ul"></i></button></li>
				</ul>
			</div>
		</nav>
		<div class="search-box pull-right">
		<?php get_search_form(); ?>
		</div>
	</div>
</section>      