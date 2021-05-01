<?php

namespace App\Http\Livewire;

use App\Actions\IndexCategoriesWithBookmarksAction;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBookmarksCategorized extends Component
{
    use WithPagination;

    protected $listeners=['bookmarksImported'=> '$refresh'];

    public function render()
    {
        return view(
            'livewire.show-bookmarks-categorized',
            [
                'categories'=>(new IndexCategoriesWithBookmarksAction())->execute()
            ]
        );
    }
}
