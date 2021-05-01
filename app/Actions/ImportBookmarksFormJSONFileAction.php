<?php


namespace App\Actions;

use App\Entities\StoreBookmarkEntity;
use App\Entities\StoreCategoryEntity;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class ImportBookmarksFormJSONFileAction
{
    private $bookmarks;
    private $category;

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
        $countAll = $this->bookmarks->count();
        $this->bookmarks->each(function (array $bookmark, $key) use ($countAll) {
            if ($this->isCategory($bookmark)) {
                $this->category = app(StoreCategoryAction::class)
                    ->execute($this->createCategoryEntity($bookmark));
            } else {
                app(StoreBookmarkAction::class)
                    ->execute($this->createBookEntity($bookmark), $this->category->id);
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
     * @param array $bookmark
     * @return StoreCategoryEntity
     */
    private function createCategoryEntity(array $bookmark): StoreCategoryEntity
    {
        return (new StoreCategoryEntity())
            ->setName($bookmark['title'])
            ->setUserId(auth()->id());
    }
}
