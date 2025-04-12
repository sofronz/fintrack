<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Interfaces\CategoryInterface;
use Illuminate\Support\Facades\Schema;

class CategoryTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $categories = [
        [
            'name'     => 'Income',
            'slug'     => 'income',
            'children' => [
                [
                    'name' => 'Business',
                ],
                [
                    'name' => 'Investments',
                ],
                [
                    'name' => 'Extra Income',
                ],
                [
                    'name' => 'Deposits',
                ],
                [
                    'name' => 'Salary',
                ],
                [
                    'name' => 'Savings',
                ],
            ],
        ],
        [
            'name'     => 'Expense',
            'slug'     => 'expense',
            'children' => [
                [
                    'name' => 'Bills',
                ],
                [
                    'name' => 'Clothes',
                ],
                [
                    'name' => 'Travel',
                ],
                [
                    'name' => 'Food',
                ],
                [
                    'name' => 'Shopping',
                ],
                [
                    'name' => 'Entertainment',
                ],
            ],
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();

        foreach ($this->categories as $key => $value) {
            $children = $value['children'] ?? [];
            
            unset($value['children']);
            $category = app(CategoryInterface::class)->createCategory($value);

            foreach ($children as $key => $child) {
                app(CategoryInterface::class)->createCategory(array_merge(
                    [
                        'parent_id' => $category->id,
                        'slug'      => $category->slug . '-' . Str::slug($child['name']),
                    ],
                    $child
                ));
            }
        }
    }
}
