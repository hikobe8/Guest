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
if(!function_exists("_mysql_string")){
    exit("_mysql_string()函数不存在,请检查!");
}

/**
 * _check_uniqid 检查唯一标识符
 * @access public
 * @param string $first_id 表单中的唯一标识符
 * @param string $end_id 服务器生成唯一标识符
 * @return string 如果验证通过返回表单生成的标识符
 */
function _check_uniqid($first_id, $end_id) {
    if(strlen($first_id) != 40 || $first_id != $end_id) {
        _alert_back("唯一标识符异常!");
    }
    return _mysql_string($first_id);
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
function _check_password($pwd1,$pwd2,$minsize) {
    if(strlen($pwd1) < $minsize){
        _alert_back("密码不得小于".$minsize.'位');
    }
    if($pwd1 != $pwd2){
        _alert_back("密码和确认密码不一致!");
    }
    return _mysql_string(sha1($pwd1));
}
/**
 * _check_password_modify 检查修改的密码
 * @param string $_pwd 密码
 * @param int $minsize 最短长度
 * @return string 转义的密码
 */
function _check_password_modify($_pwd, $minsize) {
    if(empty($_pwd)){
        return null;
    }
    if(strlen($_pwd) < $minsize){
        _alert_back("密码不得小于".$minsize.'位');
    }
    return _mysql_string(sha1($_pwd));
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
    $question = trim($question);
    if(mb_strlen($question,'utf-8') < $minsize || mb_strlen($question,'utf-8') > $maxsize) {
        _alert_back("密码提示必须为".$minsize.'到'.$maxsize.'位');
    }
    return _mysql_string($question);
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
    $question = trim($question);
    $answer = trim($answer);
    if(mb_strlen($answer,'utf-8') < $minsize || mb_strlen($answer,'utf-8') > $maxsize) {
        _alert_back("密码回答必须为".$minsize.'到'.$maxsize.'位');
    }
    if($question == $answer){
        _alert_back('密码提示和密码回答不得相同!');
    }
    return _mysql_string(sha1($answer));
}

/**
 * _check_email 检查邮件地址是否合法
 * @access public 
 * @param string $email 邮件地址
 * @return 合法的邮件地址 / 空值
 */
function _check_email($email,$_min_num, $_max_num) {
    if (strlen($email) < $_min_num || strlen($eamil) > $_max_num) {
        _alert_back('邮件长度不合法！');
    }
    //hikobe@163.com
    if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $email)){
        _alert_back("请输入正确的邮件地址!");
    } 
    return _mysql_string($email);
}

/**
 * _check_qq 检查qq是否输入正确
 * @access public
 * @param string $qq qq号码
 * @return string 正确的qq号 或者null
 */
function _check_qq($qq){
    if(empty($qq)){
        return null;
    }
    //794891323 
    $mode = '/^[1-9]{1}[\d]{5,9}$/';
    if(!preg_match($mode, $qq)){
        _alert_back("请输入正确的QQ号!");
    }
    return _mysql_string($qq);
}

/**
 * _check_url 检查输入的个人主页是否合法
 * @access public
 * @param string $url
 * @return string 合法的主页地址或null
 */
function _check_url($url){
    if('http://' == $url ||empty($url)){
        return null;
    }
    $mode = '/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/';
    if(!preg_match($mode, $url)){
        _alert_back("请输入正确的个人主页!");
    }
    return _mysql_string($url);
}
?>