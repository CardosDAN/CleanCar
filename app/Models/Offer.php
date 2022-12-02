<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = ['price', 'post_id', 'user_id'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
