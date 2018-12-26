<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/11/24
 * Time: 19:49
 */

namespace App\Http\Controllers;


use App\Position;
use App\User;
use Illuminate\Http\Request;


class UserController extends MyBaseController
{
    public $User;
    public $Request;
    public $Position;


    protected $rules = [
        'name' => 'required|max:24',
        'major' => 'max:15',
        'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        'qq' => 'max:12',
        'position_id' => 'required',
        'introduction' => 'required',
        'state' => 'required',
    ];
    //规则
    protected $messages = [
        'name.required' => '名称必填',
        'name.max' => '名字最大不能超过24个字符',
        'major.max' => '班级最大不能超过15个字符',
        'phone.required' => '手机号必填',
        'phone.regex' => '手机号错误',
        'qq.max' => 'qq最大不能超过12个字符',
        'position_id.required' => '职位必填',
        'introduction.required' => '个人介绍必填',
        'state.required' => '状态必填',
    ];

    //违反规则报错

    public function __construct(User $user,Position $position,Request $request)
    {
        $this->User = $user;
        $this->Position = $position;
        $this->Request = $request;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['grade'] = date('Y') - 1;
        $data['password'] = null;
        $data['state'] = 0;
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
        } else {
            $data['photo'] = "/";
        }
        $this->check($data);
        $this->User->fill($data);
        $r = $this->User->save();
        if ($r) {
            $this->success('用户添加成功');
        } else {
            $this->error('用户添加失败');
        }
    }

    public function del($id)
    {
        $this->baseDel($this->User, '用户', $id);
    }

    public function update(Request $request, $id)
    {
        $date = $this->User->find($id);
        if (!$date) {
            $this->error('用户不存在');
        }
        $data = $request->all();
        if ($data['state']!=0&&$data['state']!=1){
            $data['state']=$date['state'];
        }
        $data['password'] = null;
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
        }
        $this->check($data);
        $date->fill($data);
        $r = $date->save();
        if ($r) {
            $this->success('用户更新成功');
        } else {
            $this->error('用户更新失败');
        }
    }

    public function getListById($id)
    {
        $r = $this->User->find($id);
        $positionId=$r['position_id'];
        $position=$this->Position->find($positionId);
        if ($position!=null){
            $r['position_id']=$position;
        }else{
            $r['position_id']=[];
        }
        if ($r) {
            return $r;
        } else {
            return $this->error('查询指定id的用户失败');
        }
    }

    public function getList()
    {
        $user=$this->User->orderBy('id','desc')->get();
        for ($i=0;$i<sizeof($user);$i++){
            $id=$user[$i]['id'];
            $arr=$this->getListById($id);
            $arrs[]=$arr;
        }
        return $arrs;
    }

    public function getListByGrade($grade)
    {
        $r = $this->User
            ->where('grade', $grade)
            ->orderBy('id', 'desc')
            ->get();
        if ($r) {
            return $r;
        } else {
            $this->error('查询指定年级失败');
        }
    }

    public function getListByCurrent()
    {
        $r = $this->User
            ->where('state', '1')
            ->get();
        if ($r) {
            return $r;
        } else {
            $this->error('查询现任用户失败');
        }
    }

}
