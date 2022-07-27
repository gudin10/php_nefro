<?php 
//require_once('connections/pgconn.php');

$dbconect = pg_connect("host=190.60.242.160 port=5432 dbname=clinica_desarrollo user=postgres password=clinicaDEV-2022* options='--client_encoding=UTF8'");

#$query="SELECT * FROM adm.personal limit 10";

if($dbconect){
    
    echo "conecto joven";
     
}else{
    echo "no conecto joven";
}


?>