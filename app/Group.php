<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:41
 */

namespace App;


class Group extends BaseModel
{
    protected $table = 'group';//组别

    protected $fillable = [
        'name','english_name','state'
        //组名   英文名            状态
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
