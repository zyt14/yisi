<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:10
 */

namespace App;


class Organize extends BaseModel
{
    protected $table = 'organize';//组

    protected $fillable = [
        'group_id','photo','introduce','state'
        //组别id      照片     介绍          状态
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
