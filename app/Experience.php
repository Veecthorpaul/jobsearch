<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['name', 'qualification', 'description', 'start', 'end', 'organization', 'type', 'user_id'];

    public function user(){
        return $this->hasOne(User::class);
    }
}
