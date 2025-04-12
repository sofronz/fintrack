<?php
namespace App\Builders\Transaction;

use Illuminate\Http\Request;
use App\Interfaces\Builder\Query;
use App\Interfaces\TransactionInterface;
use Illuminate\Database\Eloquent\Builder;
use App\Builders\Transaction\Filters\Search;
use App\Builders\Transaction\Filters\Periode\EndDate;
use App\Builders\Transaction\Filters\Periode\StartDate;

class TransactionQuery implements Query
{
    /**
     * Apply filters and conditions to the transaction query based on the provided request.
     *
     * @param Request $request
     *
     * @return Builder
     */
    public static function apply(Request $request): Builder
    {
        $query = app(TransactionInterface::class)->listTransactions();

        if ($request->has('search')) {
            $query = Search::apply($query, $request->get('search'));
        }

        if ($request->has('start_date')) {
            $query = StartDate::apply($query, $request->get('start_date'));
        }

        if ($request->has('end_date')) {
            $query = EndDate::apply($query, $request->get('end_date'));
        }

        return $query;
    }
}
