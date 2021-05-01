<?php


namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class StoreBookmarkEntity
 * @package App\Entities
 * @author Ahmed Helal Ahmed
 */
class StoreBookmarkEntity implements Arrayable
{
    private $name;
    private $link;
    private $userId;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'link' => $this->getLink(),
            'user_id' => $this->getUserId()
        ];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return StoreBookmarkEntity
     */
    public function setName($name): StoreBookmarkEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     * @return StoreBookmarkEntity
     */
    public function setLink($link): StoreBookmarkEntity
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return StoreBookmarkEntity
     */
    public function setUserId($userId): StoreBookmarkEntity
    {
        $this->userId = $userId;
        return $this;
    }
}
