<?php

require 'funciones.php';
require 'config/database.php';
  require __DIR__.'/../vendor/autoload.php';
//require __DIR__.'/../clases/propiedad.php';

$db = conectarDB();

use Model\activerecord;

activerecord::set_DB($db);  //set_db es estatic propiedad es la clase

