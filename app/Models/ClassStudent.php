<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;
    protected $table = 'class_student';
    protected $fillable = ['id', 'id_class', 'id_student'];

    function student(){
        return $this->belongsTo(Student::class, 'id_student');
    }
    function class(){
        return $this->belongsTo(ClassRoom::class, 'id_class');
    }
    function course(){
        return $this->belongsTo(ClassCourse::class, 'id_class');
    }
}
