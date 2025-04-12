<?php
namespace App\Builders\Transaction\Filters;

use App\Interfaces\Builder\Filter;
use Illuminate\Database\Eloquent\Builder;

class Type implements Filter
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
            $query->where('transaction_type', $value);
        });
    }
}
