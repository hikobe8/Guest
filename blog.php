<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月18日上午10:40:24
*/
// 定义防止恶意调用使用的常量
define ( "IN_TG", true );
//定义调用样式的常量
define("SCRIPT", 'blog');
// 引入公共文件
require dirname ( __FILE__ ) . '/includes/common.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--博友</title>
<?php require ROOT_PATH.'includes/title.inc.php';
?> 
<script type="text/javascript" src="js/blog.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
_page("SELECT tg_id FROM tg_user WHERE tg_active=''", 15);
global $_start_index, $_page_size;
$_sql = "SELECT tg_id,tg_username,tg_face,tg_sex FROM tg_user WHERE tg_active = '' ORDER BY tg_reg_time DESC LIMIT ".$_start_index.",".$_page_size;
//取出所有激活的用户 并且以注册时间降序排序
$_result = _query($_sql);
?>
<div id='blog'>
<h2>博友列表</h2>
<?php 
    while (!!$_row =_fetch_array_list($_result)) {
        $_user = array();
        $_user['id'] = $_row['tg_id'];
        $_user['username'] = $_row['tg_username'];
        $_user['face'] = $_row['tg_face'];
        $_user['sex'] = $_row['tg_sex'];
        $_user = _html($_user);
?>
<dl>
<dd class='user'><?php echo $_user['username'].'('.$_user['sex'].')'?></dd>
<dt><img src="<?php echo $_user['face']?>"/></dt>
<dd class='message'><a href="javascript:;" name="message" title="<?php echo $_user['id']?>">发消息</a></dd>
<dd class='friend'>加为好友</dd>
<dd class='guest'>写留言</dd>
<dd class='flower'>给<?php echo $_user['sex']=='男'?'他':'她'?>送花</dd>
</dl>
<?php 
   }
?>
<?php 
   _free_result($_result);
   _paging(2);
?>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>