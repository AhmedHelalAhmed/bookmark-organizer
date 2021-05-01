<?php

namespace App\Actions;

use App\Entities\StoreBookmarkEntity;
use App\Events\BookmarkCreatedEvent;
use App\Models\Bookmark;

/**
 * Class StoreBookmarkAction
 * @package App\Actions
 * @author Ahmed Helal Ahmed
 */
class StoreBookmarkAction
{
    /**
     * @param StoreBookmarkEntity $storeBookmarkEntity
     * @param int $categoryId
     * @return mixed
     */
    public function execute(StoreBookmarkEntity $storeBookmarkEntity, int $categoryId)
    {
        $bookmark = Bookmark::firstOrCreate($storeBookmarkEntity->toArray());
        event(new BookmarkCreatedEvent($bookmark->id, $categoryId));
        return $bookmark;
    }
}
