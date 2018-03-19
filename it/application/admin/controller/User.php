<?php
//账号管理
namespace app\admin\controller;
use app\admin\controller\Base;

class User extends Base
{
	//账号管理首页，查看账号列表
    public function index(){
        return '账号管理';
    }

    //增加管理员账号
    public function add(){
    	if(request()->isPost()){
    		$video = input('video');
    		$paper = input('paper');
    		$message = input('message');
    		$data = [
    			'name' => input('name'),
    			'password' => input('password'),
    			'administrator' => '0',
    			'authority' => $video . $paper . $message,
    		];
    		$validate = \think\Loader::validate('User');
    		if(!$validate->check($data)){
			   $this->error($validate->getError()); die;
			}
			$data[password] = md5($data[password]);
    		if(db('manager')->insert($data)){
    			return $this->success('添加管理员成功！','index');
    		}else{
    			return $this->error('添加管理员失败！');
    		}
    		return;
    	}
    	return $this->fetch();
 
    }

    //修改管理员账号
    public function change(){
    	//这里要加入获取Id的方法
    	//$id=input('id');
    	//$id = 2;
    	if(!isset($id)){
    		$this->error('没有选中的管理员','index');
    	}
    	$managers=db('manager')->find($id);
    	if(request()->isPost()){
    		$video = input('video');
    		$paper = input('paper');
    		$message = input('message');
    		$data = [
    			'name' => input('name'),
    			'password' => input('password'),
    			'administrator' => '0',
    			'authority' => $video . $paper . $message,
    		];
    		if(input('password')){
				$data['password']=md5(input('password'));
			}else{
				$data['password']=$managers['password'];
			}
			$validate = \think\Loader::validate('User');
    		if(!$validate->check($data)){
			   $this->error($validate->getError()); die;
			}
            $save=db('manager')
            		->where('manager_id',$id)
            		->update($data);
    		if($save !== false){
    			$this->success('修改管理员成功！','index');
    		}else{
    			$this->error('修改管理员失败！');
    		}
    		return;
    	}
    	$this->assign('managers',$managers);
    	return $this->fetch();
    }

    //删除管理员账号
    public function delete(){
    	//这里要加入获取Id的方法
    	//$id=input('id');
    	$id = 2;
    	if(!isset($id)){
    		$this->error('没有选中的管理员','index');
    	}else if($id == 1){
    		$this->error('不能删除超级管理员','index');
    	}
    	$save=db('manager')
            	->where('manager_id',$id)
            	->delete();
        if($save !== false){
    		$this->success('删除管理员成功！','index');
    	}else{
    		$this->error('删除管理员失败！');
    	}
    }


}
