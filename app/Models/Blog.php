<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory ,SoftDeletes;
    protected $casts = ['image' => 'array'];
    protected $fillable = ['name','image','status','body','tags'];
}
