<?php

namespace App\Listeners;

use App\Actions\StoreBookmarkCategoryAction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BookmarkCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        (new StoreBookmarkCategoryAction)
            ->execute(
                $event->getBookmarkId(),
                $event->getCategoryId()
            );
    }
}
