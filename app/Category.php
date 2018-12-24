<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:41
 */

namespace App;


class Category extends BaseModel
{
    protected $table = 'category';//分类

    protected $fillable = [
        'name'
        //名称
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
