<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); ?>

<section class="about inner_page">
	<div class="center_cnt">
		<h1><?php the_title(); ?></h1>

		<div class="about_body">
			<div class="about_cnt">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
		                <?php the_content(); ?>
	                    <?php endwhile; endif; ?>

			</div>
		</div>

	</div>
</section>

<?php get_footer(); ?>