<?php
/**
Template Name: Контакты
 */

include 'header.php'; ?>

<section class="contscts inner_page">
    <? if(qtrans_getLanguage() == "ru") : ?>
        <div class="center_cnt">
            <h1><?=get_the_title(5);?></h1>
                    <div class="contact_blocks">
                        <div class="contact_block">
                            <div class="cb_title"><?=get_field_object("ReceptionFax",$pageContact["ID"])["label"];?></div>
                            <a href="tel:+7 (343) 255-58-58"><?=get_post_custom($pageContact["ID"] )["ReceptionFax"][0]?></a>
                        </div>
                        <div class="contact_block">
                            <div class="cb_title"><?=get_field_object("email",$pageContact["ID"])["label"];?></div>
                            <a href="mailto:mail@yandex.ru"><?=get_post_custom($pageContact["ID"] )["email"][0]?></a>
                        </div>
                        <div class="contact_block">
                            <div class="cb_title"><?=get_field_object("Address",$pageContact["ID"])["label"];?></div>
                            <a><?=get_post_custom($pageContact["ID"] )["Address"][0]?></a>
                        </div>
                     </div>
        </div>
    <? endif ?>
    <? if(qtrans_getLanguage() == "en") : ?>
        <div class="center_cnt">
            <h1><?=get_the_title(5);?></h1>
                <div class="contact_blocks">
                    <div class="contact_block">
                        <div class="cb_title">Reception / fax</div>
                           <a href="tel:+7 (343) 255-58-58"><?=get_post_custom($pageContact["ID"] )["ReceptionFax"][0]?></a>
                    </div>
                    <div class="contact_block">
                        <div class="cb_title">Email</div>
                        <a href="mailto:mail@yandex.ru"><?=get_post_custom($pageContact["ID"] )["email"][0]?></a>
                    </div>
                    <div class="contact_block">
                        <div class="cb_title">Address</div>
                        <a><?=get_post_custom($pageContact["ID"] )["Address"][0]?></a>
                    </div>
            </div>
        </div>
    <? endif ?>
	<div id="map" class="map"></div>
</section>
<script>
    var map;
	function initMap() {
		var image = '/wp-content/themes/template/img/marker.png',
			place = {lat:<?=get_field_object("GoogleMap",$pageContact->ID)["value"]["lat"]?>,
                lng:<?=get_field_object("GoogleMap",$pageContact->ID)["value"]["lat"]?>};

	  	map = new google.maps.Map(document.getElementById('map'), {
	  	  	zoom: <?=get_field_object("GoogleMap",$pageContact->ID)["zoom"];?>,
	  	  	center: place,
	  	  	disableDefaultUI: true
	  	});

	  	var marker = new google.maps.Marker({
	  	  	position: place,
	  	  	map: map,
	  	  	icon: image
	  	});
	}
</script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8oP6aZlYlqO7FVp_aYa0F_PhiS9p_xdo&amp;callback=initMap"></script>
<?php include 'footer.php'; ?>
