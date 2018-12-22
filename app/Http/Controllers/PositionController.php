<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:43
 */

namespace App\Http\Controllers;


use App\Position;
use Illuminate\Http\Request;

class PositionController extends MyBaseController
{
    public $Position;
    public $Request;

    protected $rules = [
        'name' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '组名必填',
    ];

    //违反规则报错

    public function __construct(Position $position, Request $request)
    {
        $this->Position = $position;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAdd($this->Position, "职位", $this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Position, "职位", $id);
    }

    public function update($id)
    {
        $this->baseUpdate($this->Position, "职位", $this->Request, $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Position, "职位");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Position, "职位", $id);
    }
}
