---
layout: post
title: Python写爬虫抓站的一些技巧
category: 技术
tags: Python
keywords:
description:
---

###最基本的抓站
```python
import urllib2

content = urllib2.urlopen('http://XXXX').read()
```

###使用代理服务器

```python
import urllib2

proxy_support = urllib2.ProxyHandler({'http':'http://XX.XX.XX.XX:XXXX'})

opener = urllib2.build_opener(proxy_support, urllib2.HTTPHandler)

urllib2.install_opener(opener)

content = urllib2.urlopen('http://XXXX').read()
```

###需要登陆的情况

####cookie的处理
```python
import urllib2, cookielib
cookie_support= urllib2.HTTPCookieProcessor(cookielib.CookieJar())
opener = urllib2.build_opener(cookie_support, urllib2.HTTPHandler)
urllib2.install_opener(opener)
content = urllib2.urlopen('http://XXXX').read()
#是的没错，如果想同时用代理和cookie，那就加入proxy_support然后operner改为
opener = urllib2.build_opener(proxy_support, cookie_support, urllib2.HTTPHandler)
```

####表单的处理
```python
import urllib
postdata=urllib.urlencode({
         'username':'XXXXX',
         'password':'XXXXX',
         'continueURI':'http://www.verycd.com/',
         'fk':fk,
         'login_submit':'登录'
         })
```

构建了postdata之后，就要发起http请求;

req = urllib2.Request(url = 'http://secure.verycd.com/signin/*/http://www.verycd.com/',data = postdata )

result = urllib2.urlopen(req).read()

####伪装成浏览器访问

```python
headers = {

'User-Agent':'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6'

}

req = urllib2.Request(url = 'http://secure.verycd.com/signin/*/http://www.verycd.com/',

data = postdata,

headers = headers )

```

####反“反盗链”
```python
headers = { 'Referer':'http://www.cnbeta.com/articles' }
```

####终极绝招

使用selenium工具控制浏览器进行访问，只要浏览器能做到的，它都能做到。类似的工具有：pamie/watir

###多线程抓取

```python
from threading import Thread
from Queue import Queue
from time import sleep
#q是任务队列 #NUM是并发线程总数
#JOBS是有多少任务
q = Queue()
NUM = 2
JOBS = 10
#具体的处理函数，负责处理单个任务
def do_somthing_using(arguments):
    print arguments
#这个是工作进程，负责不断从队列取数据并处理
def working():
    while True:
          arguments = q.get()
          do_somthing_using(arguments)
          sleep(1)
          q.task_done()
  #fork NUM个线程等待队列
  for i in range(NUM):
      t = Thread(target=working)
      t.setDaemon(True)
      t.start()
      #把JOBS排入队列
      for i in range(JOBS):
          q.put(i)
          #等待所有JOBS完成
          q.join()
```
