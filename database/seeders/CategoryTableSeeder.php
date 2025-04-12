<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Interfaces\CategoryInterface;

class CategoryTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $categories = [
        [
            'name'     => 'Income',
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
        foreach ($this->categories as $key => $value) {
            $category = app(CategoryInterface::class)->createCategory($value);
            
            if (array_key_exists('children', $value)) {
                app(CategoryInterface::class)->createCategory(array_merge(
                    [
                        'parent_id' => $category->id,
                    ],
                    $value
                ));
            }
        }
    }
}
