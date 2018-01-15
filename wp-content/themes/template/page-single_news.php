<?php
/**
Template Name: Новость
 */

include 'header.php'; ?>
<?php get_header(); ?>
<?php
    $current_id=get_the_ID();
  $news = get_page($current_id, "ARRAY_A");
?>
<section class="news inner_page">
	<div class="center_cnt">
		<div class="breadcrumbs">
			<a href="<?=get_permalink($post->post_parent); ?>"><?=$parent_title = get_the_title($post->post_parent);?></a>
		</div>

		<h1><?php the_title(); ?></h1>

		<div class="single_news_body">
			<div class="snb_date">
                <? if(qtrans_getLanguage() == "ru") : ?>
				    <div class="snb_cat">Новость</div>
			            <?=maxsite_the_russian_time(date("d F",strtotime( $v["post_date"])));?>
                <? endif ?>
                <? if(qtrans_getLanguage() == "en") : ?>
				    <div class="snb_cat">News</div>
			            <?=(date("d F",strtotime( $v["post_date"])));?>
                  <? endif ?>

            </div>

			</div>
			<div class="snb_cnt">
				<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>

				<div class="table_wrap"><!--
					<table>
						<thead>
							<tr>
								<td>Заголовок столбца</td>
								<td>ГОСТ</td>
								<td>Результат Ultra-C</td>
							</tr>
						</thead>
						<tbody>-->
							 <?

                            $product = get_fields( $current_id );
                            $table=$product["table"][0]["add_product"];
                            if( !is_array( $table ) ) $table=array();
                            foreach($table as $k=>$v):
                        ?>
							<tr>
								<td><?=$v["header"]?></td>
								<td><?=$v["gost"]?></td>
								<td><?=$v["ultra-c"]?></td>
							</tr>
                        <?
                            endforeach;
                        ?>
						</tbody>
					</table>
				</div>

				<div class="content_slider">


                    <div class="content_slider_slides">
                            <?
                             $images=get_fields(286)["image"];
                             foreach( $images as $k=>$v):
                         ?>
						<div class="cs_slide" style='background-image: url(<?=$v["image"]["sizes"]["big-thumb"]?>)' data-csslidenum="<?=$k+1?>"></div>
                         <?
                             endforeach;
                         ?>
					</div>

					<div class="content_slider_controls">
						<div class="csc_prev"></div>
						<div class="csc_counter">
							<span class="csc_current">1</span>/<span class="csc_total"></span>
						</div>
						<div class="csc_next"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="related_news">

             <? if(qtrans_getLanguage() == "ru") : ?>
                        <h2>Недавние новости</h2>
                <? endif ?>
                <? if(qtrans_getLanguage() == "en") : ?>
				    <h2>Recent News</h2>
                  <? endif ?>
			<div class="press_list">
				<div class="press_list">
            <?
                $childrenCount = get_children( array( "post_parent" => 9) );
            ?>
                <input type="hidden" value="<?=count( $childrenCount )?>" id="press_count" />
            <?
                $children = get_children( array( "post_parent" => 9,'numberposts'=>2) );

                foreach($children as $k=>$v):
            ?>



			<div class="press_list_item">
                 <? if(qtrans_getLanguage() == "ru") : ?>
				    <div class="pli_date"><?=maxsite_the_russian_time(date("d F",strtotime( $v->post_date))) ?></div>
                 <? endif ?>
                 <? if(qtrans_getLanguage() == "en") : ?>
				        <div class="pli_date"><?=(date("d F",strtotime( $v->post_date))) ?></div>
                  <? endif ?>
                <div class="pli_cnt">
                     <? if(qtrans_getLanguage() == "ru") : ?>
                            <div class="pli_cat">Новость</div>
                     <? endif ?>
                    <? if(qtrans_getLanguage() == "en") : ?>
                        <div class="pli_cat">News</div>
                     <? endif ?>
					<div class="pli_img">
						<img src="/wp-content/themes/template/img/pli_img.jpg" alt="">
					</div>
					<a class="pli_title" href="<?=$v->guid?>"><?=$v->post_title?></a>
					<div class="pli_anonce">
						<?$a=get_extended( $v->post_content);?>
                        <p><?echo $a["main"];?></p>

					</div>
				</div>
			</div>
                 <?
                endforeach;
                ?>
        </div>
			</div>
               <? if(qtrans_getLanguage() == "ru") : ?>
                          <a href="<?=get_permalink($post->post_parent); ?>" class="to_all_news">Ко всем новостям</a>
                     <? endif ?>
                    <? if(qtrans_getLanguage() == "en") : ?>
                       <a href="<?=get_permalink($post->post_parent); ?>" class="to_all_news">To all news</a>
                     <? endif ?>
		    </div>
	</div>
</section>

<?php include 'footer.php'; ?>
