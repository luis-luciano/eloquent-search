<?php

namespace LuisLuciano\EloquentSearch\Traits;

use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    /**
     * Search in Model from Request.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchFromRequest(Builder $query): Builder
    {
        extract(request()->all());

        if (isset($q)) {
            return $query->search($q);
        }

        return $query;
    }

    /**
     * Adds a search scope.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string  $search
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, $search = "")
    {
        if (!empty($search) && is_string($search)) {
            return $this->filterByColumn($query, $search);
        }

        return $query;
    }

    /**
     * Filter the data by column data.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function filterByColumn(Builder $query, $search = "")
    {
        $kindOfWhere = 'orWhere';

        if (count($query->getQuery()->wheres)) {
            $kindOfWhere = 'where';
        }

        foreach ($this->searchable as $dataType => $field) {
            if ((is_string($dataType) && ($dataType == 'integer' || $dataType == 'float')) || ($field == $this->primaryKey && $this->incrementing)) {
                $numericFields = explode('|', $field);

                foreach ($numericFields as $numericField) {
                    settype($search, $dataType);
                    $query->$kindOfWhere($numericField, $search);
                }
            } else {
                switch (config('database.default')) {
                    case 'pgsql':$query->$kindOfWhere($field, 'ILIKE', "%{$search}%");
                        break;
                    default:
                        $query->$kindOfWhere($field, 'LIKE', "%{$search}%");
                }
            }

            $kindOfWhere = 'orWhere';
        }

        return $query;
    }

}
