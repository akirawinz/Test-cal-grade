<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'GRADE';
    protected $fillable = ['GRADE_NAME','GRADE_CREDIT'];
    protected $primaryKey = 'ID';
}
