<?php
/**
Template Name: О компании
 */

include 'header.php'; ?>
<?
    $about = get_page(286, "ARRAY_A");
    $fields=get_fields( $about["ID"] );
?>
<section class="about inner_page">
	<div class="center_cnt">
		<h1><?=$post->post_title;?></h1>

		<div class="about_body">
			<div class="about_cnt">



<?=$post->post_content;?>

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
                         <? $table=get_fields(286);

                         ?>
                        <?php


                            foreach($table["table"] as $k=>$v):
                        ?>
							<tr>
								<td><?= $v["header"]?></td>
                                <td><?=$v["ultra-c"]?></td>
								<td><?=$v["gost"]?></td>

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
                             $image = $fields["image"];
                             foreach( $image as $k=>$v):
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

			<? include 'page-file.php'; ?>
		</div>

	</div>
</section>

<?php include 'footer.php'; ?>
