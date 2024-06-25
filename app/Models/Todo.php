<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // This property makes the values in the db fillable
    // else you cannot post contents to them
    protected $fillable = ['title', 'description', 'is_completed', 'deadline'];
}
