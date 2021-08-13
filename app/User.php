<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Cook;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    
    public function cooks()
    {
        return $this->hasMany(Cook::class);
    }
    
    //このユーザの投稿に絞り込み
    //public function user_cooks()
    //{
    //    $userId = $this->cooks()->pluck('cooks.user_id')->toArray();
    //    $userId[] = $this->id;
    //    return Cook::whereIn('user_id',$userId);
    //}
}
