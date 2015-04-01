---
layout: post
title: Matlab for Linux
category: 科研
tags: 
keywords: Matlab,Install
description: 
---

![Alt text](/public/img/matlab.png)

###Download

开始把Matlab的环境转移到Linux(Ubuntu)下,找安装包找了好久,最终找到了2012b和2013a,开始安装了2012版本,但由于2012b支持联调的编译器gcc版本到4.3,只好再装2013a,我把镜像放到了我的云盘上,链接如下:

- [Matlab for *nix R2012b & R2013a](http://yunpan.cn/cZ47CiZx2THin)（提取码：d0bc）

###Install
    1.安装需要root权限,切换用户:sudo -i
    2.用cd命令切换到iso文件所在目录,用mkdir建立一个临时的安装文件夹,并且用mount将iso挂载在这个文件夹上.
    ```shell
    cd Downloads/Matlab/
    mkdir matlabTmp
    mount -o loop Matlab801_MacUnix.iso matlabTmp
    ```
    3.matlab 提供了一套很好的安装脚本,进入挂载目录后,我们可以看到有个install_auto_linux脚本文件,这就是matlab的自动安装脚本.我们可以用它来"一键"安装matlab.不过首先,我们要为它增加可执行权限.
    ```shell
    chmod +x install_auto_linux
    ./install_auto_linux
    ```
    
    4.安装脚本会首先提示输入安装路径,这里推荐大家和其它软件一样,安装在/usr/share目录下(默认为/opt).之后,若没有什么问题,脚本便会自动安装直到完成.完成之后,会在根目录创建启动器.我们可以把它移到桌面,不过大部分Linux是将启动器组织到了软件菜单中,我们可以使用下面的命令把启动器和其它程序放在一起,方便从菜单启动.
    ```shell
    mv /matlab.desktop /usr/share/applications/
    ```
###Run Matlab
    ```shell
    sudo /usr/local/MATLAB/R2013a/bin/matlab 
    ```