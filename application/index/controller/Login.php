<?php
/**
 * Author:Hackli
 * QQ:76101700@qq.com
 * Time: 2018/11/7 14:25
 * website:https://www.hskphp.cn
 */

namespace app\index\controller;
use think\Controller;
use think\facade\Request;
use think\Validate;
use app\common\model\User as UserModel;
use think\facade\Session;
class Login extends Controller
{
    public function login()
    {
        return $this->fetch();
    }
    public function register()
    {
        return $this->fetch();
    }
    public function login_check()
    {
       $username = trim(input('param.username'));

       $password = trim(input('param.password'));
//       halt(UserModel::field('["name","password"]')->all());
       if(!empty($username) && !empty($password)){
            $res =  UserModel::where('name',$username)->where('password',$password)->find();
            if($res!=NULL){
                Session::set('username',$res->name);
                $this->success('登录成功','/index/index/index');
            }
       }else{
           echo '用户名不存在';
       }


    }
    public function reg_check(Request $request)
    {
        //验证数据
        $data = $request::post();
        //验证规则
        $rule = [
            'user' => 'require|max:10',
            'name' => 'require|max:10',
            'password' => 'require|alphaNum|min:6|max:12|confirm',
            'sex' => 'require',
            'email' => 'require|email',
            'phone' => 'require|mobile',
        ];

        $validate =Validate::make($rule);
        $result = $validate->check($data);
        if (!$result) {
            $valres = $validate->getError();
            $this->assign('valres',$valres);
        }else{
            $datav['name'] = trim($data['user'].$data['name']);
            $datav['password'] = trim($data['password']);
            $datav['email'] = trim($data['email']);
            $datav['phone'] = trim($data['phone']);
//            halt($datav);
            UserModel::create($datav);
        }
        $this->success('注册成功','login');
    }
    //登录退出
    public function logout()
    {
        $session = Session::get('name');
        Session::destroy($session);
        $this->success('退出成功','/index/index/index');
    }
}