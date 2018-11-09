<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\Shop as ShopModel;
class Index extends Controller
{
    public function index()
    {
        $art = ShopModel::select();
        return $this->fetch();
    }

    public function system()
    {
        return $this->fetch();
    }

}
