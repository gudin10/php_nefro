<?php 
//require_once('connections/pgconn.php');

$dbconect = pg_connect("host=190.60.242.160 port=5432 dbname=clinica_desarrollo user=postgres password=clinicaDEV-2022*");
if($dbconect){
    echo "conecto joven";
}else{
    echo "no conecto joven";
}
//$result = pg_query("SELECT * FROM adm.personal") or die('Query failed!');

?>