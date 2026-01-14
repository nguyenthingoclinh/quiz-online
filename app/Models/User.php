<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRole;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['username','password','full_name','email','role'];
    protected $casts = ['role' => UserRole::class];

    public function questions() {
        return $this->hasMany(QuestionBank::class, 'created_by');
    }

    public function exams() {
        return $this->hasMany(Exam::class, 'created_by');
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isLecturer(): bool
    {
        return $this->role === UserRole::LECTURER;
    }

    public function isStudent(): bool
    {
        return $this->role === UserRole::STUDENT;
    }
}
