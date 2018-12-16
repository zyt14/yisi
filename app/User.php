<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'name', 'password', 'grade', 'major', 'phone', 'qq', 'position', 'introduction','photo'
        //姓名    密码          年级      班级      手机号    qq   ·职位         个人介绍        照片
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;
}
