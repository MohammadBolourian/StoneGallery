<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lyric extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name','body','status','category_id'];

    public function lyricCategory()
    {
        return $this->belongsTo(LyricCategory::class, 'category_id');
    }
}
