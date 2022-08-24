#!/bin/bash

set -e

export PGPASSWORD="CRIS-PRO2021**"

PSQL="psql -U php -h 192.168.125.77 -d clinica_produccion -x -c "

$PSQL "\COPY ( SELECT * FROM nominales.nefroproteccion nn
    LEFT JOIN reporte.informe_parametro_temporal ipt ON TRUE 
    WHERE nn.ultimacita::DATE BETWEEN ipt.fecha_desde::DATE AND ipt.fecha_hasta::DATE
    ORDER BY nn.ultimacita desc ) TO '/var/www/html/servicio/nominales/Nominal_Nefroproteccion.csv' WITH CSV HEADER; "