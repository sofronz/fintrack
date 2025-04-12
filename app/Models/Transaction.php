<?php
namespace App\Models;

use App\Enum\TransactionType;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @var string
     */
    protected $table = 'ft_transactions';

    /**
     * @var array
     */
    protected $fillable = [
        'code',
        'transaction_type',
        'transaction_date',
        'amount',
        'category_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'transaction_type' => TransactionType::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
