<?php
/**
Template Name: Команда
 */

include 'header.php'; ?>

<section class="team inner_page">
	<div class="center_cnt">
		<h1><?php the_title(); ?></h1>
        <?
           
            $current_id=get_the_ID();
             $custom=get_fields( $current_id );
//echo "<pre>";print_r( $custom );echo "</pre>";
?><?

            $directory=[];
            $department=[];
            foreach($custom["team"] as $k=>$v):
                //$custom=get_fields( $v["ID"] );
                if( $v["command"]=="Руководство"){
                    $directory[]=$v;
                }elseif( $v["command"]=="Отдел продаж"){
                    $department[]=$v;
                }

            endforeach;

           //echo "<pre>";print_r( $department );echo "</pre>";exit;

        ?>

        <?
            if( count( $directory )>0 ):
        ?>
                <div class="single_team">
                    <h2>Руководство</h2>


                    <div class="single_team_dudes">
                        <?
                            foreach($directory as $k=>$v):
                        ?>
                            <div class="single_team_dude">
                                <div class="single_team_dude_img" style='background-image: url(<?=$v["image"]["url"]?>);'></div>
                                <div class="single_team_dude_name"><?=$v["name"]?>&nbsp;<?=$v["surname"]?></div>
                                <p><?=$v["position"]?></p>
                            </div>
                        <?
                            endforeach;
                        ?>
                    </div>
                </div>
        <?
            endif;
        ?>

        <?
            if( count( $department )>0 ):
        ?>
                <div class="single_team">
                    <h2>Отдел продаж</h2>

                    <div class="single_team_dudes">
                        <?
                            foreach( $department as $k=>$v):
                        ?>
                            <div class="single_team_dude">
                                <div class="single_team_dude_img" style='background-image: url(<?=$v["image"]["url"]?>);'></div>
                                <div class="single_team_dude_name"><?=$v["name"]?>&nbsp;<?=$v["surname"]?></div>
                                <p><?=$v["position"]?></p>
                            </div>
                        <?
                            endforeach;
                        ?>
                    </div>
                </div>
        <?
            endif;
        ?>
	</div>
</section>

<?php include 'footer.php'; ?>
