create table t_friend(
	uid int unsigned not null comment '�û�uid',
	fuid int unsigned not null comment '����id',
	friend_type int unsigned not null comment '��������',
	status tinyint unsigned not null comment '����״̬��1��ʾɾ����2��ʾ����',
	primary key(uid, fuid),
)engine = InnoDb default charset utf8;