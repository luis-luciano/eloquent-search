<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SimpleSearchableTables
{
    use SearchableTrait;

    public function scopePaginateForTable(Builder $query)
    {
        $limit = request()->get('limit', 10);
        $q = request()->get('q', '');

        $paginator = $query->paginate($limit);
        $paginator->appends(array_filter(request()->all()));

        return $paginator;
    }
}
