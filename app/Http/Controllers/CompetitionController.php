<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:11
 */

namespace App\Http\Controllers;


use App\Competition;
use Illuminate\Http\Request;

class CompetitionController extends MyBaseController
{
    public $Competition;
    public $Request;

    protected $rules = [
        'start_time' => 'required',
        'end_time' => 'required',
        'content' => 'required',
    ];
    //规则

    protected $messages = [
        'start_time.required' => '开始时间必填',
        'end_time.required' => '结束时间必填',
        'content.required' => '内容必填',
    ];
    //违反规则报错

    public function __construct(Competition $competition, Request $request)
    {
        $this->Competition = $competition;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAddImg($this->Competition,"比赛",'photo',$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Competition, "比赛", $id);
    }

    public function update($id)
    {
        $this->baseUpdateImg($this->Competition,"比赛","photo", $this->Request,$id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Competition, "比赛");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Competition, "比赛", $id);
    }
}
