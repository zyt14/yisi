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
    protected $table = 'studio';

    protected $fillable = [
        'content'
        //内容
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
