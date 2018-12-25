<?php
/**
 * Created by PhpStorm.
 * User: zyt
 * Date: 2018/12/24
 * Time: 19:09
 */

namespace App\Http\Controllers;


use App\Production;
use Illuminate\Http\Request;

class ProductionController extends MyBaseController
{
    public $Production;
    public $Request;

    protected $rules = [
        'name' => 'required',
        'group_id' => 'required',

    ];
    //规则
    protected $messages = [
        'name.required' => '作品名必填',
        'group_id.required' => '组别id必填',
    ];

    //违反规则报错

    public function __construct(Production $production, Request $request)
    {
        $this->Production = $production;
        $this->Request = $request;
    }

    public function add()
    {
        $this->baseAddImg($this->Production,"作品",'photo',$this->Request);
    }

    public function del($id)
    {
        $this->baseDel($this->Production, "作品", $id);
    }

    public function update($id)
    {
        $this->baseUpdateImg($this->Production,"作品","photo", $this->Request,$id);
    }

    public function getList()
    {
        return $this->baseGetList($this->Production, "作品");
    }

    public function getListById($id)
    {
        return $this->baseGetListById($this->Production, "作品", $id);
    }
}
