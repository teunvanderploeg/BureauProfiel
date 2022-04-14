<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;

    public $fillable = ['email', 'accepted', 'notes'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
