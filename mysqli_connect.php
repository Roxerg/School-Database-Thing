<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'vaivabaze2016');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'mokiniai');


$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Nepavyko prisijungti prie MySQL: '.
    mysqli_connect_error());
	
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER SET utf8');
	

?>
