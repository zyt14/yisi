<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App\Http\Controllers;


use App\Group;
use App\Production;
use Illuminate\Http\Request;

class ProductionController extends MyBaseController
{
    public $Production;
    public $Request;
    public $Group;

    protected $rules = [
        'name' => 'required',
        'group_id' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '作品名必填',
        'group_id.required' => '组别id必填',
    ];

    //违反规则报错

    public function __construct(Production $production,Group $group, Request $request)
    {
        $this->Production = $production;
        $this->Request = $request;
        $this->Group=$group;
    }

    public function add()
    {
        $this->baseAddImg($this->Production,"作品",'photo',$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Production, "作品", $id);
    }

    public function update($id)
    {
        $this->baseUpdateImg($this->Production,"作品","photo", $this->Request,$id);
    }

    public function getList()
    {
        $user=$this->Production->orderBy('id','desc')->get();
        for ($i=0;$i<sizeof($user);$i++){
            $id=$user[$i]['id'];
            $arr=$this->getListById($id);
            $arrs[]=$arr;
        }
        return $arrs;
    }

    public function getListById($id)
    {
        $r = $this->Production->find($id);
        $groupId=$r['group_id'];
        $position=$this->Group->find($groupId);
        if ($position!=null){
            $r['group_id']=$position;
        }else{
            $r['group_id']=[];
        }
        if ($r) {
            return $r;
        } else {
            return $this->error('查询指定id的作品失败');
        }
    }
}
