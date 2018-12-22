<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/12
 * Time: 9:44
 */

namespace App;


class Member extends BaseModel
{
    protected $table = 'member';

    protected $fillable = [
        'name',  'grade', 'major', 'phone', 'qq', 'group_id', 'state','photo'
        //姓名     年级      班级      手机号    qq   ·组别      状态     照片
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
