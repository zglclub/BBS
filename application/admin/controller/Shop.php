<?php
/**
 * Author:Hackli
 * QQ:76101700@qq.com
 * Time: 2018/11/5 19:06
 * website:https://www.hskphp.cn
 */

namespace app\admin\controller;
use think\Controller;
use app\common\model\Shop as ShopModel;
use think\facade\Request;

class Shop extends Controller
{
    public function index()
    {
        $data = ShopModel::where('status',NULL)->paginate(8);
//        halt($data);
        $this->assign('data',$data);

        return $this->fetch();
    }
    public function insert()
    {
        return $this->fetch();
    }
    public function delete($id)
    {
//        echo"<script> var val=confirm('确定删除');</script>";
        $res = ShopModel::destroy($id);
        $this->success('删除成功'.$res,'shop/index');

    }
    public function artInsert(Request $request)
    {
       $data = $request::post();
//       $file = $request::file('file');
//        // 移动到框架应用根目录/uploads/ 目录下
//        var_dump($file);
//        $info = $file->move( '../uploads');
//        if($info){
//            // 成功上传后 获取上传信息
//            // 输出 jpg
//            echo $info->getExtension();
//            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
//            echo $info->getSaveName();
//            // 输出 42a79759f284b767dfcb2a0197904287.jpg
//            echo $info->getFilename();
//        }else{
//            // 上传失败获取错误信息
//            echo $file->getError();
//        }
        if(!empty($data['title'] && !empty($data['content']))){
            $user = ShopModel::create($data);
        }else{
            $this->error('数据不能为空','shop/insert');
        }

        $this->success('文章发布成功','shop/index');

    }
    public function artupd()
    {
        $id = input('param.id');
        $list = ShopModel::get($id);
        $this->assign('list',$list);
        return $this->fetch();
    }


}