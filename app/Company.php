<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{   
  
    protected $guarded =[];
    public function getRouteKeyName(){
    return 'slug';
    }
    
    public function jobs(){
        return $this->hasMany('App\Job');
    }
    

    public function isFollowing(){
    	return \DB::table('follows')->where('candidate_id',auth()->user()->id)->where('company_id',$this->id)->exists();
    }
    
}
