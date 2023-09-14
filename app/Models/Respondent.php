<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Respondent extends Model
{
    use HasFactory;

    protected $appends = [
        'total_score',
        'nrrt',
        'ikm'
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function respondentAnswers(): HasMany
    {
        return $this->hasMany(RespondentAnswer::class);
    }

    protected function nrrt(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->respondentAnswers->avg('score'));
    }

    protected function totalScore(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->respondentAnswers->sum('score'));
    }

    protected function ikm(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->respondentAnswers->avg('score') * 25);
    }
}
