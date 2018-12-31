<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/31
 * Time: 14:48
 */

namespace App;


class Adviser extends BaseModel
{
    protected $table = 'adviser';//指导老师

    protected $fillable = [
        'name','phone','photo','introduce'
        //名称   手机     照片      介绍
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
