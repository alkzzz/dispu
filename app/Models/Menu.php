<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'title', 'type', 'type_id', 'order', 'has_child', 'parent_id'];

    protected $casts = [
        'child' => 'array'
    ];

}
