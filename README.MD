## 结构简介

------

只有Controller和Model。

所有的请求的链接都应该都是这样组成的

```
http://域名/index.php?fn=数字&param=json参数
```
或
```
http://域名/?fn=数字&param=json参数
```

数字在config文件下的fn_map.php自定义添加

> * 数字下标为Controller的索引
> * 该下标对应的值为Controller所在的路径和文件名

-------
### Controller

对应在名为Controller的文件夹下，***文件名即为对应的类名***,不区分大小写

所有的自定义Controller都应该***extends Controller***,

所有的自定义Controller都应该有一个set_param方法,这是自定义Controller的处理入口

```php
//示例, my_controller.php

class My_controller extends Controller{

public function set_param($param){

//something here
}
}
```

Model同理，只是存放地方不一样，Model们应该在Model文件夹下。

-------

### 关于使用其他模块

在任意的model和controller中,你可以这样使用其它模块的方法

```php
//示例，比如A.php 中，
//使用model/tools/m.php的方法
public A extends Controller{

public set_param(){
//只要tools/m.php就行,而不是model/tools/m.php
$this->load('tools/m.php');
//does就是m.php中的方法
$this->m->does();
}
}

```

END，如何？？？