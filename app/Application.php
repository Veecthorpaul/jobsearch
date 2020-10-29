<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['user_id', 'job_id','job_title','job_location','job_slug','job_lastdate','job_level'];

}
