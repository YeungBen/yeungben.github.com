---
layout: post
title: 同时使用 GitHub 和 GitCafe 托管博客
category: 技术
tags: sync
keywords: Github,Gitcafe
description:
---

最近Github受到长城墙持续的DDoS攻击,主页访问很不稳定,考虑转移到国内的Gitcafe上,恰好在 `V2EX` 上看到一个帖子，里面提到将博客同时托管在 GitHub 和 GitCafe 上，国外访客解析到 GitHub，国内访客解析到 GitCafe。禁不住 GitCafe 速度的诱惑，于是也动手在 GitCafe 上创建了一个博客镜像，并通过修改 git 设置实现了同步提交。


###将仓库拷贝到 GitCafe

在 GitCafe 上创建一个和用户名相同的仓库，如我的是 yeungben。

在账户设置中添加公钥，可以使用之前 GitHub 的公钥，只需要复制 ~/.ssh/id_rsa.pub 的内容。

打开 .git/config，修改远程仓库，将 origin 改为 github，并添加 gitcafe：

    [remote "github"]
        fetch = +refs/heads/*:refs/remotes/github/*
        url = git@github.com:yeungben/yeungben.github.com.git
    [remote "gitcafe"]
        url = git@gitcafe.com:YeungBen/YeungBen.git
        fetch = +refs/heads/*:refs/remotes/origin/*

之后将仓库 push 到 GitCafe 上（必须使用 gitcafe-pages 分支）：

    git push -u gitcafe master:gitcafe-pages

GitCafe 上在“项目管理”中找到“自定义域名”，添加要绑定的域名，比如我是 blog.youngben.net。

###实现同步提交

因为 GitHub 和 GitCafe 的 Pages 使用不同的分支，所以无法使用下面这种方式：

    [remote "all"]
      url = git@github.com:liberize/liberize.github.com.git
      url = git@gitcafe.com:liberize/liberize.git

然后执行 `git push all master` 同时 push。

可以在 .git/config 中添加一个 alias 来实现：

    [alias]
      publish = !sh -c \"git push github master && git push gitcafe master:gitcafe-pages\"

当需要 push 的时候，只需执行 git publish 就可以了。

