<?php
/**
 * Guest Version1.0
 * ================================================
 * Copy 2015-2016 hikobe8
 * Email: hikobe8@163.com
 * ================================================
 * Author: hikobe8
 * Date:2015年12月18日下午5:29:53
*/
// 定义防止恶意调用使用的常量
//define ( "IN_TG", true );
//引入公共文件d
require dirname ( __FILE__ ) . '/includes/common.inc.php';
/* $insert = "INSERT INTO tg_user (
                                                tg_uniqid,
                                                tg_username,
                                                tg_password,
                                                tg_question,
                                                tg_answer,
                                                tg_email,
                                                tg_qq,
                                                tg_url,
                                                tg_active,
                                                tg_sex,
                                                tg_face,
                                                tg_reg_time,
                                                tg_last_time,
                                                tg_last_ip
                                    ) values (
                                                '".sha1(uniqid(rand()+$i,true))."',
                                                '狗伏".$i."',
                                                    '123456',
                                                    '狗伏',
                                                    '哈鸡儿',
                                                    'fufu@hajier.com',
                                                    '',
                                                    '',
                                                    '',
                                                    '女',
                                                    'face/m01.gif',
                                                    NOW(),
                                                    NOW(),
                                                    '{$_SERVER['REMOTE_ADDR']}'
    )"; */
$update = "UPDATE tg_user set tg_password = '"._mysql_string(sha1('123456'))."'WHERE tg_password='123456'";
for ($_i = 0;$_i < 30; $_i ++){
    $_updateface = "UPDATE tg_user set tg_face = 'face/m"._mysql_string($_i+24).".gif' WHERE tg_username='狗伏".$_i."'";
    _query($_updateface);
}
_closeDB();
echo "success!";
?>

