---
layout: post
category: 技术
tags: ["python"]
title: ["Python web framework"]
keywords: 
description: 
---

###Django
    今天测试了一下Django这个web开发框架,可以比较多的网页效果,但是要上手还是要多读开发文档,中文指南还比较少,明天继续尝试.
###Bottle
    bottle这个开源项目简单,不依赖其它第三方库,安装很简单,只需下载bottle.py放到工程目录即可,调用最多的方法就是@route,操作简单易懂,@route后面接路径,再定义路径便可弄成静态或动态响应,整个项目可以实现小型的web开发,整个框架最新的版本开发到0.13,很出色的轻量级web开发框架



#####备忘小技巧
ubuntu创建桌面启动器:
桌面链接文件夹为:/usr/share/applications/
以网易云音乐桌面启动为例:

    #!/usr/bin/env xdg-open
    [Desktop Entry]
    Type=Application
    Name=NetEaseMusic
    Comment=NetEaseMusic Launcher
    Exec=/usr/bin/env python
    "/home/youngben/Gitproject/Python/NetEaseMusic/main.py"
    Icon=/home/youngben/Gitproject/Python/NetEaseMusic/icons/format.png
    Terminal=false
    StartupNotify=true

