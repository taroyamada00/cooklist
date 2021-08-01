<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    protected $fillable = ['date','when','menu','ingregient','memo','url',];
    
    //1つのCookを所有するユーザ。（Userモデルとの関係を定義）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
