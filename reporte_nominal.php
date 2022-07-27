<?php 
//require_once('connections/pgconn.php');

$dbconect = pg_connect("host=190.60.242.160 port=5432 dbname=clinica_desarrollo user=postgres password=clinicaDEV-2022* options='--client_encoding=UTF8'");



function limpiarData(&$str){
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    #if( strtr($str,'"') ) $str = '"'.str_replace('"','""',$str). '"';
}

//file
$filename = "base_nominal_" .date('Y-m-d').".xls";

$query="SELECT id,nompersonal FROM adm.personal limit 10";

$consulta=pg_query($dbconect,$query) or die('Fallo consulta');
#$query = db->consulta("SELECT * from adm.personal limit 10");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
$flag=false;

while(false !== ($row = pg_fetch_assoc($consulta))) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'limpiarData');
    echo implode("\t", array_values($row)) . "\r\n";
    }

//headers para descarga


#echo $excelData;
?>