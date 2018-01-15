<?php
/**
Template Name: Главная
 */

include 'header.php'; ?>
<?php
    $current_id=get_the_ID();
  $page_main = get_fields($current_id, "ARRAY_A");

?>
<section class="main_company_info">
	<!--
	    <source src="/wp-content/themes/template/video/main_page_video.mp4">
	    <source src="/wp-content/themes/template/video/main_page_video.webm" type="video/webm">
	-->
                        <!--Баннер -->

    <video class="mp_screen_one_video" preload="auto" loop  autoplay muted>

		<source src="<?=$page_main["video-banner"][0]["mp4Video"]["url"];?>">
		<source src="<?=$page_main["video-banner"][0]["webmVideo"]["url"];?>" type="video/webm">
	</video>

	<div class="center_cnt">
		<div class="mci_desc">
            <?=$page_main["video-banner"][0]["descriptionVideo"]?>
		</div>

                    <!-- Конец баннера -->

         <!--Блок -->

		<div class="mci_features">
             <?if( count( $page_main["block_advantages"])>2 ):
                    foreach($page_main["block_advantages"] as $k=>$v):?>
			<div class="mci_features_item">
            	<div class="mci_features_title"><?=$v["title"]?></div>
				<p><?=$v["content"] ?></p>
			</div>
            <?endforeach;?>
            <?endif;?>

	    </div>
           <!-- Конец блока -->


</section>
<!--Продукция-->
<section class="main_products">
	<div class="center_cnt">
		<div class="section_title"><? echo get_cat_name(8);?></div>

		<div class="main_products_list">
            <?
                 $production= wp_get_recent_posts( array("post_parent"=>7,'post_type' => array( 'page' )) );

                    foreach($production as $k=>$v):
            ?>

                <a href="<?=$v["guid"];?>" class="mpl_item">
                    <span><?=get_post_meta($v["ID"])["element"][0]?></span>

                    <?=$v["post_title"];?>
                </a>
            <?
            endforeach;
            ?>



		</div>
	</div>
</section>
<!--Конец Продукция-->
<!--Пресс-центр-->
<section class="main_press">
	<div class="center_cnt">
		<div class="section_title"><?=get_the_title(9);?></div>

		<div class="main_press_list">
			<?

                $postDescription = wp_get_recent_posts( array("post_parent"=>9,'post_type' => array( 'page' ),'orderby' => 'ID','order' => 'DESC','showposts' => '1') );
                foreach( $postDescription as $k=>$v ):


                    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $v["ID"] )  );
                    $src = wp_get_attachment_image_src( get_post_thumbnail_id( $v["ID"] ), 'thumbnail_size' );
            ?>
                    <a href="<?=$v["guid"];?>" class="mpress_item_big" style="background-image: url(<?=$src[0]?>)">
                        <? if(qtrans_getLanguage() == "en") : ?>
                        <span class="mpress_item_big_date"><?=(date("d F",strtotime( $v["post_date"] ))) ?></span>
                <? endif ?>  <? if(qtrans_getLanguage() == "ru") : ?>
                        <span class="mpress_item_big_date"><?=maxsite_the_russian_time(date("d F",strtotime( $v["post_date"] ))) ?></span>
                <? endif ?>
                        <span><p><?=$v["post_title"]; ?></p></span>
                    </a>
            <?
                endforeach;

            ?>

			<div class="mpress_items_small">
                <?
                $Pre_center= wp_get_recent_posts( array("post_parent"=>9,'post_type' => array( 'page' ),'numberposts'=>4) );
                foreach($Pre_center as $k=>$v):
                    ?>
                        <a href="<?=$v["guid"];?>" class="mpress_item">

                 <? if(qtrans_getLanguage() == "en") : ?>
                            <span><?=( date('d F',strtotime($v["post_date"])) );?></span>
                <? endif ?>  <? if(qtrans_getLanguage() == "ru") : ?>
                            <span><?=maxsite_the_russian_time( date('d F',strtotime($v["post_date"])) );?></span>
                <? endif ?>
                            <p><?=$v["post_title"];?></p>
                        </a>
                    <?
                endforeach;
                ?>
                <? if(qtrans_getLanguage() == "ru") : ?>
		                <a href="<?=get_page_link(9);?>" class="mpl_btn">Все новости</a>
                <? endif ?>
                <? if(qtrans_getLanguage() == "en") : ?>
		                <a href="<?=get_page_link(9);?>" class="mpl_btn">All news</a>
                <? endif ?>


			</div>
		</div>
	</div>
</section>
<!-- Конец Пресс-центр-->
<!--Сферы применения наших соединений-->

<section class="main_app_area">
	<div class="app_area_bgs">
        <?php
            foreach($page_main["spheres"]  as $k=>$v):
        ?>
		        <div style="background-image: url(<?=$v["image"]["url"]?>)"></div>
        <?php
            endforeach;
        ?>
	</div>

	<div class="center_cnt">
		<div class="section_title">Сферы применения наших соединений</div>

		<div class="app_areas_list">
             <?php
                 foreach($page_main["spheres"] as $k=>$v):
             ?>
			<div class="aal_item">

				<div class="aal_item_title"><span><?=$v["title"];?></span></div>
				<div class="aal_item_desc"><?=$v["content"];?></div>

			</div>
 <?endforeach;?>
		</div>
	</div>
</section>


<!--Сферы применения наших соединений-->

<section class="main_field">
	<div class="center_cnt">

		<div class="section_title"><?=$page_main["field"][0] ["title_field"]?></div>
        		<div class="main_field_desc">
                    <div class="mfd_title"><?=$page_main["field"][0]["title_description"]?></div>
                        <p><?=$page_main["field"][0]["content"]?></p>

		        </div>

		<div class="main_field_features_list">


             <?
                if( count( $page_main["block_field"] )>2 ):
                foreach( $page_main["block_field"]  as $k=>$v):
            ?>


			<div class="mff_item">
            	<div class="mff_item_title"><?=$v["title_field"]; ?></div>
				<p><?=$v["content"]; ?></p>
			</div>

           <?
                endforeach;
                endif;
            ?>
		</div>
	</div>

<?
 $img=$page_main["field"][0]["image"]["sizes"]["large"];

 ?>

<div class="main_field_img" style="background-image: url(<?=$img?>)"></div>



</section>

<section class="main_company_desc">
	<div class="center_cnt">



		<div class="section_title"><?=$page_main["title"];?></div>
		<div class="mcd_text"><?=$page_main["content"];?></div>

        <!-- Файл компании-->
		<? include 'page-file.php'; ?>

        <!-- Конец файл компании-->
	</div>
</section>
<!--Клиенты-->
<section class="main_clients">
	<div class="center_cnt">
		<div class="section_title"><?=get_the_title(115);?></div>
            <?php
                  $logos=get_fields(115);

             ?>

		<div class="main_clients_list">
             <?
                foreach( $logos["Clients"]  as $k=>$v):
            ?>
                <div class="mcl_item">
				    <img src='<?=$v["logo"]["url"]?>' alt='<?=$v["logo"]["title"]?>'>
			    </div>
                    <?
                        endforeach;
                    ?>
		</div>
	</div>
</section>
<!--Конец клиенты-->
<?php include 'footer.php'; ?>
