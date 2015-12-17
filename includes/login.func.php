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
?>