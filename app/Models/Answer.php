<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public $fillable = ['respondent_id', 'question_id', 'answer'];

    public function respondents()
    {
        return $this->hasOne(Respondent::class);
    }
    public function questions()
    {
        return $this->hasOne(Question::class);
    }
}
