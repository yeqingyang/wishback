create table t_friend(
	uid int unsigned not null comment '用户uid',
	fuid int unsigned not null comment '好友id',
	friend_type int unsigned not null comment '好友类型',
	status tinyint unsigned not null comment '好友状态，1表示删除，2表示正常',
	primary key(uid, fuid),
)engine = InnoDb default charset utf8;