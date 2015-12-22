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
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
<?php
require ROOT_PATH . "includes/header.inc.php";
/**
 * $_page_num 页码
 */
$_page_num = 1;
/**
 * $_page_size 每页的数量
 */
$_page_size = 10;
$_user_count = mysql_num_rows(_query("SELECT tg_id FROM tg_user WHERE tg_active=''"));
/**
 * $_page_count 总页数/最大页码
 */
$_page_count = ceil($_user_count / $_page_size);
if(isset($_GET['page'])){
    $_page_num = $_GET['page'];
    //检查GET传过来的非法页码
    if(empty($_page_num) || !is_numeric($_page_num)) {
        $_page_num = 1;
    } else {
        if($_page_num > $_page_count) {
            $_page_num = $_page_count;
        }
        $_page_num = intval($_page_num);
    }
    
}
$_start_index = ($_page_num - 1)*$_page_size;
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
?>
<dl>
<dd class='user'><?php echo $_user['username'].'('.$_user['sex'].')'?></dd>
<dt><img src="<?php echo $_user['face']?>"/></dt>
<dd class='message'>发消息</dd>
<dd class='friend'>加为好友</dd>
<dd class='guest'>写留言</dd>
<dd class='flower'>给<?php echo $_user['sex']=='男'?'他':'她'?>送花</dd>
</dl>
<?php 
   }
?>
<div id='page_num'>
<ul> 
<?php 
    for ($_i = 1; $_i <= $_page_count; $_i ++){
        echo '<li><a href="blog.php?page='.$_i.'">'.$_i.'</a></li>';      
    }
?>
</ul>
</div>
<div id='page_text'>
<ul> 
    <li><?php echo $_page_num."/".$_page_count?>页 | </li>
    <li>共有<?php echo $_user_count?>个会员 | </li>
    <?php 
        if ($_page_num == 1) {
            echo "<li>首页 | </li>";
            echo "<li>上一页 | </li>";
        } else {
            echo '<li><a href="'.SCRIPT.'.php">首页 </a>| </li>';
            echo '<li><a href="'.SCRIPT.'.php?page='.($_page_num - 1).'">上一页</a> | </li>';
        }
        if ($_page_num == $_page_count) {
            echo "<li>下一页 | </li>";
            echo "<li>尾页</li>";
        } else {
            echo '<li><a href="'.SCRIPT.'.php?page='.($_page_num + 1).'">下一页 </a>| </li>';
            echo '<li><a href="'.SCRIPT.'.php?page='.$_page_count.'">尾页</a></li>';
        }
    ?>
</ul>
</div>
</div>
<?php
require ROOT_PATH . "includes/footer.inc.php";
?>
</body>
</html>