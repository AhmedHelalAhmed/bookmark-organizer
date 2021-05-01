<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class StoreCategoryEntity
 * @package App\Entities
 * @author Ahmed Helal Ahmed
 */
class StoreCategoryEntity implements Arrayable
{
    private $name;
    private $userId;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
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
     * @return StoreCategoryEntity
     */
    public function setName($name): StoreCategoryEntity
    {
        $this->name = $name;
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
     * @return StoreCategoryEntity
     */
    public function setUserId($userId): StoreCategoryEntity
    {
        $this->userId = $userId;
        return $this;
    }
}
