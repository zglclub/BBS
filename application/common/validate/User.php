<?php

namespace app\common\validate;

use think\Validate;

class User extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'user' => 'require|max:10|chs',
        'name' => 'require|max:10|chs',
        'password'=>'require|alphaNum|between:6,12|confirm',
        'sex'  => 'require|num|number|between:1,3',
        'email'=> 'require|email',
        'phone'=>'require|mobile',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}
