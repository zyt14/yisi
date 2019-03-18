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
        'title' => 'required',
        'content' => 'required',
    ];
    //规则

    protected $messages = [
        'start_time.required' => '开始时间必填',
        'end_time.required' => '结束时间必填',
        'title.required' => '标题必填',
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
        $this->baseAdd($this->Competition,"比赛",$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Competition, "比赛", $id);
    }

    public function update($id)
    {
        $this->baseUpdate($this->Competition,"比赛", $this->Request,$id);
    }

    public function getList()
    {
        $data=$this->baseGetList($this->Competition, "比赛");
        foreach ($data as $value){
            $value['start_time']=$this->obtainDay( $value['start_time']);
            $value['end_time']=$this->obtainDay( $value['end_time']);
        }
        return $data;
    }

    public function getListById($id)
    {
        $data=$this->baseGetListById($this->Competition, "比赛", $id);
        $data['start_time']=$this->obtainDay($data['start_time']);
        $data['end_time']=$this->obtainDay($data['end_time']);
        return $data;
    }

    public function obtainDay($data){
       return substr($data, 0, 10);
    }

    public function updateImg(Request $request,$id){
        $date = $this->Competition->find($id);
        if (!$date) {
            $this->error( '不存在');
        }
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
        }else{
            $data['photo']='/';
        }
        $Img=$date->update([
            'photo'=>$data['photo']
        ]);
        if ($Img) {
            return '更改成功';
        }
        return '更改失败';
    }
}
