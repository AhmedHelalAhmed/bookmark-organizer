<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'link',
        'user_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
