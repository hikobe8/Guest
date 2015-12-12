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

/**
 * _check_password() 检查密码是否符合规则并加密
 * @access public
 * @param string $pwd1 密码
 * @param string $pwd2 确认密码
 * @param int $minsize 密码最小长度
 * @return string 符合规则加密后的密码
 */
function _check_password($pwd1,$pwd2,$minsize) {
    if(strlen($pwd1) < $minsize){
        _alert_back("密码不得小于".$minsize.'位');
    }
    if($pwd1 != $pwd2){
        _alert_back("密码和确认密码不一致!");
    }
    return sha1($pwd1);
}
/**
 * _check_pwd_question()检查密码提示是否输入正确
 * @access public
 * @param string $question 密码提示
 * @param int $minsize 最小长度 
 * @param int $maxsize 最大长度
 * @return string 过滤后的密码提示
 */
function _check_pwd_question($question,$minsize,$maxsize) {
    if(mb_strlen($question,'utf-8') < $minsize || mb_strlen($question,'utf-8') > $maxsize) {
        _alert_back("密码提示必须为".$minsieze.'到'.$maxsize.'位');
    }
    return mysql_real_escape_string($question);
}
/**
 * _check_answer检查密码提示问题的答案是否输入正确
 * @access public
 * @param string $question 密码提示
 * @param string $answer 密码提示答案
 * @param string $mixsize 最小长度
 * @param string $minsize 最大长度
 * @return string 加密的密码提示
 */
function _check_pwd_answer($question, $answer, $minsize, $maxsize) {
    if(mb_strlen($answer,'utf-8') < $minsize || mb_strlen($answer,'utf-8') > $maxsize) {
        _alert_back("密码回答必须为".$minsize.'到'.$maxsize.'位');
    }
    if($question == $answer){
        _alert_back('密码提示和密码回答不得相同!');
    }
    return sha1($answer);
}

/**
 * _check_email 检查邮件地址是否合法
 * @access public 
 * @param string $email 邮件地址
 * @return 合法的邮件地址 / 空值
 */
function _check_email($email) {
    if(empty($email)){
        return null;
    }
    //hikobe@163.com
    if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $email)){
        _alert_back("邮件地址不合法!");
    }
    return mysql_real_escape_string($email);
}
?>