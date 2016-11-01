<?php

namespace CodePress\CodeCategory\Repository;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeDatabase\AbstractRepository;

class CategoryRepositoryEloquent extends AbstractRepository implements CategoryRepositoryInterface
{

    public function model()
    {
        return Category::class;
    }

}