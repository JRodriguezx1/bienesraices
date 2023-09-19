<?php
function conectarDB():mysqli
{
    $db = new mysqli("localhost", "root", "Root", "bienesraices");
   if(!$db){ echo "error de conexion"; exit;}
   return $db;

}