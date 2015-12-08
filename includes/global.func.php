<?php
	/**
	 * 获取执行耗时
	 * @access public
	 * @return float 时间戳+微秒数
	 */
	function _runtime(){
		$time = explode(' ',microtime());
		return $time[1] + $time[0];
	}
?>