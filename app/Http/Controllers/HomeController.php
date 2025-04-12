<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Interfaces\CategoryInterface;
use App\Interfaces\TransactionInterface;
use App\Http\Requests\TransactionRequest;
use Artesaos\SEOTools\Contracts\SEOTools;
use App\Builders\Transaction\TransactionQuery;

class HomeController extends Controller
{
    /**
     * @param SEOTools $meta
     */
    public function __construct(private SEOTools $meta)
    {
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $this->meta->setTitle('Manage Expense & Income');

        $transactions = TransactionQuery::apply($request)->get();
        $categoryRepo = app(CategoryInterface::class);

        $data = [
            'types'    => TransactionType::cases(),
            'incomes'  => $categoryRepo->listCategories()->whereHas('parent', fn ($q) => $q->where('slug', 'income'))->get(),
            'expenses' => $categoryRepo->listCategories()->whereHas('parent', fn ($q) => $q->where('slug', 'expense'))->get(),
        ];

        return view('home', compact('transactions', 'data'));
    }

    /**
     * @param TransactionRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->fieldInputs();
        app(TransactionInterface::class)->createTransaction($data);

        return redirect()->back()->with('success', 'Transactions created!');
    }

    /**
     * @param string $code
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $code)
    {
        app(TransactionInterface::class)->deleteTransaction($code);

        return redirect()->back()->with('success', 'Transactions deleted!');
    }
}
