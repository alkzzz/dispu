<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionnaireQuestion extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = [
        'total',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(QuestionnaireAnswer::class);
    }

    public function respondents(): HasMany
    {
        return $this->hasMany(RespondentAnswer::class);
    }

    protected function total(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->respondents->sum('score'));
    }
}
