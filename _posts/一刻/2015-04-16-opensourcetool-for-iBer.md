---
layout: post
title: 运维人员必须熟悉的运维工具汇总
category: 一刻
tags: tool
keywords:
description:
---
```python
操作系统：Centos※,Ubuntu,Redhat※,suse，Freebsd

网站服务：nginx※,apache※,lighttpd,php※,tomcat※,resin※

数据库：MySQL※,Mysql-proxy,MariaDB，PostgreSQL

代理相关：lvs,keepalived,haproxy,nginx,apache,heartbeat（此行都是※）

网站缓存：squid※,nginx※,varnish

NOSQL库：memcached※,memcachedb,TokyoTyrant※,MongoDB※,Cassandra※,redis※,CouchDB

存储相关：Nfs※,Moosefs(mfs)※,Hadoop※,glusterfs※,lustre,FastDFS

版本管理：svn※,git※

监控报警：nagios※,cacti※,zabbix※,munin,hyperic,mrtg,graphite

域名解析：bind※,powerdns,dnsmasq※

同步软件：rsync※,inotify※,sersync※,drbd※,csync2,union,lsyncd,scp※

批量管理：ssh+rsync+sersync※,Saltstack※,expect※,puppet※,ansible,cfengine

虚拟化：kvm※,xen※

云计算：openstack※,docker,cloudstack

内网软件：iptables※,zebra※,iftraf,ntop※,tc※,iftop

邮件软件：qmail,posfix※,sendmail

远程拨号：openvpn※,pptp,openswan※,ipip※

统一认证：openldap(可结合微软活动目录)※

队列工具：ActiveMQ,RabbitMQ※,Metaq,MemcacheQ,Zeromq

打包发布：mvn※,ants※,jenkins※,svn

测试软件：ab,smokeping,siege,JMeter,Webbench,LoadRunner,http_load（都是※）

日志相关：syslog,rsyslog,Awstats,flume logstash scribe kafka,storm

DB代理：mysql-proxy,amoeba（更多还是程序实现读写分离）

搜索软件：Sphinx,Xapian（大公司会自己开发类似百度的小规模内部搜索引擎）
```

学习要有舍有得，什么都抓必然短时间都不会精，抓精髓，大众软件（带※）先熟练了，这是基础加提高，在研究小众软件（不带※），这是高手之路，最后在研究偏门的，世外高手之路，当然前提是先掌握前面的大众和小众。
