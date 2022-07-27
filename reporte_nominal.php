<?php 
//require_once('connections/pgconn.php');

$dbconect = pg_connect("host=190.60.242.160 port=5432 dbname=clinica_desarrollo user=postgres password=clinicaDEV-2022* options='--client_encoding=UTF8'");



function filtrarDatos(&$str){
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    #if( strtr($str,'"') ) $str = '"'.str_replace('"','""',$str). '"';
}

//file
$filename = "users-data_" .date('Y-m-d').".xls";
//cols
$headers= array('ID','NOMBRE');

$excelData= implode("\t",array_values($headers)). "\n";

$query="SELECT id,nompersonal FROM adm.personal limit 10";

$consulta=pg_query($dbconect,$query);
#$query = db->consulta("SELECT * from adm.personal limit 10");
if($consulta){
    if(pg_num_rows($consulta)>0){
        
        while($obj=pg_fetch_object($consulta)){
            #$status=($obj->activo=1) ? 'Activo':'Inactivo';
            echo "<br>Listado de personal<br>";
        
            echo "$obj->id</br>";
            echo "$obj->nompersonal</br>";

            $lineData= array($obj->id,$obj->nompersonal);
            array_walk($lineData,'filtrarDatos');

            $excelData .=implode("\t",array_values($lineData)). "\n";
        }
    }
}else{
    echo "No se encontro datos";
}

//headers para descarga
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

#echo $excelData;
exit;
?>