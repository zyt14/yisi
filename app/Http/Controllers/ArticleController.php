<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App\Http\Controllers;


use App\Article;
use Illuminate\Http\Request;

class ArticleController extends MyBaseController
{
    public $Article;
    public $Request;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
    ];
    //规则

    protected $messages = [
        'title.required' => '标题必填',
        'content.required' => '内容必填',
        'category_id.required' => '分类id必填',
    ];
    //违反规则报错

    public function __construct(Article $article, Request $request)
    {
        $this->Article = $article;
        $this->Request = $request;
    }
}
