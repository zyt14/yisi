<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:10
 */

namespace App\Http\Controllers;


use App\Group;
use App\Organize;
use Illuminate\Http\Request;

class OrganizeController extends MyBaseController
{
    public $Organize;
    public $Request;
    public $Group;

    protected $rules = [
        'group_id' => 'required',
        'introduce' => 'required',
    ];
    //规则
    protected $messages = [
        'category_id.required' => '组别id必填',
        'introduce.required' => '介绍必填',
    ];

    //违反规则报错

    public function __construct(Organize $organize,Group $group ,Request $request)
    {
        $this->Organize = $organize;
        $this->Request = $request;
        $this->Group=$group;
    }

    public function add()
    {
        $this->baseAddImg($this->Organize,"组",'photo',$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Organize, "组", $id);
    }

    public function update($id)
    {
        $this->baseUpdateImg($this->Organize,"组","photo", $this->Request,$id);
    }

    public function getList()
    {
        $user=$this->Organize->orderBy('id','desc')->get();
        for ($i=0;$i<sizeof($user);$i++){
            $id=$user[$i]['id'];
            $arr=$this->getListById($id);
            $arrs[]=$arr;
        }
        if (isset($arrs)){
            return $arrs;
        }else{
            return $this->error("查询组失败");
        }
    }

    public function getListById($id)
    {
        $r = $this->Organize->find($id);
        if ($r) {
            $groupId=$r['group_id'];
            $group=$this->Group->find($groupId);
            if ($group!=null){
                $r['group_id']=$group;
            }else{
                $r['group_id']=[];
            }
            return $r;
        } else {
            return $this->error('查询指定id的组失败');
        }
    }

    public function getListByGroupId($id)
    {
        $r = $this->Organize
            ->where('group_id',$id)
            ->get();
        if ($r) {
            for ($i=0;$i<sizeof($r);$i++){
                $groupId=$r[$i]['group_id'];
                $group=$this->Group->find($groupId);
                if ($group!=null){
                    $r[$i]['group_id']=$group;
                }else{
                    $r[$i]['group_id']=[];
                }
            }
            return $r;
        } else {
            return $this->error('查询指定id的组失败');
        }
    }
}
