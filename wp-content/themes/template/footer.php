<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<?$pageContact = get_page(5,"ARRAY_A");?>
	<footer>
        <? if(qtrans_getLanguage() == "ru") : ?>
            <div class="center_cnt">

                <div>© <?php echo date('Y'); ?><?bloginfo('name'); ?></div>

                <div>
                    <?=get_field_object("ReceptionFax",$pageContact["ID"])["label"];?>
                    <br>
                    <a><?=get_post_custom($pageContact["ID"] )["ReceptionFax"][0]?></a>
                </div>

                <div>
                    <?=get_field_object("email",$pageContact["ID"])["label"];?><br>
                    <a href="mailto:<?=get_post_custom($pageContact["ID"] )["email"][0]?>"><?=get_post_custom($pageContact["ID"] )["email"][0]?></a>
                </div>

                <div>
                    <img src="http://ultrac.dev.web-prod.ru/wp-content/uploads/2017/12/ft_logo.png" alt="<?bloginfo('name'); ?>">
                </div>
            </div>
        <? endif ?>
        <? if(qtrans_getLanguage() == "en") : ?>
            <div class="center_cnt">

                <div>© <?php echo date('Y'); ?><?bloginfo('name'); ?></div>

                <div>
                    Reception / fax
                    <br>
                    <a><?=get_post_custom($pageContact["ID"] )["ReceptionFax"][0]?></a>
                </div>

                <div>
                    Email
                    <br>
                    <a href="mailto:<?=get_post_custom($pageContact["ID"] )["email"][0]?>"><?=get_post_custom($pageContact["ID"] )["email"][0]?></a>
                </div>

                <div>
                    <img src="http://ultrac.dev.web-prod.ru/wp-content/uploads/2017/12/ft_logo.png" alt="<?bloginfo('name'); ?>">
                </div>
            </div>
        <? endif ?>
	</footer>

<?php wp_footer(); ?>


<div class="overlay">

		<div class="modal_window">
			<div class="modal_close"></div>
             <? if(qtrans_getLanguage() == "ru") : ?>
			<div class="form_title">Запрос образца продукции</div>
            <div class="ff_ty">Ваш запрос успешно отправлен!</div>
             <? endif ?>
             <? if(qtrans_getLanguage() == "en") : ?>
            <div class="form_title">Sample product request</div>
            <div class="ff_ty">Your request was successfully sent!</div>
             <? endif ?>
			<form class="feedback_form" id="modal_window">
                <div class="ff_block">
                     <? if(qtrans_getLanguage() == "ru") : ?>
					    <label for="ff_name">Интересующее химическое соединение</label>
                    <? endif ?>
                    <? if(qtrans_getLanguage() == "en") : ?>
					    <label for="ff_name">The interesting chemical compound</label>
                    <? endif ?>
					<div class="custom_select">


                        <?
                            $sel="";
                            $options="";
                            $production= wp_get_recent_posts( array("post_parent"=>7,'post_type' => array( 'page' )) );
                           
                            foreach($production as $k=>$v):
                                if( $k==0 ) $sel="<div class='current_opt'>{$v["post_title"]}</div>";
                                $options.="<div class='opt_item' data-opt='{$k}'> <p>{$v["post_title"]}</p> </div>";
                            endforeach;
                        ?>
                        <?=$sel;?>
						<div class="opt_list">
                             <?=$options?>
                        </div>

					</div>
				</div

                    <?php if(qtrans_getLanguage() == "ru") : ?>
                         <?= do_shortcode('[contact-form-7 id="220" title="Запрос образца продукции"]')?>

                    <?php endif ?>
                <?php if(qtrans_getLanguage() == "en") : ?>
                  <?= do_shortcode('[contact-form-7 id="747" title="Sample product request"]') ?>
                     <?php endif ?>
			</form>

		</div>
	</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/my_scripts.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.maskedinput.js"></script>
<?php
file_put_contents($_SERVER['DOCUMENT_ROOT']."/.test.txt",json_encode( $_POST )."\n<pre>".print_r($_POST,true)."</pre>" );
$ff_name=isset($_POST["ff_name"])?$_POST["ff_name"]:"";
$ff_mail=isset($_POST["ff_mail"])?$_POST["ff_mail"]:"";
$ff_comp=isset($_POST["ff_comp"])?$_POST["ff_comp"]:"";
$ff_phone=isset($_POST["ff_phone"])?$_POST["ff_phone"]:"";
$ff_khim_con=isset($_POST["ff_khim_con"])?$_POST["ff_khim_con"]:"";

$a=$ff_name."\n".$ff_mail."\n".$ff_comp."\n".$ff_phone."\n".$ff_khim_con."\n";

file_put_contents($_SERVER['DOCUMENT_ROOT']."/.test3.txt",json_encode( $_POST )."\n<pre>".print_r($a,true)."</pre>" );

if( $ff_name!="" && $ff_mail!="" && $ff_comp!="" && $ff_phone!="" && $ff_khim_con!="" ){
    $to = " {$ff_mail}";
    $subject = "Привет!";
    $body="
		Ваш запрос принят !
		Компания: {$ff_comp}
		Телефон: {$ff_phone}
		Химическое соединение: {$ff_khim_con}
	";
	$headers = array('Content-Type: text/html; charset=UTF-8');
if( mail($to,$subject,$body) ){
file_put_contents($_SERVER['DOCUMENT_ROOT']."/.test1.txt",json_encode( $_POST )."\n<pre>".print_r($_POST,true)."</pre>" );
}else{
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/.test2.txt",json_encode( $_POST )."\n<pre>".print_r($_POST,true)."</pre>" );
}
	//wp_mail( $to, $subject, $body, $headers );

}

?>
</body>
</html>