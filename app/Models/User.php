<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_admin',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return $this->is_admin = 'admin';
    }

    public function isUser(){
        return $this->is_admin = 'user';
    }

    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    // Check has permission true or false

    public function hasPermission($name){
        
        // Check if user not roles then return false

        if( $this->roles == null ){   /* Or !$this->roles */
            return false;
        }
        // If user has role, Check key_name has in Permission Table ( true or false ) 
        return $this->roles->permissions()->where('key_name',$name)->exists();
    }


}
