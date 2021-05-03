<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $table = 'classroom';
    protected $fillable = ['id', 'classCode'];

    function studentNum(){
        return $this->hasMany(ClassStudent::class, 'id_class');
    }
}
