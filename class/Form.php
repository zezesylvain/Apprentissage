<?php
class Form
{
    private string $table;
    private array $columns;

    public function __construct($table)
    {
        $this->table = $table;
        $this->columns = $_SESSION['columns'][$table];
    }
    public function getTable()
    {
        return $this->table;
    }
    public function getColumns()
    {
        return $this->columns;
    }
    public function builder(array $colonnes)
    {
        $html = "";
    }
}
