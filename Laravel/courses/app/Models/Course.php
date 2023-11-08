<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
	protected $fillable = [
    'course',
    'description',
    'number',
    'image',
	'begin',
	'rubric',
    // Все остальные разрешенные поля
];
}
