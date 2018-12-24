<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:43
 */

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Http\Request;

class CategoryController extends MyBaseController
{
    public $Category;
    public $Request;

    protected $rules = [
        'name' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '分类名必填',
    ];

    //违反规则报错

    public function __construct(Category $category, Request $request)
    {
        $this->Category = $category;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAdd($this->Category, "分类", $this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Category, "分类", $id);
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
