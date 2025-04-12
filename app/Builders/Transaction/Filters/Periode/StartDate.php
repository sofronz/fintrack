<?php
namespace App\Builders\Transaction\Filters\Periode;

use Carbon\Carbon;
use App\Interfaces\Builder\Filter;
use Illuminate\Database\Eloquent\Builder;

class StartDate implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */
    public static function apply(Builder $builder, $value): Builder
    {
        $start_date = Carbon::parse($value)->format('Y-m-d');
        $end_date   = Carbon::parse(request('end_date'))->addDays(1)->format('Y-m-d');

        if ($value == request('end_date') || request('end_date') == null) {
            return $builder->whereDate('transaction_date', $start_date);
        }

        return $builder->whereBetween('transaction_date', [$start_date, $end_date]);
    }
}
