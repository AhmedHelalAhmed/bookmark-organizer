<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexingBookmarkController extends Controller
{
    public function __invoke()
    {
        return view('bookmarks.index');
    }
}
