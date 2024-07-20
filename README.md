# 别溯了，不是我!  仓库留这了，免杀的文件删了，源码丢这了

有人拿着此项目参加教育HW，导致溯源的时候，溯到我身上来了，所以这个项目中的相关代码也以及删除

如果有认识Pings的，可以私下联系获取，并且相关类似项目不会在github更新

----
## 2023-11-21说明：源码都丢这了，自己异或混淆加密做免杀。
## 多的我也不想说了，看不明白的自己动手GPT弄就行
----

1.0版本
----
***V1.0包括404页面伪装的小马，大马，以及phpinfo伪装的一句话***

页面预览：

![](https://blog.hackersafe.cn/usr/uploads/2023/04/1272370387.jpg)
Apache 404页面大马---不选中文本框完全看不出来

![](https://blog.hackersafe.cn/usr/uploads/2023/04/3920095714.jpg)
Nginx  404页面大马---不选中文本框完全看不出来

![](https://blog.hackersafe.cn/usr/uploads/2023/04/2289915934.jpg) 
大马内部很简洁（个人觉得能用就行了,个人常用功能都有）

![](https://blog.hackersafe.cn/usr/uploads/2023/04/2677959249.jpg) 
phpinfo伪装马链接冰蝎测试

***php仅进行了简单的混淆***
虚拟机和本机没有养蛊，没装太多杀软，直接丢VT查杀了一遍
简单测试:火绒+卡巴联网云查杀+红伞+360 全部过了

![](https://blog.hackersafe.cn/usr/uploads/2023/04/786935356.jpg) 
![](https://blog.hackersafe.cn/usr/uploads/2023/04/525643061.jpg) 

其他的小马均达到免杀效果

2.0版本
----

**4月21日新增：**

***404页面代码执行+一句话(普通版)-Apache+Nginx双版本***

***404页面代码执行+一句话(冰蝎版)-Apache+Nginx双版本***

***phpinfo伪装代码执行+一句话（普通马）***

***phpinfo伪装代码执行+一句话（冰蝎马）***


**项目实测：**

Apache代码执行一句话
![](https://blog.hackersafe.cn/usr/uploads/2023/04/2615735501.png)
链接效果：
![](https://blog.hackersafe.cn/usr/uploads/2023/04/3934924214.png)

Nginx代码执行一句话
![](https://blog.hackersafe.cn/usr/uploads/2023/04/4103886106.png)
链接效果:
![](https://blog.hackersafe.cn/usr/uploads/2023/04/1664660445.png)

phpinfo代码执行一句话
![](https://blog.hackersafe.cn/usr/uploads/2023/04/1331313457.png)
链接效果：
![](https://blog.hackersafe.cn/usr/uploads/2023/04/3074238730.png)

**其他普通小马均已通过相关测试!**

***2.0版本免杀测试***

火绒，卡巴，360（2件套）小红伞，金山毒霸，电脑管家，百度管家，瑞星，2345 都是默认配置联网上传没关的一样免杀

其余杀软未测试，自寻下载项目扫描！

[![Star History Chart](https://api.star-history.com/svg?repos=BugFor-Pings/PHPwebshell&type=Date)](https://star-history.com/#BugFor-Pings/PHPwebshell&Date)


