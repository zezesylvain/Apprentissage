<?php
class Formulaire
{
    public static function input($chp, $type = 'text', $value = '')
    {
        $libelle = ucfirst($chp);
        return
            <<<TEXT
        <div>
            {$libelle}<br>
            <input type="{$type}" name="{$chp}" value="{$value}">
        </div>
    TEXT;
    }
    public static function select($chp, $data, $value)
    {
        $libelle = ucfirst($chp);
        $option = "<option value=\"\"> Choisir </option>";
        foreach ($data as $k => $v) :
            $option .= "<option value=\"$v\"> $k </option>\n";
        endforeach;
        return
            <<<TEXT
                <div>
                    {$libelle}<br>
                    <select name="{$chp}">
                        {$option}
                    </select>
                </div>
    TEXT;
    }
}
