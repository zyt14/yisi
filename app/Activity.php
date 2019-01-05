<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:12
 */

namespace App;


class Activity extends BaseModel
{
    protected $table = 'activity';//工作室活动

    protected $fillable = [
        'group_id','photo','introduce','state'
        //组别id      照片     活动介绍      状态
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
