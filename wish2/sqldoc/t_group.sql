CREATE TABLE IF NOT EXISTS `t_group`
(
	`gid`	int(10) unsigned not null auto_increment comment '分组id',
	`gname`	varchar(50) not null comment '分组名字',
	`uid`	int(10) unsigned not null comment '创建者uid',
	`create_time` int(10) unsigned not null comment '创建时间',
	`status` int(10) unsigned not null default 0 comment '状态：0正常 1删除',
	`va_user` blob not null comment 'members',
	primary key(`gid`)
) auto_increment=1000 default charset utf8 engine = InnoDb;
