<?php
$sh = 'sh /home/cristal/ReportesSh/NefroproteccionBN.sh';

$exec = shell_exec($sh);                                

$salida = $exec;

if ($salida != null)
{                        
    header('Location: https://cristalweb.emssanar.org.co:8002/nominales/Nominal_Nefroproteccion.csv');
}
else{        
    echo "ERROR AL GENERAR EL ARCHIVO";
}
?>

<!DOCTYPE html>
<style type="text/css">
    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
<html>
    <head>
        <meta charset="utf-8" />        
        <title>Generando Base Nominal ...</title>
    </head>

    <body>
        <div class="loader"></div>
    </body>
