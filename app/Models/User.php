<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['username','password','full_name','email','role'];

    public function questions() {
        return $this->hasMany(Question::class, 'created_by');
    }

    public function exams() {
        return $this->hasMany(Exam::class, 'created_by');
    }
}
