<?php
/**
Template Name: Clear Template
 */
get_header(); ?>

<section class="main_content">
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	<?php endwhile; ?>
</section>

<?php get_footer(); ?>