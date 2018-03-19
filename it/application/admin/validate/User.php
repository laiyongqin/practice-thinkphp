<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    // 验证规则
    protected $rule = [
        'name' => 'require|max:20|unique:manager',
        'password'    => 'require',
        'administrator' => 'require',
        'authority' => 'require',
    ];

    protected $message  =   [
        'name.require' => '管理员名称必须填写',
        'name.max' => '管理员名称长度不得大于25位',
        'name.unique' => '管理员名称已经存在',
        'password.require' => '管理员密码必须填写',

    ];


}