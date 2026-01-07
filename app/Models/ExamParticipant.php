<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamParticipant extends Model
{
    protected $fillable = ['exam_id','student_id','start_time','submit_time','total_score','status'];

    public function answers() {
        return $this->hasMany(StudentAnswer::class, 'participant_id');
    }
}
