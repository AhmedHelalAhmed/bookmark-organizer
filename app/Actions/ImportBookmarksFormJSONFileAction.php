<?php


namespace App\Actions;

use App\Entities\StoreBookmarkEntity;
use App\Entities\StoreCategoryEntity;
use App\Enums\BookmarkEnum;
use App\Enums\CategoryEnum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class ImportBookmarksFormJSONFileAction
{
    private $bookmarks;
    private $categories;

    public function execute(UploadedFile $file)
    {
        $this->bookmarks = $this->mapFileToCollection($file);

        $this->save();
    }

    private function mapFileToCollection(UploadedFile $file): Collection
    {
        return collect(json_decode($file->get(), true));
    }

    private function save()
    {
        $this->bookmarks->each(function (array $bookmark, $key) {
            if ($this->isCategory($bookmark)) {
                $this->createCategory($bookmark, intval($bookmark['id']));
            } else {
                if ($this->isLinkNotBelongsToFolder($bookmark)) {
                    $this->createCategory([
                        'title' => CategoryEnum::FIRST_LEVEL_CATEGORY_NAME
                    ], BookmarkEnum::FIRST_LEVEL);
                }

                $this->createBookmark($bookmark, $this->getCategory(intval($bookmark['parentId'])));
            }
        });
    }

    /**
     * @param array $bookmark
     * @return bool
     */
    private function isCategory(array $bookmark)
    {
        return !array_key_exists('url', $bookmark);
    }

    /**
     * @param $category
     * @param int $oldId
     */
    private function createCategory($category, int $oldId)
    {
        $this->categories[intval($oldId)] = app(StoreCategoryAction::class)
            ->execute($this->createCategoryEntity($category));
    }

    /**
     * @param array $bookmark
     * @return StoreCategoryEntity
     */
    private function createCategoryEntity(array $bookmark): StoreCategoryEntity
    {
        return (new StoreCategoryEntity())
            ->setName($bookmark['title'])
            ->setUserId(auth()->id());
    }

    /**
     * @param array $bookmark
     * @return bool
     */
    private function isLinkNotBelongsToFolder(array $bookmark)
    {
        return intval($bookmark['parentId']) === BookmarkEnum::FIRST_LEVEL;
    }

    /**
     * @param $bookmark
     * @param $categoryId
     */
    private function createBookmark($bookmark, $categoryId)
    {
        (new StoreBookmarkAction())
            ->execute(
                $this->createBookEntity($bookmark),
                $categoryId
            );
    }

    /**
     * @param $bookmark
     * @return StoreBookmarkEntity
     */
    private function createBookEntity($bookmark): StoreBookmarkEntity
    {
        return (new StoreBookmarkEntity())
            ->setName($bookmark['title'])
            ->setLink($bookmark['url'])
            ->setUserId(auth()->id());
    }

    /**
     * @param int $parentId
     * @return int
     */
    private function getCategory(int $parentId)
    {
        if (isset($this->categories[$parentId])) {
            return $this->categories[$parentId]->id;
        }

        $this->createCategory([
            'title' => CategoryEnum::OTHER_BOOKMARKS_CATEGORY_NAME
        ], BookmarkEnum::SECOND_LEVEL);
        return $this->categories[BookmarkEnum::SECOND_LEVEL]->id;
    }
}
