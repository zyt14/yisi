<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/22
 * Time: 15:43
 */

namespace App\Http\Controllers;


use App\Studio;
use Illuminate\Http\Request;

class StudioController extends MyBaseController
{
    public $Studio;
    public $Request;

    protected $rules = [
        'content' => 'required',
        'name' => 'required',

    ];
    //规则
    protected $messages = [
        'content.required' => '内容必填',
        'name.required' => '名字必填',
    ];

    //违反规则报错

    public function __construct(Studio $studio, Request $request)
    {
        $this->Studio = $studio;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAdd($this->Studio, "工作室", $this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Studio, "工作室", $id);
    }

    public function update($id)
    {
        $this->baseUpdate($this->Studio, "工作室", $this->Request, $id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Studio, "工作室");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Studio, "工作室", $id);
    }
}
