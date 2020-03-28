<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic_has_book extends Model
{
    protected $fillable = ['order'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    //章节下的文章
    public function topics_has_chapter()
    {
        return $this->belongsTo(Post::class);
    }
}
