<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="cmsmagazine" content="3a145314dbb5ea88527bc9277a5f8274">

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-resp.css">

	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->

	<title><?php typical_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="center_cnt">

			<div class="header_side">
				<a href="/" class="logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg">
				</a>
               <?

                wp_nav_menu( array(
                    'container'=>'',
                    'theme_location' => 'top',
                    'menu_class' => 'main_nav',
                    'menu_id' => '',
                    'echo' => true,
                    'items_wrap' => '<ul id = "%1$s"class = "%2$s">%3$s</ul>',
                  ));
                ?>

			</div>

			<div class="header_side">
				<div class="lang_switcher">

                     <?php
                     echo qtranxf_generateLanguageSelectCodeMy('dropdown');
                        //$reflFunc = new ReflectionFunction('qtranxf_generateLanguageSelectCode');
                        //print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();
                        //exit;
                     ?>

					<!--<div class="current_lang">Ru</div>
					<div class="lang_list">
						<div class="lang_item" data-lang="">Ru</div>
                        <div class="lang_item" data-lang="">eng</div>

					</div>-->
				</div>
                        <? if(qtrans_getLanguage() == "en") : ?>
                            <div class="req_a_sample">Request product sample</div>
                        <? endif ?>
                    <? if(qtrans_getLanguage() == "ru") : ?>
                            <div class="req_a_sample">Запросить образец продукции</div>
                    <? endif ?>


			</div>
		</div>
	</header>

	<div class="mobile_header">
		<a href="/" class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg">
		</a>

		<div class="burger-click-region">
			<span class="burger-menu-piece"></span>
			<span class="burger-menu-piece"></span>
			<span class="burger-menu-piece"></span>
		</div>

		<div class="mobile_menu">
			<div class="mobile_menu_topbar">
				<div class="lang_switcher">
					<div class="current_lang">Ru</div>
					<div class="lang_list">
						<div class="lang_item" data-lang="">Ru</div>
						<div class="lang_item" data-lang="en">En</div>
					</div>
				</div>

				<div class="req_a_sample">Запросить образец продукции</div>
			</div>

			<ul class="main_nav">
				<li class="has_submenu">
					<a href="/about">О компании</a>
					<ul class="submenu">
						<li><a href="/company">Наша компания</a></li>
						<li><a href="/team">Команда</a></li>
						<li><a href="/field">Месторождение</a></li>
						<li><a href="/development">Развитие</a></li>
						<li><a href="/for_clients">Клиентам</a></li>
					</ul>
				</li>
				<li class="has_submenu">
					<a href="/production">Продукция</a>
					 <ul class="submenu">
                            <?
                                 $proMenu= wp_get_recent_posts( array("post_parent"=>7,'post_type' => array( 'page' )) );
                                 foreach($proMenu as $k=>$v):
                            ?>
                            <li><a href="<?=$v["guid"];?>"> <?=$v["post_title"];?></a></li>
                            <? endforeach; ?>
                        </ul>

						<!--<li><a href="/">Гидроксид магния</a></li>
						<li><a href="/">Сульфат магния</a></li>
						<li><a href="/">Магнезия Альба</a></li>
						<li><a href="/">Аморфный кремнозем</a></li>
						<li><a href="/">Водорастворимый гидросиликат калия</a></l
					</ul>-->
				</li>
				<li><a href="/press-center">Пресс-центр</a></li>
				<li><a href="/contacts">Контакты</a></li>
			</ul>
		</div>
	</div>