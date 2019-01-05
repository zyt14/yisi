<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:43
 */

namespace App\Http\Controllers;


use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends MyBaseController
{
    public $Category;
    public $Request;
    public $Article;

    protected $rules = [
        'name' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '分类名必填',
    ];

    //违反规则报错

    public function __construct(Category $category,Article $article, Request $request)
    {
        $this->Category = $category;
        $this->Request = $request;
        $this->Article=$article;
    }

    public function add()
    {
        $this->baseAdd($this->Category, "分类", $this->Request);
    }

    public function del($id)
    {
        $cg=$this->Category->find($id);
        if ($cg){
            $this->Article->where('category_id',$id)->delete();
            $cg->delete();
            return "删除指定分类及文章成功";
        }else{
            return "无指定id的分类";
        }

        die();
        $cg->delete();
    }

    public function update($id)
    {
        $this->baseUpdate($this->Category, "分类", $this->Request, $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Category, "分类");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Category, "分类", $id);
    }
}
