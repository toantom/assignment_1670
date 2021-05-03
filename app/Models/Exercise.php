<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercises';
    protected $fillable = ['id_class_course', 'ex', 'finalDate', 'status'];

    function classCourse(){
        $this->belongsTo(ClassCourse::class,'id_class_course');
    }
}
