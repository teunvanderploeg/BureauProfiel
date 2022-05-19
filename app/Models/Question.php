<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $fillable = ['question', 'slug', 'answer_type', 'sample_answers', 'visible', 'rules', 'searchable'];

    protected $casts = [
        'rules' => 'array',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getArrayOfAnswers()
    {
        return explode(',', $this->sample_answers);
    }
}
