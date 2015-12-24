<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月16日下午9:18:31
*/
//防止恶意调用
if(!defined('IN_TG')){
    exit("Access Denied!");
}


/**
 * _connectDB 连接到数据库
 */
function _connectDB(){
    global $conn;
    if(!$conn = @mysql_connect(_DB_HOST, _DB_USER, _DB_PWD)){
        exit("数据库连接失败！");
    }
}

/**
 * _closeDB 关闭当前连接的数据库
 */
function _closeDB(){
    if(!mysql_close()) {
        exit('数据库关闭异常！');
    }
}

/**
 * _selectDB 选择数据库
 */
function _selectDB(){
    if(!mysql_select_db(_DB_NAME)){
        exit("找不到指定的数据库!");
    }
}

/**
 * _setNames 设置字符集为utf-8
 */
function _setNames(){
    mysql_query("SET NAMES UTF8");
}


/**
 * _query 执行sql语句
 * @access public
 * @param string $sql sql语句
 * @return resource $result 执行的结果或者空
 */
function _query($sql){
    if(!$result = mysql_query($sql)){
        exit("sql语句执行错误!".mysql_error());
    } 
    return $result;   
}

/**
 * _fetch_array 抓取当前结果集的一行数据
 * @access public
 * @param string $sql sql 语句
 * @return array 当前结果集的一行数据，已列名为下标
 */
function _fetch_array($sql){
    return mysql_fetch_array(_query($sql),MYSQL_ASSOC);
}

/**
 * _fetch_array_list 获取结果集的一行数据
 * @access public
 * @param resource $result
 * @return array 返回资源的一行结果集,下标为列名,可以使用while+此函数遍历结果集
 */
function _fetch_array_list($result) {
    return mysql_fetch_array($result, MYSQL_ASSOC);
}
/**
 * _is_repeat 判断当前sql语句查询的结果是否已存在于数据库
 * @param string $sql sql语句
 * @param string $info 提示信息
 */
function _is_repeat($sql, $info){
    if(_fetch_array($sql)){
        _alert_back($info);
    }
}

/**
 * 返回上一次mysql语句执行的影响条数
 * @return int
 */
function _affect_rows(){
    return mysql_affected_rows();
}

/**
 * _free_result 释放查询结果集占用的资源
 * @access public 
 * @param resource $_result 结果集 
 */
function _free_result($_result) {
    mysql_free_result($_result);
}

/**
 * _check_cookie_uniqid 用于验证本地存储的uniqid
 * @access public
 * @param unknown $_native_uniqid 本地uniqid
 * @param unknown $_server_uniqid 服务器数据库的uniqid
 */
function _check_cookie_uniqid($_native_uniqid, $_server_uniqid) {
    if($_native_uniqid != $_server_uniqid){
        _alert_back("uniqid 错误");
    }
}


/**
 * _updateLoginInfo 登录成功保存用户的最后登录时间,ip,以及登陆次数加1
 * @access public
 * @param string $_username 用户名
 * @return null
 */
function _updateLoginInfo($_username) {
    $_sql = "UPDATE tg_user SET
    tg_last_time=NOW(),
    tg_last_ip='{$_SERVER['REMOTE_ADDR']}',
    tg_login_count=tg_login_count+1
    WHERE tg_username='$_username'";
    _query($_sql);
}
?>