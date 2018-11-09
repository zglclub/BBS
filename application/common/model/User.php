<?php
/**
 * Author:Hackli
 * QQ:76101700@qq.com
 * Time: 2018/11/7 16:28
 * website:https://www.hskphp.cn
 */

namespace app\common\model;
use think\Model;
use think\model\concern\SoftDelete;
class User extends model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}