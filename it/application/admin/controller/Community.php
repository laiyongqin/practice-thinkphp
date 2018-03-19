<?php
//留言板管理
namespace app\admin\controller;
use app\admin\controller\Base;

class Community extends Base
{
	//留言首页，查看留言列表
    public function index(){
        return '留言板管理';
    }


    //删除留言
    public function delete(){
    	//留言的表要重新设计，先放一边
    	//这里要加入获取Id的方法
    	//$id=input('id');
    	// $id = 2;
    	// if(!isset($id)){
    	// 	$this->error('没有选中的留言','index');
    	// }
    	// $save=db('manager')
     //        	->where('manager_id',$id)
     //        	->delete();
     //    if($save !== false){
    	// 	$this->success('删除管理员成功！','index');
    	// }else{
    	// 	$this->error('删除管理员失败！');
    	// }

    }

}
