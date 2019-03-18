<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App;


class Production extends BaseModel
{
    protected $table = 'production';//作品

    protected $fillable = [
        'name','photo','group_id','url'
        //作品名称 照片    组别id      超链接
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
