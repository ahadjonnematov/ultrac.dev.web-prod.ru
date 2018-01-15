<?php
/**
Template Name: Файл
 */

?>
<div class="mcd_docs">
              <? $docs=get_fields(266);
              ?>
             <?

                foreach($docs["file"] as $k=>$v):
                    $fields=get_fields( $v["ID"] );
             ?>
                    <a href='<?=$v["file"]["url"]?>' target="_blank"><?=$v ["name_file"]?></a>
             <?
                endforeach;
             ?>

                        <? if(qtrans_getLanguage() == "en") : ?>
                            <div class="req_a_sample">Request product sample</div>
                        <? endif ?>
                    <? if(qtrans_getLanguage() == "ru") : ?>
                            <div class="req_a_sample">Запросить образец продукции</div>
                    <? endif ?>
		</div>

