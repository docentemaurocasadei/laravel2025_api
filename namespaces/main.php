<?php
require_once 'classe1.php';
require_once 'classe2.php';

$oggetto1 = new Classe1\Classe1();
$oggetto2 = new Classe2\Classe1();

echo $oggetto1->metodo(null);
echo $oggetto2->metodo(null);