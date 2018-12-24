<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:12
 */

namespace App\Http\Controllers;


use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends MyBaseController
{
    public $Activity;
    public $Request;

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

    public function __construct(Activity $activity, Request $request)
    {
        $this->Activity = $activity;
        $this->Request = $request;
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
        $this->baseUpdate($this->Activity, "活动", $this->Request, $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Activity, "活动");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Activity, "活动", $id);
    }
}
