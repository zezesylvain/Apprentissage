<?php

class Demarrage
{
    /** 
     * 
     * @var $db 
     */
    public static function getListTables(PDO $db)
    {
        $tables = $_SESSION['tables'] ?? [];
        if (empty($tables)) :
            $table = [];
            $result = $db->query("SHOW TABLES");
            while ($row = $result->fetch(PDO::FETCH_NUM)) :
                $table[] = $row[0];
                self::storeColumnsOfTable($db, $row[0]);
            endwhile;
            $_SESSION['tables'] = $table;
        endif;
        return $_SESSION['tables'];
    }
    public static function getColumnsOfTable(PDO $db, string $table)
    {
        $lesColonnes = $_SESSION['columns'] ?? [];
        if (!array_key_exists($table, $lesColonnes)) :
            self::storeColumnsOfTable($db, $table);
        else :
            if (empty($lesColonnes[$table])) :
                self::storeColumnsOfTable($db, $table);
            endif;
        endif;
        return $_SESSION['columns'][$table];
    }
    public static function storeColumnsOfTable(PDO $db, string $table)
    {
        $lesColonnes = $_SESSION['columns'] ?? [];
        if (!array_key_exists($table, $lesColonnes)) :
            $_SESSION['columns'][$table] = self::getTableChamps($db, $table);
        else :
            if (empty($lesColonnes[$table])) :
                $_SESSION['columns'][$table] = self::getTableChamps($db, $table);
            endif;
        endif;
    }
    public static function getTableChamps(PDO $db, $table)
    {
        $q = $db->prepare("DESCRIBE $table");
        $q->execute();
        $columns = [];
        while ($row = $q->fetch(PDO::FETCH_BOTH)) :
            $columns[$row['Field']] = [
                'Field' => $row['Field'],
                'Type' => $row['Type'],
                'Null' => $row['Null']
            ];
        endwhile;
        return $columns;
    }
    public static function is_foreign_key(string $column, string $table): bool
    {
        $nomTable = str_replace('_id', 's', $column);
        $type = $_SESSION['columns'][$table][$column]['Type'];
        return in_array($nomTable, $_SESSION['tables']) && str_contains($type, 'int');
    }
}
