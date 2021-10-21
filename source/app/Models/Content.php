<?php

namespace App\Models;

use App\Http\Traits\ModelDynamicBindTableTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Content extends BaseModel
{
    use HasFactory, ModelDynamicBindTableTrait;

    public function __construct(array $attributes = [])
    {
        $table = false;
        if (array_key_exists('table', $attributes)) {
            $table = $attributes['table'];
            unset($attributes['table']);
        }
        parent::__construct($attributes);

        if ($table) {
            $this->setTable($table);
        }
    }

    public function scopeFromTable($query, $tableName)
    {
        $query->from($tableName);
        $this->setTable($tableName);
    }

    public function files()
    {
        return ContentFile::fromTable($this->table.'_file')->where('content_id', $this->id)->get();
    }
}
