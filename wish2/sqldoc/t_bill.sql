CREATE TABLE IF NOT EXISTS `t_bill`
(
	`bid`	int unsigned not null auto_increment comment '账单id',
	`bname`	varchar(50) not null comment '账单名',
	`gid`	int unsigned not null comment '分组id',
	`cost`	int unsigned not null comment '消费',
	`uid`	int unsigned not null comment '创建uid',
	`create_time` int unsigned not null comment '创建时间',
	`finish_time` int unsigned not null comment '结账时间',
	`status` int unsigned not null default 0 comment '账单状态 0创建 1已消费 2已结算 3已废弃',
	`place` varchar(50) not null comment '地点',
	primary key(`bid`)
) auto_increment=1000 default charset utf8 engine = InnoDb;