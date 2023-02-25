<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;
    public const USER = 1;
    public const MANAGER = 2;
    public const WORKER = 3;

    public const ADMIN = 4;
}
