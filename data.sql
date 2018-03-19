/*创建数据库*/
create database it_data;

use it_data;

/*创建管理员表*/
create table `it_manager`(
  `manager_id` int auto_increment primary key,
  `name` char(20) unique not null,
  `password` char(40) not null,
  `administrator` enum('0','1') default '0',
  `videoControl` enum('0','1') default '0',
  `paperControl` enum('0','1') default '0',
  `commentControl` enum('0','1') default '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*插入超级管理员*/
insert into `it_manager`(`manager_id`,`name`,`password`,`administrator`,
                         `videoControl`,`paperControl`,`commentControl`
                        )
   values (0,'admin','e10adc3949ba59abbe56e057f20f883e','1','1','1','1');

/*创建普通用户表*/
create table `it_user`(
  `user_id` int auto_increment primary key,
  `name` char(20) unique not null,
  `password` char(40) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*插入一个普通用户*/
insert into `it_user`(`user_id`,`name`,`password`) values (0,'user','e10adc3949ba59abbe56e057f20f883e');


/*创建视频存储表*/
create table `it_video`(
  `video_id` int auto_increment primary key,
  `name` char(100) unique not null,
  `path` varchar(200) unique not null,
  `cost` float(7,2) not null,
  `describe` varchar(200) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*创建视频-学员表，该表表示某学员是否拥有观看某视频的权限*/
create table `it_user_video`(
  `user_id` int not null,
  `video_id` int not null,
  foreign key(`user_id`) references `it_user`(`user_id`),
  foreign key(`video_id`) references `it_video`(`video_id`),
  primary key(`user_id`,`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*创建文章表,time字段表示创建时间，存放文章创建的时间戳*/
create table `it_paper`(
  `paper_id` int auto_increment primary key,
  `title` varchar(60) not null,
  `keywords` varchar(100),
  `author` varchar(30) not null,
  `content` text,
  `time` int not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*创建评论表，存储评论内容，re_id表示回复的留言的id，为空时则表示是第一条留言、time表示评论时间*/
create table `it_comment`(
  `comment_id` int auto_increment primary key,
  `re_id` int ,
  `user_id` int not null,
  `content` text,
  `time` int not null,
  foreign key(`user_id`) references `it_user`(`user_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

