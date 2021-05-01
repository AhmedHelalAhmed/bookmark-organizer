<?php


namespace App\Actions;

use App\Models\BookmarkCategory;

/**
 * Class StoreBookmarkCategoryAction
 * @package App\Actions
 * @author Ahmed Helal Ahmed
 */
class StoreBookmarkCategoryAction
{
    /**
     * @param int $bookmarkId
     * @param int $categoryId
     */
    public function execute(int $bookmarkId, int $categoryId)
    {
        BookmarkCategory::firstOrCreate([
            'category_id' => $categoryId,
            'bookmark_id' => $bookmarkId
        ]);
    }
}
