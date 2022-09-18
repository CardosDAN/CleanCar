<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'url', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Post::class, 'product_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
