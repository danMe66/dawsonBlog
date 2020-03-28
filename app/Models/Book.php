<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'cover', 'description', 'is_show'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //书籍下的章节
    public function chapter_has_books()
    {
        return $this->hasMany(Chapter::class);
    }

    public function link($params = [])
    {
        return route('books.edit', array_merge([$this->id], $params));
    }
}
