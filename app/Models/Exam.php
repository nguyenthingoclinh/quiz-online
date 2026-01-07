<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title','exam_type','start_time','end_time','duration','created_by'];

    public function questions() {
        return $this->hasMany(ExamQuestion::class);
    }
}
