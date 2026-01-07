<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question_bank';
    protected $fillable = ['content','type','created_by'];

    public function answers() {
        return $this->hasMany(QuestionAnswer::class);
    }
}
