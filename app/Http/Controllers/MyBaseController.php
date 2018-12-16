<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/11/24
 * Time: 19:41
 */

namespace App\Http\Controllers;


use Request;
use Validator;


class MyBaseController extends Controller
{

    //成功失败反馈
    protected function msg($errcode = 0, $msg = '', $data = [])
    {
        header('Content-Type:application/json; charset=utf-8');
        $r = [
            'errcode' => $errcode,
            'msg' => $msg,
            'data' => $data
        ];
        exit(json_encode($r));
    }

    protected function success($msg = '', $data = [])
    {
        if (is_string($msg)) {
            $this->msg(0, $msg, $data);
        } else {
            $this->msg(0, '', $msg);
        }
    }

    protected function error($msg = '', $errcode = -1)
    {
        $this->msg($errcode, $msg);
    }

    //根据规则检查
    protected $rules = [];
    //规则
    protected $messages = [];

    //信息
    protected function check($data)
    {
        $validator = Validator::make($data, $this->rules, $this->messages);
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
        }
    }

    //上传图片处理
    protected function uploadimg($filename, $filrpath, $all_layout = ['jpg', 'jpeg', 'png'])
    {
        //看文件存不存在
        if (!Request::hasFile($filename))
            return 101;
        //获取文件
        $File = Request::file($filename);

        //看是不是合法
        if (!$File->isValid())
            return 102;
        //获取后缀名
        //strtolower 把所有字符转换为小写
        $suffix = strtolower($File->getClientOriginalExtension());

        //判断后缀名是不是在array里面
        if (!in_array($suffix, $all_layout))
            return 103;
        //给文件取new name
        //uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID。
        $newName = uniqid() . '.' . $suffix;

        //移动文件并重命名，将临时文件移动
        if (!$File->move($filrpath, $newName))
            return 104;
        return $newName;
    }

    protected function getUpLoadImg($fieldname)
    {
        $basepath = '/image';//这里的斜杠是针对路由的,路由下的储存的文件夹
        $basedir = public_path($basepath);
        $file = $this->uploadimg($fieldname, $basedir);
        return $basepath . '/' . $file;
    }

    protected function baseAddImg($Table, $TableName, $TableField, $request)
    {
        $data = $request->all();
        if ($request->hasFile($TableField)) {
            $data[$TableField] = $this->getUploadImg($TableField);
        }
        $this->check($data);
        $Table->fill($data);
        $r = $Table->save();
        if ($r) {
            $this->success($TableName . '添加成功');
        } else {
            $this->error($TableName . '添加失败');
        }
    }


    protected function baseAdd($Table, $TableName, $request)
    {
        $data = $request->all();
        $this->check($data);
        $Table->fill($data);
        $r = $Table->save();
        if ($r) {
            $this->success($TableName . '添加成功');
        } else {
            $this->error($TableName . '添加失败');
        }
    }

    protected function baseDel($Table, $TableName, $id)
    {
        $r = $Table->find($id)->delete();
        if ($r) {
            $this->success($TableName . '删除成功');
        } else {
            $this->error($TableName . '删除失败');
        }
    }

    protected function baseUpdate($Table, $TableName, $request, $id)
    {

        $Table_id = $Table->find($id);
        if (!$Table_id) {
            $this->error($TableName . '不存在');
        }
        $data = $request->all();
        $this->check($data);
        $Table_id->fill($data);
        $r = $Table_id->save();
        if ($r) {
            $this->success($TableName . '更新成功');
        } else {
            $this->error($TableName . '更新失败');
        }
    }

    protected function baseGetListById($Table, $TableName, $id)
    {
        $r = $Table->find($id);
        if ($r) {
            return $r;
        } else {
            $this->error('查询指定id的' . $TableName . '失败');
        }
    }

    protected function baseGetList($Table, $TableName)
    {
        $r = $Table->orderBy('id', 'desc')->get();
        if ($r) {
            return $r;
        } else {
            $this->error('查询' . $TableName . '失败');
        }

    }
}
