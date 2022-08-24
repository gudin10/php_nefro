<?php 
//require_once('connections/pgconn.php');

$dbconect = pg_connect("host=192.168.125.77 port=5432 dbname=clinica_produccion user=postgres password=CRIS-PRO2021** options='--client_encoding=UTF8'");

#$query="SELECT * FROM adm.personal limit 10";

if($dbconect){
    
    echo "conecto joven";
     
}else{
    echo "no conecto joven";
}


?>