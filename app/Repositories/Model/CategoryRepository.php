<?php
namespace App\Repositories\Model;

use App\Category;
use App\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository
{
    public function getModel()
    {
        return Category::class;
    }
}
