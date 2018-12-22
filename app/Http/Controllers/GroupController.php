<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:43
 */

namespace App\Http\Controllers;


use App\Group;
use Illuminate\Http\Request;

class GroupController extends MyBaseController
{
    public $Group;
    public $Request;

    protected $rules = [
        'name' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '组名必填',
    ];

    //违反规则报错

    public function __construct(Group $group, Request $request)
    {
        $this->Group = $group;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAdd($this->Group, "组别", $this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Group, "组别", $id);
    }

    public function update($id)
    {
        $this->baseUpdate($this->Group, "组别", $this->Request, $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Group, "组别");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Group, "组别", $id);
    }
}
