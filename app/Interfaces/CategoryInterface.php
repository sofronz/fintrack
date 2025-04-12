<?php
namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

interface CategoryInterface
{
    public function listCategories(): Builder;

    public function createCategory(array $data): Category;

    public function findCategory(string $key, string $value): Category;

    public function updateCategory(array $data, int $id): Category;

    public function deleteCategory(int $id): bool;
}
