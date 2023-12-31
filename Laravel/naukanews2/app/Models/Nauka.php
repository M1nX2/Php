<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nauka extends Model
{
    protected $fillable = ['title', 'lid', 'content','image','rubric'];
    use HasFactory;
}
