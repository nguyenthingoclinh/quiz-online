<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamParticipant extends Model
{
    protected $casts = [
        'start_time'  => 'datetime',
        'submit_time' => 'datetime',
    ];

    protected $fillable = ['exam_id','student_id','start_time','submit_time','total_score','status'];

    public function answers() {
        return $this->hasMany(StudentAnswer::class, 'participant_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
