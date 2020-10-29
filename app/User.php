<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
use App\Company;
use App\User;
use App\Role;

class User extends Authenticatable 
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */ 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function experience(){
        return $this->belongsToMany(Experience::class);
    }
    
    public function company(){ 
        return $this->hasOne(Company::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

     public function checkShortlist(){
    	return \DB::table('shortlists')->where('company_id',auth()->user()->id)->where('candidate_id',$this->id)->exists();
    }

   
}
