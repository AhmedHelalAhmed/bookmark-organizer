<?php


namespace App\Actions;


use App\Models\Category;

class IndexCategoriesWithBookmarksAction
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function execute()
    {
        return Category::with('bookmarks')->paginate(1);
    }
}
