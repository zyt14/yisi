<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:12
 */

namespace App\Http\Controllers;


use App\Activity;
use App\Group;
use Illuminate\Http\Request;

class ActivityController extends MyBaseController
{
    public $Activity;
    public $Request;
    public $Group;

    protected $rules = [
        'group_id' => 'required',
        'introduce' => 'required',
    ];
    //规则
    protected $messages = [
        'group_id.required' => '组别id必填',
        'introduce.required' => '介绍必填',
    ];

    //违反规则报错

    public function __construct(Activity $activity,Group $group, Request $request)
    {
        $this->Activity = $activity;
        $this->Request = $request;
        $this->Group=$group;
    }

    public function add()
    {
        $this->baseAddImg($this->Activity,"活动",'photo',$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Activity, "活动", $id);
    }

    public function update($id)
    {
        $this->baseUpdateImg($this->Activity,"活动","photo", $this->Request,$id);
    }

    public function getList()
    {
        $user=$this->Activity->orderBy('id','desc')->get();
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
        $r = $this->Activity->find($id);
        if ($r) {
            $groupId=$r['group_id'];
            $position=$this->Group->find($groupId);
            if ($position!=null){
                $r['group_id']=$position;
            }else{
                $r['group_id']=[];
            }
            return $r;
        } else {
            return $this->error('查询指定id的活动失败');
        }
    }
}
