<?php

namespace App\Http\Livewire;

use App\Actions\ImportBookmarksFormJSONFileAction;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportBookmarks extends Component
{
    use WithFileUploads;

    public $bookmarkFile;

    public function updatedBookmarkFile()
    {
        (new ImportBookmarksFormJSONFileAction())->execute($this->bookmarkFile);
        $this->emit('bookmarksImported');
        session()->flash('success', 'successfully saved.');
    }

    public function render()
    {
        return view('livewire.import-bookmarks');
    }
}
