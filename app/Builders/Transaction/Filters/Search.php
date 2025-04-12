<?php
namespace App\Builders\Transaction\Filters;

use App\Interfaces\Builder\Filter;
use Illuminate\Database\Eloquent\Builder;

class Search implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public static function apply(Builder $builder, $value): Builder
    {
        return $builder->where(function ($query) use ($value) {
            $query->where('code', 'LIKE', '%' . $value . '%');
        });
    }
}
