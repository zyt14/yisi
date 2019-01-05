<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App\Http\Controllers;


use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends MyBaseController
{
    public $Article;
    public $Request;
    public $Category;

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

    public function __construct(Article $article,Category $category, Request $request)
    {
        $this->Article = $article;
        $this->Request = $request;
        $this->Category=$category;
    }

    public function add()
    {
        $this->baseAddImg($this->Article,"文章",'photo',$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Article, "文章", $id);
    }

    public function update($id)
    {
        $this->baseUpdateImg($this->Article,"文章","photo", $this->Request,$id);
    }

    public function getList()
    {
        $art=$this->Article->orderBy('id','desc')->get();
        for ($i=0;$i<sizeof($art);$i++){
            $id=$art[$i]['id'];
            $arr=$this->getListById($id);
            $arrs[]=$arr;
        }
        if (isset($arrs)){
            return $arrs;
        }else{
            return $this->error("查询文章失败");
        }
    }

    public function getListById($id)
    {
        $r = $this->Article->find($id);
        if ($r) {
            $categoryId=$r['category_id'];
            $position=$this->Category->find($categoryId);
            if ($position!=null){
                $r['category_id']=$position;
            }else{
                $r['category_id']=[];
            }
            return $r;
        } else {
            return $this->error('查询指定id的文章失败');
        }
    }

    public function getListByCategoryId($category_id)
    {
        $r=$this->Article->where('category_id',$category_id)->get();
        $r=json_decode(json_encode($r),true);
        if ($r) {
            return $r;
        } else {
            return $this->error('查询指定分类id的文章失败');
        }
    }

    public function pageData($data,$length){
        $pageLength=0;$page=0;
        for ($i=0;$i<count($data);$i++){
            if ($pageLength!=$length){
                $pageLength++;
                $arr[$page][]=$data[$i];
            }else{
                $pageLength=0;
                $page++;
                $i--;
            }
        }
        return $arr;
    }

    public function getListPage()
    {
        $art=$this->Article->orderBy('id','desc')->get();
        for ($i=0;$i<sizeof($art);$i++){
            $id=$art[$i]['id'];
            $arr=$this->getListById($id);
            $arrs[]=$arr;
        }
        if (isset($arrs)){
            $arrs=$this->pageData($arrs,5);
            return $arrs;
        }else{
            return $this->error("查询文章失败");
        }
    }

    public function getListPageByCategoryId($category_id)
    {
        $r=$this->Article->where('category_id',$category_id)->get();
        $r=json_decode(json_encode($r),true);
        if ($r) {
            $r=$this->pageData($r,5);
            return $r;
        } else {
            return $this->error('查询指定分类id的文章失败');
        }
    }
    
}
