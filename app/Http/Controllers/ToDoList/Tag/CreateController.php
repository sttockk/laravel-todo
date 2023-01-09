<?php

namespace App\Http\Controllers\ToDoList\Tag;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(ToDoList $list)
    {
        return view('tag.create', compact('list'));
    }
}
