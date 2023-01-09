<?php

namespace App\Http\Controllers\ToDoList\Image;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function __invoke(ToDoList $list)
    {
        return view('image.add', compact('list'));
    }
}
