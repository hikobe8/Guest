<?php
/**
 * TestGuest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date: 2015-12-7
*/
// 使用判断index定义的常量，防止恶意调用
if (! defined ( 'IN_TG' )) {
	exit ( "Access Denied!" );
}
?>
<div id="footer">
	<p>本页面执行耗时:<?php echo round(_runtime() - START_TIME, 4)?>秒</p>
	<p>版权所有 翻版必究!</p>
	<p>
		本程序由<span>瓢城Web俱乐部提供</span>，可以任意修改或发布(c) hikobe@163.com
	</p>
</div>