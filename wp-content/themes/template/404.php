<?php
/**
Template Name: Страница 404
 */
get_header(); ?>
<?
$page404 = get_page(170,"ARRAY_A");?>
<?$a=$page404?>
<?
 echo "<pre>";print_r( $a);echo "</pre>"
 ;exit;?>

<section class="not_found inner_page">
	<div class="center_cnt">

		<h1><?=$page404["post_title"]?></h1>
		<div class="not_found_subtitle"><?=$page404["post_content"]?></div>
		<p>Неправильно набран адрес, или такой страницы на сайте больше не существует.</p>
		<p>Перейдите на <a href="/">главную страницу</a>.</p>
	</div>
</section>

<?php get_footer(); ?>00