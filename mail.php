<?php

if( function_exists('date_default_timezone_set') )
    date_default_timezone_set('Asia/Yekaterinburg');

if( mail("ahadjon.nematov.95@gmail.com","test","text") ){
    echo "Законно";
}
else{
    echo "Аха хостинг не подерживаеть";
}