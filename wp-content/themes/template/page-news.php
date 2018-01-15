<?php
/**
Template Name: Новости
 */

include 'header.php'; ?>
<?php get_header(); ?>
<section class="news inner_page">
	<div class="center_cnt">
        <h1><?=get_the_title();?></h1>


		<div class="press_list">
            <?
                $childrenCount = get_children( array( "post_parent" => 9) );
            ?>
                <input type="hidden" value="<?=count( $childrenCount )?>" id="press_count" />
            <?
                $children = get_children( array( "post_parent" => 9,'numberposts'=>3) );

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
                        <? $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID )  );
                             $src = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'thumbnail_size' );?>
						<img src="<?=$src[0]?>" alt="">
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
         <? if(qtrans_getLanguage() == "ru") : ?>
		<div class="load_more_news">Показать еще новости</div>
                     <? endif ?>
                     <? if(qtrans_getLanguage() == "en") : ?>
		<div class="load_more_news">Show more news</div>
                    <? endif ?>
	</div>
</section>

<?php include 'footer.php'; ?>
