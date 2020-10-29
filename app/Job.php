<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Job extends Model
{   
    protected $fillable =['user_id', 'company_id', 'level','title','slug','description' ,
    'requirements','industry' ,'location' ,'gender','type','status','lastdate','experience','salary','applicants','category_id'];
    
    public function getRouteKeyName(){
        return 'slug';
    }
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    
    public function users(){
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
    public function checkApplication(){
    	return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }


   

}
