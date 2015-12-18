<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月17日下午5:13:02
*/
//防止恶意调用
if (!defined('IN_TG')) {
    exit('Access Defined!');
}
//检查_alert_back()函数是否引用成功
if(!function_exists("_alert_back")){
    exit("_alert_back()函数不存在,请检查!");
}
if(!function_exists("_mysql_string")){
    exit("_mysql_string()函数不存在,请检查!");
}
/**
 * 检查一个用户名是否符合规则
 * @param unknown $name 用户名
 * @param unknown $minsize 用户名的最小长度
 * @param unknown $maxsize 用户名的最大长度
 * @return 过滤后的用户名
 */
function _check_username($name,$minsize,$maxsize) {
    $tname = trim($name);
    if(mb_strlen($tname,'utf-8') < $minsize || mb_strlen($tname,'utf-8') > $maxsize) {
        _alert_back("用户名长度必须为".$minsize.'到'.$maxsize.'位');
    }
    $pattern = "/[<>\'\"\s]/";
    if(preg_match($pattern, $tname)){
        _alert_back("用户名不得包含特殊字符!");
    }
    //使用mysql转义当前字符串 防止sql注入攻击
    return _mysql_string($tname);
}
/**
 * _check_password() 检查密码是否符合规则并加密
 * @access public
 * @param string $pwd1 密码
 * @param string $pwd2 确认密码
 * @param int $minsize 密码最小长度
 * @return string 符合规则加密后的密码
 */
function _check_password($pwd,$minsize) {
    if(strlen($pwd) < $minsize){
        _alert_back("密码不得小于".$minsize.'位');
    }
    return _mysql_string(sha1($pwd));
}

/**
 * _check_saved_time 检查需要保存的时间
 * @param string $time 需要保存的时间的类型 0-不保存  1-一天  2-一周  3-一个月
 * @return string 需要保存的时间
 */
function _check_saved_time($time){
    $times[0] = '0';
    $times[1] = '1';
    $times[2] = '2';
    $times[3] = '3';
    if(!in_array($time, $times)){
        exit("保存时间出错!");
    }
    return _mysql_string($time);
}

/**
 * _set_Cookies_user 生成用户登陆的cookies 并且根据选择的保存类型保存cookie
 * @param string $username 用户名
 * @param string $uniqid 用户唯一标识符
 * @param string $timetype 保存的时间
 */
function _set_cookies_user($username, $uniqid, $timetype) {
    setcookie('uniqid', $uniqid);
    switch ($timetype){
        case '0':
            setcookie('username', $username);
            setcookie('uniqid', $uniqid);
            break;
        case '1':
            setcookie('username', $username, time()+86400);
            setcookie('uniqid', $uniqid, time()+86400);
            break;
        case '2':
            setcookie('username', $username, time()+604800);
            setcookie('uniqid', $uniqid, time()+604800);
            break;
        case '3':
            setcookie('username', $username, time()+2592000);
            setcookie('uniqid', $uniqid, time()+2592000);
            break;
    }
}
?>