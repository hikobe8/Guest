/**
 * 
 */
 window.onload =function () {
 	code();
 	var form = document.getElementsByTagName('form')[0];
 	form.onsubmit =  function () {
 		//验证用户名长度
 		if(form.username.value.length < 2 || form.username.value.length > 20) {
 			alert('用户名必须为2到20位之间!');
 			form.username.value = '';
 			form.username.focus();
 			return false;
 		}
 		//验证密码长度
 		if(form.password.value.length < 6 ) {
 			alert('密码不得小于6位!');
 			form.password.value = '';
 			form.password.focus();
 			return false;
 		}
 		//检查验证码的长度
 		if(form.code.value.length != 4){
 				alert('请输入4位验证码!');
 			form.code.value = '';
 			form.code.focus();
 			return false;
 		}
 		return true;
 	}
 }