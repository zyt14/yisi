<?php
/**
 * Created by PhpStorm.
 * Member: zyt
 * Date: 2018/12/12
 * Time: 9:58
 */

namespace App\Http\Controllers;


use App\Member;
use Illuminate\Http\Request;

class MemberController extends MyBaseController
{
    public $Member;
    public $Request;

    protected $rules = [
        'name' => 'required|max:24',
        'major' => 'max:15',
        'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        'qq' => 'max:12',
        'group' => 'required|max:10',
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
        'group.required' => '组别必填',
        'group.max' => '组别最大不能超过10个字符',
        'state.required' => '状态必填',
    ];

    //违反规则报错

    public function __construct(Member $member, Request $request)
    {
        $this->Member = $member;
        $this->Request = $request;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['grade']=date('Y')-1;
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
        }
        $this->check($data);
        $this->Member->fill($data);
        $r = $this->Member->save();
        if ($r) {
            $this->success('成员添加成功');
        } else {
            $this->error('成员添加失败');
        }
    }

    public function del($id)
    {
        $this->baseDel($this->Member, '成员', $id);
    }

    public function update(Request $request,$id)
    {
        $date = $this->Member->find($id);
        if (!$date) {
            $this->error( '成员不存在');
        }
        $data = $request->all();
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
        }
        $this->check($data);
        $date->fill($data);
        $r = $date->save();
        if ($r) {
            $this->success('成员更新成功');
        } else {
            $this->error( '成员更新失败');
        }
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Member, '成员', $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Member, '成员');
    }

    public function getListByGrade($grade)
    {
        $r = $this->Member
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