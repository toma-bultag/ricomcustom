<?php /* Template Name: Post */ get_header(); ?>

<?php the_post(); ?>
<div class="wrapper product">
<main class="main">	
	<?php include locate_template('template-parts/unitech/breadcrumbs.php', false, false); ?>

	<div class="with_sidebar shell">
		<section class="with_sidebar__main">
			<h1 class="title"><?php the_title(); ?></h1><!-- /.title -->

			<?php the_content(); ?>
		</section><!-- /.with_sidebar__main -->

		<?php include locate_template('template-parts/unitech/sidebar.php', false, false); ?>
	</div><!-- /.with_sidebar -->
</main><!-- /.main -->
</div><!-- /.wrapper -->
<?php get_footer(); ?>