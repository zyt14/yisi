<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:11
 */

namespace App\Http\Controllers;


use App\Adviser;
use Illuminate\Http\Request;

class AdviserController extends MyBaseController
{
    public $Adviser;
    public $Request;

    protected $rules = [
        'name' => 'required',
        'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        'introduce' => 'required',
    ];
    //规则

    protected $messages = [
        'name.required' => '名称必填',
        'phone.required' => '手机必填',
        'phone.regex' => '手机号错误',
        'introduce.required' => '介绍必填',
    ];
    //违反规则报错

    public function __construct(Adviser $adviser, Request $request)
    {
        $this->Adviser = $adviser;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAdd($this->Adviser,"指导老师",$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Adviser, "指导老师", $id);
    }

    public function update($id)
    {
        $this->baseUpdate($this->Adviser,"指导老师", $this->Request,$id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Adviser, "指导老师");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Adviser, "指导老师", $id);
    }

    public function updateImg(Request $request,$id){
        $date = $this->Adviser->find($id);
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
