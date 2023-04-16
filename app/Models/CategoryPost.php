<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_post';

    protected $fillable = [
        'category_id',
        'post_id'
    ];
}
