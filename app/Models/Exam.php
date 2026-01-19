<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title', 'description', 'exam_type', 'subject', 'grade', 'duration', 'pass_score', 'start_at', 'created_by'];

    public function questions() {
        return $this->hasMany(ExamQuestion::class);
    }

    public function participants()
    {
        return $this->hasMany(ExamParticipant::class);
    }
}
