<?php
namespace App\Http\Requests;

use Illuminate\Support\Str;
use App\Enum\TransactionType;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'                     => ['required', new Enum(TransactionType::class)],
            'category_income'          => 'required_if:type,INCOME',
            'category_expense'         => 'required_if:type,EXPENSE',
            'amount'                   => 'required',
            'date'                     => 'required',
        ];
    }

    /**
     * @return array
     */
    public function fieldInputs()
    {
        return [
            'code'             => Str::uuid(),
            'transaction_type' => $this->type,
            'category_id'      => $this->type == 'INCOME' ? $this->category_income : $this->category_expense,
            'amount'           => $this->amount,
            'transaction_date' => $this->date,
        ];
    }
}
