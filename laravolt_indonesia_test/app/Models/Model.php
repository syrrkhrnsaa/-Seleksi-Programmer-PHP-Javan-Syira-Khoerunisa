<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    protected $keyType = 'string';

    protected $searchableColumns = ['code', 'name'];

    protected $casts = [
        'meta' => 'array',
    ];

    protected $guarded = [];

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('laravolt.indonesia.table_prefix') . $this->getTable());
    }

    public function scopeSearch($query, $keyword)
    {
        if ($keyword && $this->searchableColumns) {
            foreach ($this->searchableColumns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $keyword . '%');
            }
        }
    }
}