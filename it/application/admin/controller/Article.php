<?php
//文章管理
namespace app\admin\controller;
use app\admin\controller\Base;

class Article extends Base
{
	//文章首页，显示文章列表
    public function index(){
        return '文章管理';
    }

    //增添文章
    public function add(){
    	//作者要根据登录的管理员重新获取
    	$author = 'test_cty';
    	if(request()->isPost()){
    		$data = [
    			'title' => input('title'),
    			'keywords' => input('keywords'),
    			'author' => $author,
    			'content' => input('content'),
    			'time' => time(),
    		];
    		$validate = \think\Loader::validate('Article');
    		if(!$validate->check($data)){
			   $this->error($validate->getError()); die;
			}
    		if(db('paper')->insert($data)){
    			return $this->success('添加文章成功！','index');
    		}else{
    			return $this->error('添加文章失败！');
    		}
    		return;
    	}
    	return $this->fetch();
    }


    //修改文章
    public function edit(){
    	//修改文章需要跟编辑器混合，先放一边
    }

    //删除文章
    public function delete(){
    	//文章id号要根据返回信息获取
    	$id = 2;
    	if(!isset($id)){
    		return $this->error('没有选中的文章','index');
    	}
    	$save = db('paper')
    				->where('id',$id)
    				->delete();
    	if( false !== $save){
    		return $this->success('删除文章成功','index');
    	}else{
    		return $this->error('删除文章失败','index');
    	}
    }

}
