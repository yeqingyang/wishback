CREATE TABLE IF NOT EXISTS `t_user`
(
	`uid`	int(10) unsigned not null auto_increment comment '���uid',
	`usetime` int(10) unsigned not null default 0 comment '�ϴε�¼ʱ��',
	`uname`	varchar(50) not null comment '�û�uname',
	`email`  varchar(50) not null default '' comment 'email',		
	`status` int unsigned not null default 1 comment '�û�״̬��0��deleted��1��online, 2��offline, 3:suspend ',
	`create_time` int unsigned not null default 0 comment '�û�����ʱ��',
	`dtime` int unsigned default 0 comment '�û�ɾ��ʱ��',
	`birthday` int unsigned not null default 0 comment '�û�����',
	`gold_num` int unsigned not null default 0 comment '���RMB',
	`reward_point` int unsigned not null default 0 comment '���',
	`last_login_time` int unsigned not null default 0 comment '�ϴε�¼��ʱ��',
    `online_accum_time` int unsigned not null default 0 comment '�����ۼ�ʱ��',
    `password` varchar(50) not null default '' comment 'password',	
	primary key(`uid`),
	unique index(`uid`,`email`)
) auto_increment=1000 default charset utf8 engine = InnoDb;
