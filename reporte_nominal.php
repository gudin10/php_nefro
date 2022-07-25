<?php 
//require_once('connections/pgconn.php');

$result = pg_query("SELECT * FROM adm.personal") or die('Query failed!');
?>