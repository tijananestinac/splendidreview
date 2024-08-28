<?php
/*DBNAME=epiz_25997988_movie_review
SERVER=sql300.epizy.com
USERNAME=epiz_25997988	
PASSWORD=Y0DSktZZZ8*/

define("BASE_URL", "http://localhost:8081/PraktikumPHP/sajt");
define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/sajt");

define("ENV_FAJL", ABSOLUTE_PATH."/config/.env");
define("LOG_FAJL", ABSOLUTE_PATH."/data/log.txt");
define("GRESKE_FAJL", ABSOLUTE_PATH."/data/greske.txt");
define("SEPARTOR", "&");

/*define("SERVER", env("SERVER"));
define("DATABASE", env("DBNAME"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));

function env($naziv){
    $podaci = file(ENV_FAJL);
    $vrednost = "";
    foreach($podaci as $key=>$value){
        $konfig = explode("=", $value);
        if($konfig[0]==$naziv){
            $vrednost = trim($konfig[1]);
        }
    }
    return $vrednost;
}*/

