<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'STUDENT';
    protected $fillable = ['ID_S','GRADE'];
    protected $primaryKey = 'SID';
}
