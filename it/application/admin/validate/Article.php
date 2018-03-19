<?php
namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    // 验证规则
    protected $rule = [
        'title' => 'require|max:30|unique:paper',
        'author' => 'require',
    ];

    protected $message  =   [
        'title.require' => '文章标题必须填写',
        'title.max' => '文章标题长度不得大于30位',
        'title.unique' => '文章标题已经存在',
        'author.require' => '作者必须填写',
    ];


}