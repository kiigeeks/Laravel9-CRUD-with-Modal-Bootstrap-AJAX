<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plant extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
