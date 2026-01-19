<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    protected $fillable = ['participant_id','question_id','answer','score'];
    public function participant() {
        return $this->belongsTo(ExamParticipant::class, 'participant_id');
    }
    public function question() {
        return $this->belongsTo(QuestionBank::class, 'question_id');
    }
}
