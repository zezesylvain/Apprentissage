<?php
$lesDonnees 
if($lesDonnees['id']):
    Formulaire::hidden('id', $lesDonnees['id']);
endif;
foreach ($lesChamps as $chp => $v) :
    $type = explode('(', $v['Type'])[0] ;
    switch ($type):
        case 'varchar':
            Formulaire::input($chp, 'text', $lesDonnees[$chp] ?? "");
            break;
        case 'int':
            if(Demarrage::is_foreign_key($chp, $table)):
                Formulaire::select($chp, , $lesDonnees[$chp] ?? "");
            else:
                Formulaire::input($chp, 'number', $lesDonnees[$chp] ?? "");
            endif;
            break;
    endswitch;
endforeach;