#SeanPHP

一个简单的PHP框架

version: 1.0.0

description: 实现了一个MVC PHP框架，目前仅支持URL重写下的路由分发，仅支持单模块，前端模板基于Smarty3定制

##目录结构

├─ app                  模块框架

│  ├─ controller        控制器目录

│  ├─ model             模块目录

│  ├─ view              视图目录

├─ config               配置文件

├─ seanphp              框架核心

├─ public               公共资源

├─ index.php            单入口文件


## 关于Smarty3的扩展
* Smarty3 的基本文档请参见 http://www.smarty.net/docs/zh_CN/
* 引入前端资源
    * <{js file="path/to/file"}>   引入相对于public下的js文件
    * <{css file="path/to/file"}>  引入相对于public下的css文件
    * <{import file="path/to/file" type="js或css"}> 引入相对于public下的资源文件
    * <{import file="path/to/file.suffix"}> 自动识别类型，suffix为后缀名,可以是js/css
    * <{img src="path/to/file" title="" alt}> 引入相对于public目录下的图片


## 关于系统核心目录seanphp的说明
### 目录结构
├─ util     放置系统组件，比如对session的拓展等
 
├─ vendor   放置系统驱动器，smarty就放在此目录下

Model.php         `数据层基类`

View.php          `视图层基类，主要实现Smarty的整合`

Controller.php    `控制层基类`

Functions.php     `系统函数库`

Sql.php           `数据库连接类 （PDO方式实现）`

##免责声明
本框架并没有实战于项目中，仅供学习用。若用户将此框架用于实际项目出现的任何问题与作者无关。
如果你对SeanPHP感兴趣，或者想要拓展它，欢迎随意分发修改。


##关于作者
* 邮件（lxm0828#sina.com, 把#换成@)
* QQ: 929325776
* weibo: [@捏明](http://weibo.com/littlelxm)

