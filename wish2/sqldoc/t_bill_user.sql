CREATE TABLE IF NOT EXISTS `t_bill_user`
(
	`bid`	int(10) unsigned not null comment '账单id',
	`uid`	int(10) unsigned not null comment 'uid',
	`prepay`	int(10) unsigned not null comment '预支付',
	`afterpay` int(10) unsigned not null comment '后支付',
	`payment` int(10) unsigned not null comment '最终支付或收益',
	primary key(`bid`,`uid`)
)default charset utf8 engine = InnoDb;