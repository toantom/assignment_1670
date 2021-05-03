<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'student';
    protected $fillable = ['id', 'name', 'username', 'password'];
    protected $hidden = [
        'password',
    ];
}
