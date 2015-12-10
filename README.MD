#说明  

##简介
说白了这就是个钓鱼网站,当然完善一下也能当正而八经的认证服务器用(配合wifidog).  

##食用方法  
需要有一个openwrt路由装上wifidog.  
wifidog的配置文件在config目录下  
看着自己认证服务器情况改下,不懂的去下面的链接看.  
需要食用真正可用的认正请用login.php和auth.php  
只是想吃条鱼就用带noauth的~  
认证用的数据库  
```
	create database portal;
	CREATE TABLE `User` (
	`Username` varchar(255) NOT NULL,
	`Password` text NOT NULL,
	`Token` text,
	`LoginTime` datetime DEFAULT NULL,
	`Gw_address` text,
	`Gw_port` text,
	`Gw_id` text,
	`Mac` text,
	`Url` text,
	PRIMARY KEY (`Username`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
  
  
吃鱼用的数据库  
```
	create database wlan;
	CREATE TABLE `new` (
	  `Id` int(11) NOT NULL AUTO_INCREMENT,
	  `phone` varchar(255) DEFAULT NULL,
	  `pass` varchar(255) DEFAULT NULL,
	  PRIMARY KEY (`Id`)
	) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
```	
这一个不用手动建表.只建立数据库就好.  
  
数据库的配置就在login.php和auth.php里,好好看看改改就行吧  


##致谢
参考了
>http://talk.withme.me/?p=267#codesyntax_2  
中对wifidog的讲解和代码  

在此对原作者表示感谢.  
还要谢谢垃圾移不动给了我这样的机会.  

###作者邮箱zheng6686@live.com
###个人主页http://blog.scluv.tk