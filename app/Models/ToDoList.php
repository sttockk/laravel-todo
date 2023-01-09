<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = 'to_do_lists';
    protected $guarded = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'to_do_list_tags', 'to_do_list_id', 'tag_id');
    }

    public function scopeLike($query, $s)
    {
        return $query->where('content', 'LIKE', "%{$s}%");
    }
}
