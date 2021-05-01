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
        app(ImportBookmarksFormJSONFileAction::class)->execute($this->bookmarkFile);
        session()->flash('success', 'successfully saved.');
        $this->resetFile();
    }

    private function resetFile()
    {
        $this->bookmarkFile = null;
    }

    public function render()
    {
        return view('livewire.import-bookmarks');
    }
}
