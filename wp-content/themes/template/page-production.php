<?php
/**
Template Name: Продукция
 */

include 'header.php'; ?>
<?php get_header(); ?>
<?php
$current_id=get_the_ID();
  $product = get_fields( $current_id );
//echo "<pre>";print_r( $product );echo "</pre>";exit;
?>
<section class="production inner_page">
	<div class="production_header">
		<div class="center_cnt">
			<div class="production_element"><?=$product["element"]?></div>
			<div class="production_head_cnt">
				<div class="phc_cat"><?=get_the_title($post->post_parent);?></div>
				<h1><?php the_title(); ?></h1>
				<div class="relevant_products">

                   <?  $tab=$product["add_new"];?>

                    <?
                        foreach($tab as $k=>$v):
                    ?>
                        <a href="#go_to_block_<?=$k?>"><?=$v["title"]?></a>
                    <?
                        endforeach;
                    ?>
				</div>
			</div>
		</div>
	</div>

    <?
    //echo "<pre>";print_r( $tab );echo "</pre>"; exit;

        foreach($tab as $k1=>$v1 ):
            $blockEvenClass="";
            if( $k1%2==1 ) $blockEvenClass=" gray_bg";
    ?>
	<div class="production_body <?=$blockEvenClass?>" id="go_to_block_<?=$k1?>">
		<div class="center_cnt">
			<h2><?=$v1["title"]?></h2>
			<div class="production_cnt">
				<div class="production_cnt_desc">

					<?=$v1["content"]?>
                     <? if(qtrans_getLanguage() == "en") : ?>
                        <h3>Chemical indicators of our products</h3>
					<div class="table_wrap">
						<table>
							<thead>
								<tr>
									<td>Column Header</td>
									<td>GOST</td>
									<td>The result of Ultra-C</td>
								</tr>
							</thead>
							<tbody>                    <? endif ?>
                     <? if(qtrans_getLanguage() == "ru") : ?>
                          <h3>Химические показатели нашей продукции</h3>
					<div class="table_wrap">
						<table>
							<thead>
								<tr>
									<td>Заголовок столбца</td>
									<td>ГОСТ</td>
									<td>Результат Ultra-C</td>
								</tr>
							</thead>
							<tbody>
                    <? endif ?>


                           <? //$table=$product["table"][0] ["add_product"];
                           //echo "<pre>";print_r($table  );echo "</pre>";
                           //echo $k1."<br>";
                                    foreach($product["table"][$k1]["add_product"] as $k2=>$v2):
                                ?>
								<tr>
									<td><?=$v2["header"];?></td>
									<td><?=$v2["gost"];?></td>
									<td><?=$v2["ultra-c"];?></td>
								</tr>
                                <?
                                    endforeach;
                                ?>
							</tbody>
						</table>
					</div>
				</div>
				<? include 'page-file.php'; ?>
			</div>
		</div>
	</div>
    <?
        endforeach;
    ?>

<section class="main_field inner_page">
	<div class="center_cnt">
		<div class="section_title"><?=get_the_title(605);?></div>
        <?php
            $fields=get_fields(605);
        ?>
		<div class="main_field_desc">

			  <? if(qtrans_getLanguage() == "ru") : ?>
				 	<div class="mfd_title">Описание</div>
                <? endif ?>
                <? if(qtrans_getLanguage() == "en") : ?>
				   	<div class="mfd_title">Description</div>
                <? endif ?>
			<?= $fields["description"]?>
		</div>

		<div class="main_field_features_list">
		     <?
                if( count( $fields ["block"] )>2 ):
                foreach( $fields ["block"]  as $k=>$v):
            ?>
			<div class="mff_item">
				<div class="mff_item_title"><?=$v["header"]; ?></div>
				<?=$v["content"]; ?>
			</div>
           <?
                endforeach;
                endif;
            ?>
		</div>

    </div>
         <?$img= $fields["image"]["sizes"]["large"]; ?>
	    <div class="main_field_img" style="background-image: url(<?=$img?>)"></div>
</section>

<?php include 'footer.php'; ?>
