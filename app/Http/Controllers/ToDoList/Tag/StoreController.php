<?php

namespace App\Http\Controllers\ToDoList\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $list_id = $data['list_id'];
        unset($data['list_id']);


        $tag = Tag::firstOrCreate($data);
        $list = ToDoList::findOrFail($list_id);

        if (isset($tag)) {
            $list->tags()->attach($tag);
        }

        return redirect()->route('list.index');
    }
}
