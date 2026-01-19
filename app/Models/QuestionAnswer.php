<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable = ['question_id','content','is_correct'];

    public function question() {
        return $this->belongsTo(QuestionBank::class, 'question_id');
    }
}
