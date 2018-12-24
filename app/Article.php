<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App;


class Article extends BaseModel
{
    protected $table = 'article';//文章

    protected $fillable = [
        'title','content','photo','category_id'
        //标签    内容        照片     分类id
    ];

    protected $hidden = [

    ];

    public $timestamps = false;
}
