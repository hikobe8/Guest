<?php

    /**
     * _uniqid 返回一个唯一标识符
     * @access public
     * @return string 40位的唯一标识符
     */
    function _uniqid(){
        return sha1(uniqid(rand(),true));
    }

    /**
     * _mysql_string 返回一个mysql的转义字符串 提高写入数据库的安全性
     * @access public 
     * @param string $str 需要转义的字符串
     * @return string 转义后的字符串
     */
    function _mysql_string($str) {
        if(!GPC) {
            return mysql_real_escape_string($str);
        }
        return $str;
    }
    
    /**
     * 比较输入验证码是否相等
     * @access public
     * @param string $code1  输入的验证码
     * @param string $code2  生成的验证码
     */
    function _checkcode($code1, $code2) {
        if(!($code1 == $code2)) {
            _alert_back("验证码输入错误，请重新输入!");
        }
    }
    
    /**
     * _location 跳转到指定页面 第一个参数为空即直接跳转没有提示信息
     * @access public
     * @param string $info 提示信息
     * @param string $desturl 目标地址
     */
    function _location($info,$desturl){
        if(!empty($info)) {
            echo "<script>alert('$info');location.href='$desturl'</script>";
        } else {
            header('Location:'.$desturl);
        }
    }
    
	/**
	 * 获取执行耗时
	 * @access public
	 * @return float 时间戳+微秒数
	 */
	function _runtime(){
		$time = explode(' ',microtime());
		return $time[1] + $time[0];
	}
	/**
	 * 调用js弹出提示框
	 * @param string $info 提示信息
	 */
	function _alert_back($info){
	    echo "<script>alert('$info');history.back();</script>";
	    exit();
	}
	
	/**
	 * _code() 调用生成一张验证码图片
	 * @access public
	 * @param number $width 图片宽度
	 * @param number $height 图片高度
	 * @param number $code_count 验证码位数
	 * @param string $border 是否需要边框
	 * @return 打印一张验证码图片
	 */
	function _code($width = 75, $height = 25, $code_count = 4 , $border = false){
	    for($i = 0; $i < $code_count; $i ++) {
	        $code .= dechex(mt_rand(0, 15));
	    }
	    $_SESSION['code'] = $code;
	    $image = @imagecreatetruecolor($width, $height);
	    // 创建白色画笔
	    $white = imagecolorallocate($image, 255, 255, 255);
	    imagefill($image, 0, 0, $white);
	    // 创建黑色画笔
	    $black = imagecolorallocate($image, 0, 0, 0);
	    if($border){
	        // 创建边框
	        imagerectangle($image, 0, 0, $width - 1, $height - 1, $black);
	    }
	    // 随机画六条直线
	    for ($line = 0; $line < 6; $line ++) {
	        $line_rnd_color = imagecolorallocate($image, _rand(255), _rand(255), _rand(255));
	        imageline($image, _rand($width), _rand($height), _rand($width), _rand($height), $line_rnd_color);
	    }
	    // 随机打印雪花
	    for ($snow = 0; $snow < 100; $snow ++) {
	        $snow_rnd_color = imagecolorallocate($image, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
	        imagestring($image, 1, _rand($width), _rand($height), '*', $snow_rnd_color);
	    }
	    //打印验证码
	    for($code_index = 0;$code_index < $code_count;$code_index ++) {
	        $code_rnd_color = imagecolorallocate($image, _rand(100), _rand(150), _rand(200));
	        imagestring($image, mt_rand(3, 5), $code_index*$width/4+_rand(10), _rand($height/2), $_SESSION['code'][$code_index], $color);
	    }
	    imagepng($image);
	    imagedestroy($image);
	}
	
	/**
	 * @access public
	 * @return 0~$x 随机数
	 */
	function _rand($x) {
	    return mt_rand(0, $x);
	}
	
	/**
	 * _session_destroy 销毁 session
	 */
	function _session_destroy() {
	    session_destroy();
	}
	
	/**
	 *_logout 注销登录并销毁session
	 */
	function _logout(){
	    setcookie('username','',time()-3600);
	    setcookie('uniqid','',time()-3600);
	    _session_destroy();
	}
	
	/**
	 * _check_login_state检查当前的登录状态 避免登录状态下的误操作
	 */
	function _check_login_state() {
	    if(isset($_COOKIE['username'])){
	        _alert_back("登录状态不能进行此操作!");
	    }
	}
?>
