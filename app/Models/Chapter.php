<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['order'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
