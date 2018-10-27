
	<footer class="footer">
		<div class="container">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer-widget about-widget">
					<a href="<?php  echo home_url(); ?>">
						<?php
						$image = get_field('bottomLogo', 'option');;
						if( !empty($image) ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" id="theme-logo" />
						<?php endif; ?>	
					</a>
					<p>Over 24 years experience and knowledge of international user standards, technological works changes and industrial systems, we are dedicated to provide the best and economical solutions to our valued customers.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer-widget link-widget">
					<div class="title">
						<h2>Quick Links</h2>
					</div>
					<?php wp_nav_menu( array(
                    'theme_location'  => 'Нижнее меню',
                    'menu'            => 'bottomMenu', 
					'container'       => 'ul', 
					'menu_class'      => 'links',
					'echo'            => true,
					'depth'           => 1,
                	) ); ?>
					<?php wp_nav_menu( array(
                    'theme_location'  => 'Нижнее меню ссылок',
                    'menu'            => 'bottomLinksMenu', 
					'container'       => 'ul', 
					'menu_class'      => 'links',
					'echo'            => true,
					'depth'           => 1,
                	) ); ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer-widget recent-news">
					<div class="title">
						<h2>Recent News</h2>
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
								<a href="single-news.html"><h4><?php the_title(); ?></h4></a>
								<a class="date" href="news.html#"><i class="fa fa-clock-o"></i> <?php the_time('j F, Y'); ?></a>
							</div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="footer-widget contact-widget">
					<div class="title">
						<h2>Contact us</h2>
					</div>
					<ul>
						<li>
							<div class="icon-box dtc">
								<i class="flaticon-placeholder"></i>
							</div>
							<div class="content dtc">
							<?php while( have_rows('address', 'option') ): the_row(); ?>
								<h3><?php the_sub_field('address1', 'option'); ?> <br><?php the_sub_field('address2', 'option'); ?></h3>
                        	<?php endwhile; ?>	
							</div>
						</li>
						<li>
							<div class="icon-box dtc">
								<i class="flaticon-technology"></i>
							</div>
							<div class="content dtc">
								<h3><?php the_field('phone', 'option'); ?></h3>
							</div>
						</li>
						<li>
							<div class="icon-box dtc">
								<i class="flaticon-interface"></i>
							</div>
							<div class="content dtc">
								<h3><?php the_field('email', 'option'); ?></h3>
							</div>
						</li>
						<li>
							<div class="icon-box dtc">
								<i class="flaticon-time"></i>
							</div>
							<div class="content dtc">
								<h3><?php the_field('workTime', 'option'); ?></h3>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<section class="bottom-footer">
		<div class="container">
			<div class="left-text pull-left">
				<p>© 2016 Factory Press Theme Developed by <a href="http://themeforest.net/user/template_path/">Template Path</a></p>
			</div>
			<div class="right-text pull-right">
				<ul class="social">
					<li><a href="index.html#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="index.html#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="index.html#"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="index.html#"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
		</div>
	</section>

	<!--Scroll to top-->
	<div class="scroll-to-top scroll-to-target" data-target=".top-bar"><span class="icon flaticon-arrows"></span></div>



	<!--Scroll to top-->
	<div class="scroll-to-top scroll-to-target" data-target=".top-bar"><span class="icon flaticon-arrows"></span></div>




</div>
<?php wp_footer(); ?>
</body>
</html>