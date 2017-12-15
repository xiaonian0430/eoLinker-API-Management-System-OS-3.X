# eoLinker API接口管理系统开源版

![](http://data.eolinker.com/course/QPW3uZ9b6f87bfa7a61f53e3a9120a32027e55cbd642f27)

## 简介

**eoLinker是目前全球领先、国内最大的在线API接口管理平台，提供自动生成API文档、API自动化测试、Mock测试、团队协作等功能，旨在解决由于前后端分离导致的开发效率低下问题。**

目前eoLinker为Google、IBM、中国联通、海尔、神州优车、国美等数千家企业提供快速、专业、稳定的API管理服务。

同时eoLinker还是Google谷歌开发者联盟的合作产品与企业，不定期举办线下交流分享活动促进国内API管理领域的发展。

## 特性

1. 免费且开源，eoLinker拥有强大的免费产品，在过去的一年里面eoLinker已迭代超过300个版本，优化近千功能点，同时秉承开源精神，提供国际化的开源产品（支持中文简体、繁体以及英语），为广大的开发、测试以及管理人员提供专业的产品。

2. 同类产品中最强大的API文档管理系统，支持目前HTTP/HTTPS协议以及所有主流请求方式，并且提供了强大的版本管理功能，可以随时随地回滚API信息。同时支持数据库管理、状态码管理、项目文档管理等常用管理功能。

3. 代码自动生成文档，通过读取代码中的EOML（eoLinker标注语言）注解，eoLinker可以自动生成API文档，省去了重复录入的麻烦，无缝连接开发与管理工作。

4. API接口测试，支持文件、在线、跨域、自动化测试等功能。同时拥有参数构造器，可以对请求参数进行自动构造，加密、分割、随机字符串等功能一应俱全。配合测试用例可以非常方便地对比请求结果与模型，找出API可能出现的问题。

5. API自动化测试（*目前仅支持线上版本），eoLinker是目前全球唯一一款支持界面与代码双模式的自动化测试工具。在UI界面模式下，你不需要编写任何代码即可创建数据相互关联的API测试用例（比如注册-登录-检查登陆状况-退出登录）；同时你也可以通过编写Javascript代码来构造复杂的自动化测试场景。这些都极大地简化了开发测试人员的API测试工作，每次开发完成只需要一个键即可自动测试所有API并且生成测试报告，帮助了解项目API的健康状况。

6. API Mock测试，提供最强的Mock功能，支持MockJS，支持自动刷新返回结果以及多种返回的结果。同时还支持对API进行请求校验，当参数或值不符合预设的模板时能够及时找出问题所在。

7. 支持文档分享和导出，你可以通过eoLinker在线生成接口文档，也可以导出成为HTML、PDF以及Word等，快速分享或发布API信息。

8. 支持Postman、RAP、RestClint等数据导入，无需重新录入API信息，一键导入即可切换平台。

9. 强大的团队协作功能，你可以通过URL快速邀请成员或者加入某个项目，eoLinker提供了全面的日志追踪以及权限管理功能。

10. 拥有最全面的产品线，eoLinker除了拥有线上版本之外，还提供了免费开源版本、浏览器插件、PC端桌面程序等，可以满足企业所有的API管理需求。

## 图片介绍

![](http://data.eolinker.com/course/UKqa58Lb051cf1085b22bf4d1e24c52022c981dc32166bd)
![](http://data.eolinker.com/course/nNmSD28e4ef5c7339c5449cb4f8c5904be7f025d0d6ae72)
![](http://data.eolinker.com/course/Rgz8DcQ4f21471cb1172573fdb595a1c165148f6bcfdb22)
![](http://data.eolinker.com/course/JPGkitw9d6f38f7fc541d9202850c3dffe82d1e575c2a6c)

## 部署要求

* PHP 5.5+
* mysql  5.5+
* Apache / Nginx

## 快速入门

1. [安装指南](http://help.eolinker.com/?target=/md/%E5%BC%80%E6%BA%90%E7%89%88%E6%9C%AC/%E9%83%A8%E7%BD%B2%E6%8C%87%E5%8D%97)

2. [使用指南](http://help.eolinker.com)

3. [视频使用指南](http://blog.eolinker.com/#/course/)

3. QQ群：284421832

## 注意事项

1. 3.x版本与2.x版本并不兼容，因此无法直接由2.x升级到3.x，也无法通过覆盖代码的方式进行升级，切勿随意尝试以防数据丢失。
2. 如果需要进行数据的迁移，可以使用eoLinker接口管理系统中的【导出项目】功能：将项目导出为eoLinker专用格式（.export），然后在3.x版本中导入。
3. 为了防止数据丢失，请在执行任何关键操作之前妥善备份数据库。

## 相关链接

> 中文官网：www.eolinker.com

> 开源支持：https://www.eolinker.com/#/os/download

> Github：https://github.com/eolinker

> 码云：https://gitee.com/eoLinker-API-Management

> Coding：https://coding.net/u/eolinker/project

> Blog：http://blog.eolinker.com

> 视频教程：http://blog.eolinker.com/#/course/

## 更新日志

### V3.1.7

新增：
1. 更加开放的开源态度，开源项目协议从GPL更改为Apache 2.0
2. 支持项目备份功能，一键将项目数据同步到线上账号，从此不再害怕数据丢失问题
3. 新增API自动化测试功能，自定义接口测试顺序以及数据关联等，让接口测试进入自动化时代
4. 新增数据库备份功能，选择手动更新或自动更新都会自动备份数据库到dump文件夹

修复：
1. 修复安装失败仍然提示已安装的问题，优化安装逻辑（返回错误信息，方便调试）
2. 修复参数类型选择‘文件’不出现文件选择按钮的问题
3. 修复在接口详情页面中无法删除接口的问题
4. 修复导出项目数据的问题

优化：
1. 优化手动更新和自动更新的逻辑

### V3.1.6

新增：
1. 加入项目文档
2. 加入代码生成文档
3. 加入人员权限显示

优化：
1. 完善界面体验

修复：
1. 修复分组重命名失败的问题

### V3.1.5

新增：
1. 加入项目概况，可以查看项目的整体信息；
2. 加入项目动态，可以查看项目操作历史记录；
3. 支持简易Mock；
4. 支持一键自动更新；
5. 开源版安装配置增加mbstring模块及session路径权限的检测；
6. 修改接口分组及状态码分组支持直接切换到其他父分组下；
7. 新增接口测试历史；

优化：
1. 完善引导页提示；
2. 改善页面显示效果；
3. 完善项目协作管理的权限检测;

修复：
1. 去掉搜索用户时重复出现的“添加”字样；
2. 修复导入RAP文档失败的bug；