<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'post_text', 'category_id'];
    // pt a afisa numele categoriei in loc de id
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
