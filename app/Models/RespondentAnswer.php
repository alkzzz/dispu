<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RespondentAnswer extends Model
{
    use HasFactory;

    protected $appends = [
        'score',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function answer(): BelongsTo
    {
        return $this->belongsTo(QuestionnaireAnswer::class, 'questionnaire_answer_id');
    }

    protected function score(): Attribute
    {
        return Attribute::make(get: fn($value) => $this->answer->score);
    }
}
