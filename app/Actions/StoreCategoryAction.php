<?php

namespace App\Actions;

use App\Entities\StoreCategoryEntity;
use App\Models\Category;

/**
 * Class StoreCategoryAction
 * @package App\Actions
 * @author Ahmed Helal Ahmed
 */
class StoreCategoryAction
{
    /**
     * @param StoreCategoryEntity $storeCategoryEntity
     * @return mixed
     */
    public function execute(StoreCategoryEntity $storeCategoryEntity)
    {
        return Category::firstOrCreate($storeCategoryEntity->toArray());
    }
}
