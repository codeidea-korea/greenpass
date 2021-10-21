<?php


namespace App\Http\Traits;


trait ModelDynamicBindTableTrait
{
    protected $table = null;

    public function bind(string $table)
    {
        $this->setTable($table);
    }

    public function newInstance($attributes = [], $exists = false)
    {
        $table_model_name = parent::newInstance($attributes, $exists);
        $table_model_name->setTable($this->table);

        return $table_model_name;
    }
}
