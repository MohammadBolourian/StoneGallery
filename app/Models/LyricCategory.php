<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LyricCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = ['image' => 'array'];
    protected $fillable = ['name','image','status'];

//    public function lyric()
//    {
//        return $this->hasMany(Lyric::class, 'id');
//    }
}
