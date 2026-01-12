<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case LECTURER = 'giang_vien';
    case STUDENT = 'sinh_vien';
}
