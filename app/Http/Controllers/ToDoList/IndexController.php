<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $lists = ToDoList::all();
        return view('list.index', compact('lists'));
    }
}
