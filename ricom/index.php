<?php /* Template Name: Archive */ get_header(); ?>

<?php the_post(); ?>
<div class="wrapper product">
<main class="main">	
	<?php include locate_template('template-parts/unitech/breadcrumbs.php', false, false); ?>

	<div class="with_sidebar shell">
		<section class="with_sidebar__main">
			<img src="/wp-content/uploads/2020/01/gs1-1.jpg" alt="" />

			<section class="blog_list_1">
				<?php 
				$homePosts = new WP_Query(array(
				  'posts_per_page' => -1,
				  'post_type' => 'post',
				  ));
				while ( $homePosts->have_posts()) {
				  $homePosts->the_post(); ?>
				  <article class="item">
				  	<div class="l">
				  		<a href="<?php the_permalink(); ?>">
				  			<img src="<?php the_post_thumbnail_url('bogthumb'); ?>" alt="" />
				  		</a>
				  	</div><!-- /.l -->

				  	<div class="r">
				  		<h2>
				  			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				  		</h2>

				  		<p>
				  			<?php
							echo wp_trim_words( get_the_content(), 26, ' [...]' );
							?>
				  		</p>

				  		<a href="<?php the_permalink(); ?>" class="read_more"><?php _e('Read more', 'bultag') ?></a>
				  	</div><!-- /.r -->
				  </article><!-- /.item -->				  
				  <?php wp_reset_postdata(); } ?>  
			</section><!-- /.blog_list_1 -->
		</section><!-- /.with_sidebar__main -->

		<?php include locate_template('template-parts/unitech/sidebar.php', false, false); ?>
	</div><!-- /.with_sidebar -->
</main><!-- /.main -->
</div><!-- /.wrapper -->
<?php get_footer(); ?>