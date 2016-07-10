---
layout: post
title: Docker与Vagrant之间的特点比较
category: 技术
tags: Docker,Vagrant
keywords: 虚拟化
description:
---

![Alt text](https://dn-yeungben.qbox.me/public/img/tech/2014-04-05-01.jpg)

在去年好一段时间,在科技博客里就Docker已经讨论的很火热,关于Docker的技术性颠覆不再赘述,最近深入玩起Docker,很多功能真让人赞叹,在环境部署上减少了很多重复性的劳动,在操作上就像Github一样的熟悉,已经不是和Vmware同一层面了,但还是会不禁让人想起Vagrant也是同样的优秀,不自觉的拿这两个来做一下区分比较,恰好在Linux公社有关于这两个的比较,总结的比较好,摘录如下:


以下内容均出自Vagrant作者(Mitchell Hashimoto)与Docker作者(Solomon Hykes)在stackoverflow上面一个问题讨论。在这个问题中，双方阐述了vagrant和docker的特点和使用范围，对于深入理解vagrant和docker很有意义，因此笔者翻译出来，以供大家讨论学习。

Mitchell作为vagrant的作者，其在DevOps的世界里面沉浸多年，接触了很多类似docker的虚拟化软件。他目前接触了很多使用vagrant和docker的场景，所以看到了两者是如何相互搭配发生作用的。他认为如果单单是开发人员一个人单独使用主机，使用docker可以简化很多事情，这种场景下使用docker和vagrant都没有什么区别。所以他更多的讨论了一些复杂场景，在这些复杂场景中，docker和vagrant就有一些区别了。

    以下是他原文：

    不分场景而直接比对vagrant和docker是不恰当的！在一些简单场景中，它们两款产品作用是重复的，但在更多场景中，它们两款产品无法相互替 代。事实上，vagrant抽象度比docker更高，因此直接用vagrant同docker相比较是不恰当的。而把vagrant同 Boot2Docker(一款运行docker最小的内核) 进行比较似乎更加恰当。


    vagrant为了支持开发，在启动虚拟机环境时启动了很多的应用和服务。vagrant可以在VirtualBox, VMware上面运行(docker无法执行)。vagrant也可以在AWS, OpenStack这些云环境中运行。即便你使用了docker的容器，vagrant同样也没问题。vagrant可以自动install, pull down, build,  run Docker containers。


    比如在vagrant V1.6版本中，vagrant集成了docker-based development environments,因此Vagrant可以在windows，mac和linux上面提供docker服务。


    vagrant没有想替代docker的想法，相反它还包含了docker的一些特性。

　　
    如果我们从逻辑层面来比较vagrant和docker的话，那么：

　　
    1.docker只能执行docker所定义的容器。

　　
    2.docker缺乏灵活的隔离方案(docker只能运行在Linux主机环境中)。


    如果我们从Production和CI层面来比较，那么docker就无法与vagrant相比了：Vagrant没有上面的约束条件，而docker必须依赖它们。


    如果你的项目必须使用Docker的容器，同时只能部署在Linux主机中。这个时候Docker的确是一个不错的选择。除此之外，我就看不到使用docker的优势了，相反你还浪费了vagrant很多的优点：


    vagrant可以支持多种虚拟环境，例如 VirtualBox, VMware, AWS, OpenStack等等。无论你使用何种虚拟环境，vagrant都可以顺利执行起来。如果你使用了Docker，也可以在vagrant中顺利安装docker。


    vagrant可以降低项目复杂度。或者换个说法：你只需要考虑如何执行你的项目就可以，而不论这个项目是用的docker还是什么别的。在未来，如果出现了docker的竞争者，那么vagrant也可以顺利执行它。

    vagrant可以运行在多个主机环境中，windows(XP以上)，MAC(10.5以上)，Linux(2.6内核版本以上)。如果你使用了docker，那么vagrant也可以在上面三种操作系统之上运行你的docker。

    vagrant 可以更好的配置网络和文件共享。比如：vagrant可以给一个VM配置静态IP和端口数据转发。不论你使用的VirtualBox还是 VMware，vagrant都可以很好的完成配置。对于文件共享来说，vagrant提供了多种文件挂载方案供你考虑。如果你使用了docker，那么 这些事情就都需要你亲自动手来做了。

    vagrant 1.6中集成了docker-based development environments。所以在MAC和Windows环境中，vagrant会自动启动一个虚拟机来执行docker，这样就达到了docker的跨平台化。而背后例如网络，文件等等操作都是vagrant默默完成的。

　　下面两点是我听到docker可以替代vagrant的声音：

    "Docker 需要移动的数据很少"的确，Docker有这个特点(应该指的是Docker采用的UFS，导致docker每次变动所需的数据很少--笔者猜测)。但是 当你在每个项目都使用docker，或者在每个项目的现在，将来都使用docker时，你就会发现docker所产生的数据并不少。而如果你使用 vagrant，那么只需要移动一次就可以完成。(原文:"It is less moving parts" - Yes, it can be, if you use Docker exclusively for every project. Even then, it is sacrificing flexibility for Docker lock-in. If you ever decide to not use Docker for any project, past, present, or future, then you'll have more moving parts. If you had used Vagrant, you have that one moving part that supports the rest).

    "Docker启动非常快"，当使用docker启动容器时，它比其他虚拟机启动的都快。但是我要说的是，目前从产品化角度分析所有vagrant主机基本都是启动一次，然后不再停机。如果从快速部署开发环境来说，docker这个特性真的是非常好。

    所以，我们现在可以得知vagrant和docker是有很大区别的，直接比较这两个是不正确的。对于开发环境来说，vagrant是一种更为抽象，更为通用的解决方案。Docker所能提供的场景只是vagrant所支持的特殊场景之一。

    在一些极端案例场景下，docker完全可以替代vagrant。但在更多的场景下，这是错误的。同时vagrant也不会封锁你使用docker。

    针对Mitchell的这些解释，Hykes写出了下述的论点：

    如果你仅仅是想管理虚拟机，那么你应该使用vagrant。如果你想快速开发和部署应用，那么应该使用docker。

    vagrant是一款管理虚拟机的工具，而docker是一款通过将应用打包到轻量级容器，而实现构建和部署的工具。两者适用范围不同。一个容器就是一个包含了应用执行所依赖的数据(包括lib，配置文件等等)。它可以保证应用在一个可重复的环境中随时执行。

    有了这个容器，就可以很简单的构建你的容器也可以随时随地的进行部署。

    Docker只能在Linux上面执行是一个很大的误区！事实上，Docker可以在MAC和Windows上面安装。如果你在MAC上面安装 Docker，那么会有一个大概25MB的精简Linux VM来充当MAC和docker直接的交流者。一旦Docker安装完成后，就可以使用同样的命令进行操作了。这样，世界一下就美好了：你通过轻量级的容 器可以更好的测试和开发你的应用，并且很容易的将这些应用进行分发(比如通过 https://index.docker.io)。而你不需要了解如何管理这些虚拟机，而仅仅把虚拟机当做完成事情中的一个环节而已。

    理论上，vagrant可以作为docker一个抽象数据层。理由如下：

    首先，vagrant不是对docker更好的抽象。vagrant设计使用来管理虚拟机的，而docker设计是用来管理应用的。这就意味着docker 在设计之初就是为了可以通过多种方式来相互组合应用。在docker中processes, log streams, environment variables ,network links between components是最底层的原型。在vagrant中machines, block devices, and ssh keys是最底层的原型。vagrant工作在系统底层，它同另外一个vagrant容器交互的方式只有把它当做一个可以"boot"和"log into"的机器。因此，你可以在docker上面安装插件后，执行"vagrant up"命令后等待美好的事情发生。

    其次，可锁定的环境参数(the lock-in argument)。""If you use Vagrant as an abstraction, you will not be locked into Docker!"站在管理虚拟机的vagrant角度上面看，这句说没有错：Docker不是另外一个独立的容器。像EC2和VMware一样，我们要避 免创造一个和其它工具相捆绑的东西。Docker对宿主机没有任何要求，它允许你通过轻量级的容器在任意地方进行部署。在你部署应用时，不需要考虑应该部 署到什么环境中。比如说：你可以在其他人提供的主机(很可能上面已经部署了EC2或者vagrant)上面部署应用。

    所以最后可以说：`Vagrant 适合用来管理虚拟机，而docker适合用来管理应用环境。`

[附:Stack Overflow讨论贴](http://stackoverflow.com/questions/16647069/should-i-use-vagrant-or-docker-io-for-creating-an-isolated-environment)
