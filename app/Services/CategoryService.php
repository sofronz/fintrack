<?php
namespace App\Services;

use App\Models\Category;
use App\Interfaces\CategoryInterface;
use Illuminate\Database\Eloquent\Builder;

class CategoryService implements CategoryInterface
{
    /**
     * @var Category
     */
    protected $model;

    /**
     * CategoryService Constructor
     *
     * Initializes the service with the category model.
     */
    public function __construct()
    {
        $this->model = new Category();
    }

    /**
     * Retrieve a new query builder for the category model.
     *
     * @return Builder
     */
    public function listCategories(): Builder
    {
        return $this->model->newQuery();
    }

    /**
     * Create a new category in the database.
     *
     * @param array $data
     *
     * @return Category
     */
    public function createCategory(array $data): Category
    {
        try {
            return $this->model->create($data);
        } catch (\Illuminate\Database\QueryException $th) {
            throw $th;
        }
    }

    /**
     * Find a category by a specific key and value.
     *
     * @param string $key
     * @param string $value
     *
     * @return Category
     */
    public function findCategory(string $key, string $value): Category
    {
        return $this->model->where($key, $value)->first();
    }

    /**
     * Update a category's data by ID.
     *
     * @param array $data
     * @param int $id
     *
     * @return Category
     */
    public function updateCategory(array $data, int $id): Category
    {
        $category = $this->findCategory('id', $id);

        try {
            $category->update($data);

            return $this->findCategory('id', $id);
        } catch (\Illuminate\Database\QueryException $th) {
            throw $th;
        }
    }

    /**
     * Delete a category by ID.
     *
     * @param int $id
     *
     * @return bool
     */
    public function deleteCategory(int $id): bool
    {
        $category = $this->findCategory('id', $id);

        return $category->delete();
    }
}
