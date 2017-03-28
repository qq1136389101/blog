create table b_blog(

    id mediumint unsigned not null AUTO_INCREMENT comment 'id',
    title VARCHAR(100) NOT NULL comment '标题',
    content LONGTEXT not null comment '内容',
    is_show enum('是','否') NOT NULL DEFAULT '是'comment '是否显示',
    addtime datetime NOT NULL DEFAULT '' COMMENT '添加时间',
    logo VARCHAR(150) NOT NULL DEFAULT '' comment '原图',
    s_logo VARCHAR(150) NOT NULL DEFAULT '' comment '小图',
    m_logo VARCHAR(150) NOT NULL DEFAULT '' comment '中图',
    b_logo VARCHAR(150) NOT NULL DEFAULT '' comment '大图',

    PRIMARY KEY (id)
)engine=InnoDB default charset=utf8 COMMENT '日志';

create table b_user(

    id mediumint unsigned not null AUTO_INCREMENT comment 'id',
    username VARCHAR(30) NOT NULL comment '用户名',
    password CHAR(32) not null comment '密码',
    email VARCHAR(50) NOT NULL DEFAULT '' COMMENT '邮箱',

    PRIMARY KEY (id)
)engine=InnoDB default charset=utf8 COMMENT '用户';