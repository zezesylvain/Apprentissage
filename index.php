<?php

require_once('inc/connexion.php');

include("class/Form.php");
$Formulaire = new Form('contacts');
var_dump(Demarrage::is_foreign_key('etudiant_id', 'contacts'));

$type = explode('(', 'int(11)');
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
