<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:11
 */

namespace App;


class Competition extends BaseModel
{
    protected $table = 'competition';//比赛

    protected $fillable = [
        'content','start_time','end_time','photo'
        //内容       时间    照片
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
