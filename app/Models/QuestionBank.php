<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $fillable = ['content','difficulty', 'created_by'];

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
