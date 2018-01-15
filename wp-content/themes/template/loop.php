<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage your-clean-template
 */ 
?>

<div>
	<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	<div class="meta">
		<p>Опубликовано: <?php the_time('F j, Y'); ?> в <?php the_time('g:i a'); ?></p>
		<p>Категории: <?php the_category(',') ?></p> 
		<?php the_tags('<p>Тэги: ', ',', '</p>'); ?>
	</div>
	<?php if (has_post_thumbnail()) the_post_thumbnail();  ?>
	<?php the_content('');  ?>
</div>