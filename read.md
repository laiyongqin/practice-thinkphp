### 运行环境

- 后台环境：thinkPHP 5.015框架 + PHP 7.1
- 数据库环境：MySQL 5.7
- 前端环境：jQuery + bootstrap
- web应用服务器环境：apache 2.2
- 调试服务器环境：window 10

### 功能描述

- 管理端：
	- 上传、删除视频（目前只实现免费播放）
	- 增删查改 文章（文章支持富文本、使用了UEedit库）
	- 删除留言
	- 增删查改 管理员账户
	
- 客户端：
	- 观看视频
	- 观看文章
	- 观看、回复留言
	- 注册、修改 账号


### 安装
1. 安装PHP7.1、apache以及mysql 5.7，配置相关的文件
2. 将it文件夹放到应用服务器根目录下
3. 打开mysql使用source命令运行data.sql
4. 至此安装完成

### 数据库配置
- /it/application/database.php:修改该文件的账号以及密码即可，需要注意的是数据库管理员至少需要有创建表的权限

### 访问路径
- 客户端访问路径：/it/public/index
- 服务端访问路径：/it/public/admin

### 注意的事项
- apache需要打开mod_rewrite.so模块
- 视频播放目前只支持标准的mp4格式