---
layout: post
category: 技术
title:  "Ubuntu系统备份恢复策略"
tags: [Backup,Linux]
keywords: 
description: 
---

tar包全盘备份恢复策略
=======================================


全盘备份方案：无论计算机系统当前的状态，我可以对整个系统的每一个字节都做数据备份，当需要恢复系统的时候甚至都不必再次安装Ubuntu本身就可以把当初备份的那个状态复原到新的机器或者格式化以后的当前机器上，甚至是虚拟机上。这也是一般公司的IT部门在帮员工重装机器的时候最常用的策略，没有其它原因，就是因为这种方式最快捷。备份恢复一个系统的时间不会超过一个小时。

####优点

最迅速快捷的备份恢复方式，可以通过刻录母盘的方式在各处恢复自己的备份。你既可以在一台物理机上做备份恢复到另一台物理机或者虚拟机，你甚至也可以将一台虚拟机里的备份恢复到一台物理机或者另一台虚拟机上，非常的灵活方便。

####缺点

采用这种方式的一个问题在于，如果需要还原的目标机器和做备份的源机器硬件配置差异过大，可能会发生恢复以后某些驱动程序工作不正常的状况，例如计算机没有声音，或者图形分辨率特别低，无法联网等状况。这个时候需要用户自行尝试解决。第二个问题在于由于全盘备份，意味着如果你备份的是10.04的系统，那你也只能恢复到10.04的系统，这种恢复方式没有办法升级你的Ubuntu到更高的版本。第三个问题：一定的学习实践成本，以下就我个人的实践经验提供tar包全盘备份的基本步骤和原理，也许你在网络上可以找到更方便的脚本或者备份软件替代这些工作，但是如果遇到问题回到这些具体的步骤和原理可以帮助你了解到底是哪里出了问题，怎么解决这些问题。

###全盘备份

得益于Linux系统强大的命令行和系统设计，全盘备份一个Ubuntu系统的基本原理相当简单：使用tar命令打包必要的文件目录即可，也就是说备份系统和备份数据基本没有区别。

新建一个脚本文件BACKUP_SYSTEM.sh，在其中添加以下内容：

    mkdir ~/BACKUP_SYSTEM
    
    sudo tar --exclude /proc --exclude /mnt --exclude /tmp --exclude /media --exclude /home/youngben/Downloads --exclude /home/youngben/Templates --exclude '/home/youngben/VirtualBox VMs' --exclude /home/youngben/BACKUP_SYSTEM -jpcvf ~/BACKUP_SYSTEM/Ubuntu-14.04-20141228-my-pc.tar.bz2 /

这两条命令首先在home目录新建了一个BACKUP_SYSTEM的目录用于放置备份后的tar包。随后tar命令的 --exclude 参数排除了某些你认为没有必要进行备份的目录，例如 Download, Templates 目录，同时我的案例里也排除 VirtualBox VMs 这个目录，因为安装虚拟机以后，Virtualbox所在的这个目录会极度膨胀，我们没有必要把几十个G的虚拟机镜像全都备份进tar包。-jpcvf 这个命令中：j 表示使用 bzip2 格式打包，这是一种压缩耗时但是压缩比很高的格式，经常用于压缩大数据。p 表示在制作tar包的时候保留目录结构的用户权限信息，最大程度的对文件系统做现场保护。cvf 表示创建一个压缩包，并且列出详细的压缩过程。~/BACKUP_SYSTEM/Ubuntu-14.04-20141228-my-pc.tar.bz2 指定了压缩包的文件名，我个人偏向于在这个文件名里写清楚版本信息，打包的时间和在哪一台机器上做的备份，有助于今后做恢复操作。这条命令的最后有一个 “/” 字符就是表示从本机的根目录开始做全盘备份，你本机的所有东西除了被 --exclude 的目录都会被打进最终的压缩包。即使是全盘备份，事前一定要甄别清楚到底哪些目录是没必要备份的，否则压缩和解压过程都会变得无法接受的漫长。

开启终端运行 sh BACKUP_SYSTEM.sh 开始备份。取决于用户备份数据的多少和硬件配置的好坏，备份的时长会有所不同。在笔者本机上，去除非必要目录的全盘备份花费了大约1个小时，把 40G 的资料压缩在 9G 大小的压缩包内。如果你想时刻了解压缩的进度，可以开启另一个终端，运行以下命令：

    ~/BACKUP_SYSTEM/Ubuntu-14.04-20141228-my-pc.tar.bz2
    
这个watch命令用于每隔5秒执行一遍随后的 'ls -alh ~/BASHUP_SYSTEM/' 幷高亮出两次执行之间的不同，因此你可以观察到正在制作中的压缩包大小的变化。

###全盘恢复

恢复系统的步骤会比备份繁琐许多，以下是主要步骤，我会尽量解释每个步骤的含义。

    确保事先备份的压缩包在某个分区可以被访问到，这里假设你的备份压缩包位于/home/youngben/BACKUP_SYSTEM/Ubuntu-14.04-20121228-my-pc.tar.bz2

    通过Ubuntu的启动U盘或者光盘重启电脑，进入试用Ubuntu的模式。

    在试用模式的Ubuntu中开启终端，运行命令

    sudo su -

切换至 root 权限，取得 root 权限以后类似 fdisk -l, df -h 这些命令才能返回准确的结果。

####运行命令
    sudo gparted
    
打开Linux下的分区软件gparted，如果提示需要安装，则运行

    sudo apt-get install gparted    

如果你对自己的分区已经满意，也可以略过分区的步骤，只需要格式化 / 所在分区即可，/home 所在分区因为用于存放备份压缩包，可以选择暂时不做格式化。

####解压备份压缩包

    mkdir /tmp/root
    mkdir /tmp/root2
    mount /dev/sda1 /tmp/root
    mount /dev/sda2 /tmp/root2
    cd /tmp/root2/jiawzhang/BACKUP_SYSTEM/
    sudo tar -jpxvf Ubuntu-14.04-20141228-my-pc.tar.bz2 -C /tmp/root
    
使用U盘启动到live Ubuntu模式幷不会实际上挂载你的物理分区，所以这里需要使用mount命令手动挂载你刚才格式化以后的 / 分区并且将压缩包解压导入。新建两个目录/tmp/root /tmp/root2，将分区/dev/sda1 /dev/sda2分别挂载到这两个目录。确保sda1是系统恢复以后挂载 / 目录的分区，sda2是原来/home目录挂载的分区，其中有我们需要的备份压缩包存在。挂载完毕以后，/tmp/root 对应了 sda1 分区，/tmp/root2 对应了 sda2 分区，进入 /tmp/root2/youngben/BACKUP_SYSTEM 就是我们原先的备份存储的位置。运行 sudo tar -jpxvf xxx.tar.bz2 -C /tmp/root 做解压操作，jpxvf 中的 x 指解压，-C /tmp/root 则指定了需要解压的目标目录，这里实际上就是 sda1 分区所在的根目录。完成这个操作以后，所有的数据就已经被还原到 sda1 分区。你应该可以查看到类似 /tmp/root/etc， /tmp/root/home/ 这样的目录，它们对应的目录就是原先的 /etc， /home。我们下面的步骤会指定启动系统的时候把 sda1 分区挂载回 / 目录，sda2分区挂载回 /home 目录，这样在系统的目录结构就完全恢复了。另外由于/home目录对应的 sda2 分区之前没有进行过格式化操作，此时你可以选择删除/tmp/root2/youngben/下除了BACKUP_SYSTEM以外的所有数据，然后运行
    cp /tmp/root/home/. /tmp/root2/ -r
    rm /tmp/root/home -rf
    
将刚才从备份压缩包中解压出的/tmp/root/home部分的数据重新拷贝到/tmp/root2，然后删除/tmp/root/home，即完成了从sda1分区转移恢复后的home数据到sda2分区的工作：sda2 分区是过后用来挂载 /home 目录的分区，理应把home下的数据恢复在这个分区。

####恢复分区的 GRUB/MBR 信息

经过格式化，分区等等步骤以后，即便你是在现有硬盘上恢复自己的系统，分区的 uuid 都可能已经被改变，因此当初备份在压缩备份包里的启动引导信息诸如：GRUB/MBR都已经不再和目前实际的信息相匹配，我们因此要做修复工作。

仍旧在 live ubuntu 模式下运行：

    sudo add-apt-repository ppa:yannubuntu/boot-repair
    sudo apt-get update
    sudo apt-get install -y boot-repair
    sudo boot-repair
    
下载运行启动修复软件 boot-repair，启动后点击默认推荐方式即可。如果想了解这个软件具体做了哪些工作，可以在这里参看[手工修复](http://ubuntuforums.org/showthread.php?t=224351)的步骤。不过由于笔者并未验证其正确性，不能保证一定可用。

    ls -al /dev/disk/by-uuid
    
再次查看各个分区的 uuid 信息，确保这些 uuid 和 /tmp/root/etc/fstab 中使用的 uuid 一致， 需要挂载的 /， /home，swap 在 /tmp/root/etc/fstab 中也和相应的 uuid 匹配。因为我们恢复的备份使用的是旧有的 uuid 信息，如果不一致：手工打开/tmp/root/etc/fstab这个文件做更正，主要工作就是替换其中的 uuid 字符串和上述命令中的一致。在启动系统的时候，/etc/fstab 这个文件指定了分别挂载sda1 sda2 sda3分区到 /，/home，swap，如果没有正确的 uuid 以及分区目录挂载匹配，系统就无法正确启动。大家可以大致参看一下 /etc/fstab 这个文件的内容片段：

    # / was on /dev/sda1 during installation
    UUID=f381f8cd-ca11-4227-b9ce-8de330bf0e9f /               ext4    errors=remount-ro 0       1
    # /home was on /dev/sda2 during installation
    UUID=b4b376c7-9ef0-48dc-9f50-28decd899190 /home           ext4    defaults        0       2
    # swap was on /dev/sda3 during installation
    UUID=d770aa08-a3f3-4469-a682-f161cff16135 none            swap    sw              0       0

另外如果你加装第二块硬盘以后也可以通过 'ls -al /dev/disk/by-uuid' 查看新硬盘的 uuid，幷新建这块硬盘分区对应的挂载目录以后，将这些信息一并写入 /etc/fstab，这样，系统在启动以后就会自动加载你的新硬盘分区。

####重建系统目录

这些目录就是我们当初做备份时加在 --exclude 参数后面的目录
    
    mkdir /tmp/root/proc /tmp/root/mnt /tmp/root/tmp /tmp/root/media
    chmod 777 /tmp/root/tmp

记得一定要赋予 /tmp/root/tmp 777 权限，这是一个系统级别的临时目录，需要完全的读写权限，否则你的系统无法启动成功，我自己在最初实践全盘备份恢复的时候就因为忽视了这个小细节，导致屡次恢复系统失败，差点放弃。

####重启计算机    

关闭计算机，幷从硬盘重启计算机，一切顺利的话，全盘恢复已经成功，至此，你可以别无二致的使用备份当时的专属高效系统了。

全盘备份恢复的操作对初学者来说有一定的风险，如果担心操作不当丢失数据，可以先在虚拟机环境里练习，笔者实践过这种方法对虚拟机一样适用。

-[Ubuntu桌面生存指南](https://www.zybuluo.com/ghosert/note/3408)