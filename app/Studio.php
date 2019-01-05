<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:41
 */

namespace App;


class Studio extends BaseModel
{
    protected $table = 'studio';//工作室

    protected $fillable = [
        'content','name','state'
        //内容       名称    状态
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
