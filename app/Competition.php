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
        'content','start_time','end_time','photo','title','state'
        //内容       开始时间       结束时间    照片      标题     状态
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
