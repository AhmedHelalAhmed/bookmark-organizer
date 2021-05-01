<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookmarkCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $categoryId;
    private $bookmarkId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $bookmarkId, int $categoryId)
    {
        $this->bookmarkId=$bookmarkId;
        $this->categoryId=$categoryId;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return int
     */
    public function getBookmarkId(): int
    {
        return $this->bookmarkId;
    }
}
