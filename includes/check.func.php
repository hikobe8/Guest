<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月12日上午12:05:03
*/
//防止恶意调用
if (!defined('IN_TG')) {
    exit('Access Defined!');
}
//检查_alert_back()函数是否引用成功
if(!function_exists("_alert_back")){
    exit("_alert_back()函数不存在,请检查!");
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
        _alert_back("用户名长度必须为".$minsieze.'到'.$maxsize.'位');
    }
    $pattern = "/[<>\'\"\*\ \　]/";
    if(preg_match($pattern, $tname)){
        _alert_back("用户名不得包含特殊字符!");
    }
    //限制注册以下姓名
    $limitnames[0] = '孟桂伏';
    $limitnames[1] = '挨弯刀';
    $limitnames[2] = '独牛';
    foreach ($limitnames as $name) {
        $names .= '[' . $name . '] ';
    }
    if(in_array($tname, $limitnames)) {
        _alert_back("不得注册以下敏感用户名:".$names);
    }
    //使用mysql转义当前字符串 防止sql注入攻击
    return mysql_real_escape_string($tname);
}
?>