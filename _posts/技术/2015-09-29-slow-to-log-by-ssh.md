---
layout: post
title: SSH登陆缓慢解决办法
category: 技术
tags: ssh
keywords:
description:
---

最近登陆用ssh登陆VPS老是等好长一段时间才跳出来,很大一部分原因是最近校园网老是抽筋,掉包严重,后来在Segmentfault社区刚好有人讨论到这个问题,顺手尝试解决,发现服务端的配置优化可减少登陆等待的时间,ssh登陆时可以加上 ```-vvv``` 参数进入debug模式,查看登陆认证的细节.具体解决办法记录如下:

1、在server上/etc/hosts文件中把你本机的ip和hostname加入

2、在server上/etc/ssh/sshd_config文件中修改或加入UseDNS=no，另外在authentication gssapi-with-mic也有可能出现问题，在server上/etc/ssh/sshd_config文件中修改GSSAPIAuthentication no

3、在server上/etc/nsswitch.conf中修改hosts: files dns为hosts: files

4、reboot server使配置生效 ``` /etc/init.d/sshd restart ``` 重启sshd进程使配置生效。
