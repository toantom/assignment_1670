<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDetail extends Model
{
    use HasFactory;
    protected $table = 'teacher_detail';
    protected $fillable = ['id_teacher', 'gender', 'dob', 'diploma'];
}
