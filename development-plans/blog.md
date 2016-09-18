[Blog module of RiverXu.cn][1]
===================

本网站博客模块基本目标为创建一个仅由管理员进行内容更新的个人博客。
由于开发者的Web开发技能还在学习中，博客的开发将会使用迭代式开发，并持续使用新知识重构代码，迭代阶段划分见下文详情。

----------
目录
-----------------
[TOC]

------------

开发技术
-------------
前端：HTML5 + CSS3 + JavaScript
后端：纯PHP（为了练习PHP而放弃JSP与Servlet）

-----------
需求简介
-------------
###用户
> 管理员（即博客拥有者River Xu，以下简称“RX”）， 博客访客（以下简称“访客”）
###需求
> 以下需求按照开发顺序排序：
> 1. 博客系统允许RX在Web登录获得管理员权限，以进行进一步管理（不排除将来提供普通用户登录功能的可能性）
> 2. 博客系统允许RX在Web向系统中添加文章（仅含文字内容），删除文章
> 3. 博客系统允许访客浏览文章目录与具体文章
> 4. 博客系统允许访客进行留言，位置包括总留言板与具体文章的评论区
> 5. 博客系统允许RX在Web对文章进行修改
> 6. 博客系统允许RX删除评论、留言
> 7. 博客文章支持插入图片元素
> 8. 博客文章支持排版元素（包括字体、字号等）
> 9. 博客系统为访客在文章目录处提供文章预览
> 9. 博客文章支持更多多媒体元素（包括音乐、视频等）



------------
迭代阶段（开发计划与日志）
-------------
###1. 开发博客基础功能（需求1、2、3）
预计完成时间：2016/09/18

日志：
2016/09/16
设计：
1. 有关管理员验证：虽然目前用户只有RX一人，但是由于将来可能提供多人验证，故设计数据库模块，记录SESSION_ID与其已获取权限。
完成：
1. 博客欢迎页（登录页面，/blog-dev/welcome.php）的部分HTML编写

2016/09/17
设计：
1. MySQL两个表与登录功能关联：
> 1. table users(username VARCHAR(16) PRIMARY KEY,password VARCHAR(32) not null,granted TINYINT not null) 三列分别是用户名，MD5(密码)，用户权限级别。
> 2. table sid_buf(sid varchar(30),recent_visit BIGINT, granted tinyint); 四列分别是sessionID，回话最近更新时间，用户权限级别，用户名。
完成：
1. 完成博客欢迎页（登录页面，/blog-dev/welcome.php）的HTML与JS编写
2. 配置服务器MySQL，创建PHP用户与所需数据表
3. 完成登录api（/blog-dev/api/login.php）及其所需下层lib的编写（但是lib文件中一些暂时没用到的函数还没有实现）

2016/09/18
设计：
1. 前端设计：为了实现需求2、3，要为管理员提供新增文章页面、浏览现有文章列表页面、文章正文页面，为一般访客提供浏览现有文章列表页面、文章正文页面
> 1. 新增文章列表页面(/blog-dev/new-article.html)：当前要求较简单，通过JS脚本向服务器对应API(/blog-dev/api/add-article.php)POST标题(title)+正文(content)即可
> 2. 浏览现有文章页面(/blog-dev/article-list.php)：显示当前所有文章标题，并连接到对应的文章正文页面
> 3. 文章正文页面(/blog-dev/view.php?aid=...)：显示aid对应文章，aid不存在则返回“文章不存在”的异常信息
2. 服务器后台设计：
> 1. 添加文章API(/blog-dev/api/add-article.php)：接受POST(title=...&content=...)，检查请求的session是否具有管理员权限，有则向数据库添加文章（为简化，暂时允许重名等情况），返回提示成功或失败信息。
> 2. 新建文章存储数据表：table articles (id INT primary key auto_increment,title TINYTEXT,content TEXT); 三列分别是文章ID，文章标题，文章内容。其中文章ID不需要insert时指明，只需要之后查询。
完成：
1. 完成new-article.html
2. 完成new-article.html所使用的js脚本与API(stub implementation)，添加/WEB-INF/php-lib/blog-article-management.php（怎么文件名越来越长了）





  [1]: http://riverxu.cn/blog-dev