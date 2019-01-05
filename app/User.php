<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    protected $table = 'user';//大二用户

    protected $fillable = [
        'name', 'grade', 'major', 'phone', 'qq', 'position_id', 'introduction','photo','state'
        //姓名     年级      班级      手机号    qq   ·职位id       个人介绍        照片       状态
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
