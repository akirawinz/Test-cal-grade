<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'SUBJECT';
    protected $fillable = ['SUBJECT','CREDIT'];
    protected $primaryKey = 'ID';
}
