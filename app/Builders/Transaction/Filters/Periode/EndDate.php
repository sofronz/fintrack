<?php
namespace App\Builders\Transaction\Filters\Periode;

use Carbon\Carbon;
use App\Interfaces\Builder\Filter;
use Illuminate\Database\Eloquent\Builder;

class EndDate implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public static function apply(Builder $builder, $value): Builder
    {
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');
        $end_date   = Carbon::parse($value)->addDays(1)->format('Y-m-d');

        if (request('start_date') == $value || request('start_date') == null) {
            return $builder->whereDate('transaction_date', $start_date);
        }

        return $builder->whereBetween('transaction_date', [$start_date, $end_date]);
    }
}
