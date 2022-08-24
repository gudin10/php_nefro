<?php 
require_once('conexion.php');

function limpiarData(&$str){
    $str = preg_replace("/\t/","\\t",$str);
    $str = preg_replace("/\r?\n/","\\n",$str);
    #if( strtr($str,'"') ) $str = '"'.str_replace('"','""',$str). '"';
}

//file
$filename = "base_nominal_" .date('Y-m-d').".xls";

#$fecha_desde
#$fecha_hasta
/*
$query="SELECT
        n.fechaingreso,
        n.ultimacita  ,
        n.fecha_proximo_control,
        n.tipoidentificacion,                                  
        n.numeroidentificacion,
        n.primernombre,
        n.segundonombre,                                           
        n.primerapellido,                                          
        n.segundoapellido,                                         
        n.fechadenac,
        n.edad, 
        n.genero,
        n.zona,     
        n.direccion,
        n.asentamiento,
        n.codmunicipioprocedencia,
        n.municipiodeprocedencia  ,                                
        n.telefono  ,
        n.regimen   ,  
        n.ipsprimaria, 
        n.codigopertenenciaetnica,
        n.puebloindigena ,                                
        n.comunidadindigena,
        n.grupopoblacional,                                      
        n.aseguradora ,
        n.fechaafiliacioneps,
        n.codigoipsquehaceelseguimiento,
        n.ipsdeseguimiento  ,                          
        n.escolaridad ,
        n.fumadoractivo,                                           
        n.exposicionhumoleña ,
        n.consumoalcohol ,                                    
        n.diagnosticohipertensionarterial ,
        n.fecha_diagnostico_hta ,                       
        n.categoriatensionarterial ,
        n.diagnosticodiabetesmellitus,
        n.fecha_diagnostico_diabetes ,
        regexp_replace(n.diagnostico_cie10, ';',',','g') diagnostico_cie10,            
        n.tensionarterialsistolicadeingreso,
        n.tensionarterialdiastolicadeingreso,
        n.riesgocardiovasculardeingreso                           ,
        n.tensionarterialsistolica                                ,
        n.tensionarterialdiastolica                               ,
        n.diagnosticodislipidemias                                ,
        n.fechadiagnosticodislipidemias                           ,
        n.fechaperfillipidico                                     ,
        n.colesteroltotal                                         ,
        n.fechacolesteroltotal                                    ,
        n.colesterolhdl                                           ,
        n.fechacolesterolhdl                                      ,
        n.trigliceridos                                           ,
        n.fechatomatrigliceridos                                  ,
        n.colesterolldl                                           ,
        n.fechaldl    ,
        n.hemoglobina1ac,                                          
        n.fechahemoglobina1ac                                     ,
        n.glicemiaayuno                                           ,
        n.fechaglicemiaayuno                                      ,
        n.perimetroabdominal                                      ,
        n.peso        ,
        n.talla       ,
        n.creatinina  ,
        n.fechacreatinina                                         ,
        n.cocienteac  ,
        n.fechacocienteac                                         ,
        n.cocienteachistorico1                                    ,
        n.fechacocienteachistorico1                               ,
        n.cocienteachistorico2                                    ,
        n.fechacocienteachistorico2                               ,
        n.proteinasuroanalisis                                    ,
        n.fechauroanalisis                                        ,
        n.farmacosantihipertensivos                               ,
        n.recibeieca  ,
        n.recibeara   ,
        n.estanina    ,
        n.antidiabeticos                                          ,
        n.adherenciaaltratamiento                                 ,
        n.recibeeducacion                                         ,
        n.valoracionpodologica                                    ,
        n.realizaactividadfisica                                  ,
        n.antecedentefamiliarenfermedadcardiovascular             ,
        n.tamizadoencuestarcv                                     ,
        n.complicacioncardiaca                                    ,
        n.complicacioncerebral                                    ,
        n.complicacionretinianas                                  ,
        n.complicacionvascular                                    ,
        n.complicacionrenal                                       ,
        n.fechaatencionmedicinainterna                            ,
        n.fechaatencionendocrinologia                             ,
        n.fechaatencioncardiologia                                ,
        n.fechaatencionoftalmologia                               ,
        n.fechaatencionnefrologia                                 ,
        n.fechaatencionpsicologia                                 ,
        n.fechaatencionnutricion                                  ,
        n.fechaatenciontrabajosocial                              ,
        n.fechatomaelectrocardiograma                             ,
        n.imc         ,
        n.clasificacionimc                                        ,
        n.riesgoframingham                                        ,
        n.clasificacionframingham                                 ,
        n.riesgocardiovascularglobal                              ,
        n.diagnosticoerc                                          ,
        n.etiologiaerc,
        n.soporte     ,
        n.tfgactual   ,
        n.estadiocac  ,
        n.estadioips  ,
        n.creatininaanterior                                      ,
        n.fechacreatininaanterior                                 ,
        n.tfganterior ,
        n.estadioanterior                                         ,
        n.fechadiagnosticoerc5                                    ,
        n.tfginicialtrr                                           ,
        n.modoiniciotrr                                           ,
        n.terapianodialiticatrr                                   ,
        n.fechainiciotrr                                          ,
        n.fechadiagnosticohepatitisb                              ,
        n.fechadiagnosticohepatitisc                              ,
        n.paratohormona                                           ,
        n.fechapth    ,
        n.hemoglobina ,
        n.fechahemoglobina                                        ,
        n.albumina    ,
        n.fechaalbumina,                                           
        n.fosforo     ,
        n.fechafosforo,
        n.estudioparaposibletransplanterenal                      ,
        n.contraindicaciontransplantecancer                       ,
        n.contraindicaciontransplanteinfeccion                    ,
        n.contraindicaciontransplantenodeseopaciente              ,
        n.contraindicaciontransplanteesperanzavidamenor6meses     ,
        n.contraindicaciontransplantelimitacionautocuidado        ,
        n.contraindicaciontransplanteenfermedadccv                ,
        n.contraindicaicontransplanteinfeccionvih                 ,
        n.contraindicacioninfeccionhepatitisc                     ,
        n.contraindicaciontransplanteenfermedadinmunologicaactiva ,
        n.contraindicaciontransplanteenfermedadpulmonarcardiaca   ,
        n.contraindicacionotrasenfermedadescronicas               ,
        n.novedades   ,
        n.causamuerte ,
        n.fechamuerte ,
        n.causasdeanasistencia                                    ,
        n.trabajosocial                                           ,
        n.observaciones                                           ,
        n.medico      ,
        n.fechaatencionmedicogeneralpresencial                    ,
        n.fechaatencionmedicogeneralteleconsulta                  ,
        n.fechaatencionmedicogeneralvisitadomiciliaria            ,
        n.fechaatencionmedicinaespecializadateleconsulta ,
        n.fechaatencionmedicinaespecializadatelemedicina          ,
        n.fechaatencionmedicinaespecializadavisitadomiciliaria ,   
        n.fechaatencionvisitadomiciliariapromotror              ,  
        n.fechasegumientotelefonicoauxiliarenfermeria            , 
        n.fechavisitadomiciliariaporauxiliarenfermera             ,
        n.fechaseguimientotelefonicoporenfermeria                 ,
        n.fechavisitadomiciliariaenfermeria                       ,
        n.fechavisitadomiciliariaotroprofesional                  ,
        n.fechavisitadomiciliariaporequipomultidisciplinario      ,
        n.fechatomalaboratoriosdomicilio                          ,
        n.entregademedicamentosdomiciliaria                       ,
        n.entregamedicamentosaacudiente                           ,
        n.id_paciente ,
        n.vacuna_hepatitis_b                                      ,
        n.compensacion_hta                                        ,
        n.compensacion_diabetes_mellitus                          ,
        n.glicemia_posprandial                                    ,
        n.fecha_toma_posprandial                                  ,
        n.proteinuria ,
        n.fecha_toma_proteinuria                                  ,
        n.potasio     ,
        n.fecha_toma_potasio                                      ,
        n.novedades_boxsalud                ,
        regexp_replace(regexp_replace(n.diagnostico_principal, ';',',','g'), '-',' ','g') diagnostico_principal ,
        regexp_replace(regexp_replace(n.diagnostico_relacionado, ';',',','g'), '-',' ','g')  diagnostico_relacionado,
        n.correo_paciente  ,
        n.novedades_notas ,
        n.progresion_erc
        FROM nominales.nefroproteccion as n
        LEFT JOIN reporte.informe_parametro_temporal ipt on TRUE
        WHERE 
        n.ultimacita BETWEEN ipt.fecha_desde::DATE AND ipt.fecha_hasta::DATE limit 10";
*/

$query = ("SELECT * from adm.personal limit 10");
$consulta=pg_query($dbconect,$query) or die('Fallo consulta');
#$query = db->consulta("SELECT * from adm.personal limit 10");
#header("Content-Type: application/vnd.ms-excel");
header("Content-Type: application/vnd.ms-excel;Content-Disposition: attachment; filename=\"$filename\"");
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