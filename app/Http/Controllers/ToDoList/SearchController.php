<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $s = $request->s;
        $request->validate([
            's' => 'required',
        ]);

        $lists = ToDoList::like($s)->with('tags')->get();

        return view('list.search', compact('lists', 's'));
    }

    public function main(Request $request, Tag $tag)
    {
        $tag = Tag::like($tag->title)->with('lists')->first();
        $lists = $tag->lists;

        return view('tag.search', compact('lists'));
    }
}
