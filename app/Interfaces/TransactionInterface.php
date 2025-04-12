<?php
namespace App\Interfaces;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;

interface TransactionInterface
{
    public function listTransactions(): Builder;

    public function createTransaction(array $data): Transaction;

    public function findTransaction(string $key, string $value): Transaction;

    public function updateTransaction(array $data, string $code): Transaction;

    public function deleteTransaction(string $code): bool;
}
