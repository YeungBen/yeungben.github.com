---
layout: post
title: Nginx前端Apache后端服务器配置
category: 技术
tags: Optimization
keywords: Nginx,Apache
description:
---

今天用下载了[lnmp](http://blog.linuxeye.com/31.html)自动化脚本在虚拟机环境下的Ubuntun 14.04自动搭建了lanmp架构的服务器,整个脚本很友好,整个安装过程只需几步的选择就可自动完成,搭好之后下了Discuz的源码安装包,顺手建了个论坛站点,相比之前自己一个个命令去敲着安装Apache,MysqL,Php,这次用了自动化的脚本,少了很多折腾,这次多装了很多服务器优化的组件,真正动手去琢磨性能调优的效果,下面重点说说Nginx和Apache怎么配合使用.

###基础知识

1.1、反向代理过程

Nginx前端，Apache后端过程其实很简单，首先用户访问的是80端口的nginx，然后nginx将静态内容留给自己，其余的转发给非80端口的apache，apache处理完毕后再回传给nginx。

1.2、Nginx location 基础

详细见《Nginx Location 指令基础》，在不同的 Location 位置添加反向代理，Nginx 前端就充当了完全不一样的角色。

###编辑 Nginx 配置文件

    vim /usr/local/nginx/conf/nginx.conf

2.1、添加"proxy_set_header"指令

编辑Nginx配置文件，在"http"字段内添加相应代码，发送发送真实IP到后端

```
  vim /usr/local/nginx/conf/nginx.conf

  # 向后端服务器发起请求时添加指定的header头信息

  proxy_set_header  Host $host;

  # 向后端服务器发送真实 IP

  proxy_set_header  X-Real-IP $remote_addr;

  #让后端如php能直接通过变量获取真实IP

  proxy_set_header  X-Forwarded-For $proxy_add_x_forwarded_for;

```

 2.2、添加"proxy_pass"指令

在相应 ”location" 字段添加如下反向代理语句。这部分是难点，也是国内教程都没有提及的地方。

方法一：

将所有请求都转发给后端 apache 处理，但由于 "~*" 优先级高于 "/" ，所以图片、JS、CSS例外，"expires" 用于设置缓存时间。

```

    location / {

      proxy_pass  http://127.0.0.1:8080;

  }

  location ~* \.(jpg|jpeg|gif|png)$ {

      access_log  off;

      expires  30d;

  }

  location ~* \.(js|css)$ {

      access_log  off;

      expires  1d;

  }

```

方法二：

只将.php后缀的文件，交由后端 apache 处理

  ```
    location ~ \.php$ {
      proxy_pass  http://127.0.0.1:8080;
  }
```

2.3、添加高级选项（选做）

    ```

    #请求连接后端服务器超时时间。即在规定时间，后端必须响应前端握手请求。
    proxy_connect_timeout 30;

    #后端服务器响应时间。即连接成功，在后端排队等候处理不能超过的时间。
    proxy_read_timeout 60;

    #后端数据回传时间。即在规定时间，后端服务器必须将所有数据回传完毕。
    proxy_send_timeout 30;

    #从后端服务器读取的头信息的缓冲区大小。
    proxy_buffer_size 4k;

    #从后端服务器读取的头信息的缓冲区数目和大小
    proxy_buffers 4 32k;

    如果服务器繁忙，可申请的proxy_buffers大小
    proxy_busy_buffers_size 64k;

    #代理缓存临时文件大小
    proxy_temp_file_write_size 64k;

    #代理最大缓存临时文件大小
    proxy_max_temp_file_size 128m;

    ```


###编辑Apache配置文件（选做）


注意：mod_rpaf 模块不是必须安装，除非你需要开启 Apache 日志，但有多此一举之嫌，因为已经有 Nginx 日志了，再开 Apache 日志话就出现重复了。

Apache rpaf 模块作用是获取Nginx转发过来的真实IP，否则在Apache日子中来访IP全部为127.0.0.1。

```
wget http://stderr.net/apache/rpaf/download/mod_rpaf-0.6.tar.gz

tar zxvf mod_rpaf-0.6.tar.gz

cd mod_rpaf-0.6

/usr/local/www/apache/bin/apxs -i -c -n mod_rpaf-2.0.so mod_rpaf-2.0.c

vim /usr/local/apache/conf/httpd.conf LoadModule rpaf_module modules/mod_rpaf-2.0.so

RPAFenable On

RPAFproxy_ips 127.0.0.1

RPAFsethostname On

RPAFheader X-Forwarded-For

```
