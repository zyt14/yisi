<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/11/24
 * Time: 19:49
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;


class UserController extends MyBaseController
{
    public $User;
    public $Request;


    protected $rules = [
        'name' => 'required|max:24',
        'major' => 'max:15',
        'phone' => 'required|regex:/^1[34578][0-9]{9}$/',
        'qq' => 'max:12',
        'position' => 'required',
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
        'position.required' => '职位必填',
        'introduction.required'=>'个人介绍必填',
    ];
    //违反规则报错

    public function __construct(User $user, Request $request)
    {
        $this->User = $user;
        $this->Request = $request;
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data['grade']=date('Y')-1;
        $data['password']=null;
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
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

    public function update(Request $request,$id)
    {
        $date = $this->User->find($id);
        if (!$date) {
            $this->error( '用户不存在');
        }
        $data = $request->all();
        $data['password']=null;
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->getUpLoadImg('photo');
        }
        $this->check($data);
        $date->fill($data);
        $r = $date->save();
        if ($r) {
            $this->success('用户更新成功');
        } else {
            $this->error( '用户更新失败');
        }
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->User, '用户', $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->User, '用户');
    }

    public function getListByGrade($grade)
    {
        $r = $this->User
            ->where('grade',$grade)
            ->orderBy('id', 'desc')
            ->get();
        if ($r) {
            return $r;
        } else {
            $this->error('查询指定年级失败');
        }
    }







    public $categoryList = [
        ['id' => 1, 'name' => '分类1', 'pid' => 0],
        ['id' => 2, 'name' => '分类2', 'pid' => 1],
        ['id' => 3, 'name' => '分类1.1', 'pid' => 2],
        ['id' => 4, 'name' => '分类1.1.1', 'pid' => 2],
        ['id' => 5, 'name' => '分类1.2', 'pid' => 4]
    ];
    public $pidNum = [];
    public $idNum = [];

    //获取传入的id的所有pid
    public function getCategoryPidNum($id)
    {
        foreach ($this->categoryList as $value) {
            if ($id == $value['id'] && $value['pid'] != 0) {
                array_push($this->pidNum, $value['pid']);
                $this->getCategoryPidNum($value['pid']);
            };
        }
        return $this->pidNum;
    }

    //将数据的所有pid放到parent字段里面，返回一个新的数组
    public function categoryListOne()
    {
        for ($i = 0; $i < count($this->categoryList); $i++) {
            $id = $this->categoryList[$i]['id'];
            $this->categoryList[$i]['parent'] = $this->getCategoryPidNum($id);
            $this->pidNum = [];//因为public全局查询一次后有数据要还原
        }
        return $this->categoryList;
    }

    //获取传入的id的所有childid
    public function getCategoryIdNum($id)
    {
        $categoryListOne = $this->categoryListOne();
        foreach ($categoryListOne as $value) {
            for ($i = 0; $i < count($value['parent']); $i++) {
                if ($id == $value['parent'][$i]) {
                    array_push($this->idNum, $value['id']);
                }
            }
        }
        return $this->idNum;
    }

    //将数据的所有childid放到child字段里面，返回一个新的数组
    public function categoryListTwe()
    {
        $categoryListOne = $this->categoryListOne();
        for ($i = 0; $i < count($categoryListOne); $i++) {
            $id = $categoryListOne[$i]['id'];
            $categoryListOne[$i]['child'] = $this->getCategoryIdNum($id);
            $this->idNum = [];//因为public全局查询一次后有数据要还原
        }
        return $categoryListOne;
    }



}
