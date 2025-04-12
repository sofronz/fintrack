<?php
namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use NodeTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'ft_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
    ];
}
