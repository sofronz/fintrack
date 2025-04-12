<?php
namespace App\Services;

use App\Models\Transaction;
use App\Interfaces\TransactionInterface;
use Illuminate\Database\Eloquent\Builder;

class TransactionService implements TransactionInterface
{
    /**
     * @var Transaction
     */
    protected $model;

    /**
     * TransactionService Constructor
     *
     * Initializes the service with the transaction model.
     */
    public function __construct()
    {
        $this->model = new Transaction();
    }

    /**
     * Retrieve a new query builder for the transaction model.
     *
     * @return Builder
     */
    public function listTransactions(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Create a new transaction in the database.
     *
     * @param array $data
     *
     * @return Transaction
     */
    public function createTransaction(array $data): Transaction
    {
        try {
            return $this->model->create($data);
        } catch (\Illuminate\Database\QueryException $th) {
            throw $th;
        }
    }

    /**
     * Find a transaction by a specific key and value.
     *
     * @param string $key
     * @param string $value
     *
     * @return Transaction
     */
    public function findTransaction(string $key, string $value): Transaction
    {
        return $this->model->where($key, $value)->first();
    }

    /**
     * Update a transaction's data by code.
     *
     * @param array $data
     * @param string $id
     *
     * @return Transaction
     */
    public function updateTransaction(array $data, string $code): Transaction
    {
        $transaction = $this->findTransaction('code', $code);

        try {
            $transaction->update($data);

            return $this->findTransaction('code', $code);
        } catch (\Illuminate\Database\QueryException $th) {
            throw $th;
        }
    }

    /**
     * Delete a transaction by Code.
     *
     * @param string $code
     *
     * @return bool
     */
    public function deleteTransaction(string $code): bool
    {
        $transaction = $this->findTransaction('code', $code);

        return $transaction->delete();
    }
}
