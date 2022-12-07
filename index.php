<?php

require_once('inc/connexion.php');

include("class/Form.php");
$Formulaire = new Form('contacts');
var_dump(Demarrage::is_foreign_key('etudiant_id', 'contacts'));

$type = explode('(', 'int(11)');
echo "<pre>";
var_dump($type);
echo "<br>";
print_r($Formulaire->getColumns());
echo "</pre>";
