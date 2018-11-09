<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\Shop;
class Index extends Controller
{
    public function index()
    {
        $data = Shop::where('status',NULL)->paginate('13');
//        halt($data);
        $this->assign('data',$data);
        $this->assign('rand',1);
        $this->assign('status',1);
        return $this->fetch();
    }
    public function search()
    {
        $search = input("param.search");
        if(!empty($search)){
            $map1 = [
                ['title','like','%'.$search.'%']
            ];
            $map2 = [
                ['content','like','%'.$search.'%']
            ];
            $data = Shop::whereor([$map1 ,$map2])->paginate('10',true,['search'=>$search]);
        }else{
            $this->error('搜索不能为空','index/index/index');
        }

        $this->assign('data',$data);
        return $this->fetch();
    }
    //播放页面
    public function play()
    {
        return $this->fetch();
    }

}
