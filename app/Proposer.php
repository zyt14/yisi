<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/12
 * Time: 9:39
 */

namespace App;


class Proposer extends BaseModel
{
    protected $table = 'proposer';//申请人

    protected $fillable = [
        'name', 'grade','major', 'phone', 'qq', 'introduction'
        //姓名    年级     班级      手机号    qq   ·个人介绍
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
