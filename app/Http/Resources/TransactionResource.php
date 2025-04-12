<?php
namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code'     => $this->code,
            'date'     => $this->transaction_date,
            'type'     => $this->transaction_type,
            'amount'   => $this->amount,
            'category' => new Category($this->category),
        ];
    }
}
