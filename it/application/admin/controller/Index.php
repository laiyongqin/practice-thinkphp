<?php
//后台首页
namespace app\admin\controller;
use app\admin\controller\Base;

class Index extends Base
{
	//后台首页
    public function index(){
        return '后台首页，应该先登录';
    }
}
