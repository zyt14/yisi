<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/12
 * Time: 9:50
 */

namespace App\Http\Controllers;


use App\Proposer;
use Illuminate\Http\Request;

class ProposerController extends MyBaseController
{
    public $Proposer;
    public $Request;

    protected $rules = [
        'name' => 'required|max:24',
        'major' => 'max:15',
        'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        'qq' => 'max:12',
        'introduction' => 'required',
    ];
    //规则
    protected $messages = [
        'name.required' => '名称必填',
        'name.max' => '名字最大不能超过24个字符',
        'major.max' => '班级最大不能超过15个字符',
        'phone.required' => '手机号必填',
        'phone.regex' => '手机号错误',
        'qq.max' => 'qq最大不能超过12个字符',
        'introduction.required'=>'个人介绍必填',
    ];
    //违反规则报错

    public function __construct(Proposer $proposer,Request $request)
    {
        $this->Proposer=$proposer;
        $this->Request=$request;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['grade']=date('Y')-1;
        $this->check($data);
        $this->Proposer->fill($data);
        $r = $this->Proposer->save();
        if ($r) {
            $this->success('申请人添加成功');
        } else {
            $this->error('申请人添加失败');
        }
    }

    public function del($id){
        $this->baseDel($this->Proposer,'申请人',$id);
    }

    public function update(Request $request,$id){
        $date =  $this->Proposer->find($id);
        if (!$date) {
            $this->error('申请人不存在');
        }
        $data = $request->all();
        $this->check($data);
        $date->fill($data);
        $r = $date->save();
        if ($r) {
            $this->success( '申请人更新成功');
        } else {
            $this->error( '申请人更新失败');
        }
    }

    public function getListById($id){
        return $this->baseGetListById($this->Proposer,'申请人',$id);
    }

    public function getList(){
        return $this->baseGetList($this->Proposer,'申请人');
    }

    public function getListByGrade($grade)
    {
        $r = $this->Proposer
            ->where('grade',$grade)
            ->orderBy('id', 'desc')
            ->get();
        if ($r) {
            return $r;
        } else {
            $this->error('查询指定年级失败');
        }
    }

}
