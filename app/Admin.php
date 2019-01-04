<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2019/1/4
 * Time: 13:51
 */

namespace App;


class Admin extends BaseModel
{
    protected $table = 'admin';//超级管理员

    protected $fillable = [
        'name','password'
        //用户名 密码
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
