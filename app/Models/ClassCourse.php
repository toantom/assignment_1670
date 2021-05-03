<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;
    protected $table = 'class_courses';
    protected $fillable = ['id', 'id_class', 'id_course', 'id_teacher', 'frametime', 'startDate', 'endDate', 'status'];

    function course(){
        return $this->belongsTo(Course::class, 'id_course');
    }
    function teacher(){
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }
    function class(){
        return $this->belongsTo(ClassRoom::class, 'id_class');
    }
    function exercise(){
        return $this->hasMany(Exercise::class, 'id_class_course');
    }
}
