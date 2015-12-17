/**
 * 
 */
window.onload = function () {
 	code();
 	var mFace = document.getElementById('faceImg');
 	mFace.onclick = function(){
 		window.open('face.php','face',"width=400,height=400,top=0,left=0,scrollbars=1");
 	}
 	var form = document.getElementsByTagName('form')[0];
 	form.onsubmit =  function () {
 		//验证用户名长度
 		if(form.username.value.length < 2 || form.username.value.length > 20) {
 			alert('用户名必须为2到20位之间!');
 			form.username.value = '';
 			form.username.focus();
 			return false;
 		}
 		//验证用户名是否包含非法字符
 		if('/[<>\'\"\ \　]/'.test(form.username.value)){
 			alert('用户名不得包含非法字符!');
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
 		//比对两次密码输入
 		if(form.password.value != form.notpassword){
 			alert('确认密码与密码不一致!');
 			form.notpassword.value = '';
 			form.notpassword.focus();
 			return false;
 		}
 		//验证密码提示长度
 		if(form.passd.value.length < 2 || form.passd.value.length > 20) {
 			alert('密码提示必须为2到20位之间!');
 			form.passd.value = '';
 			form.passd.focus();
 			return false;
 		}
 		//验证密码回答长度
 		if(form.passt.value.length < 2 || form.passt.value.length > 20) {
 			alert('密码回答必须为2到20位之间!');
 			form.passt.value = '';
 			form.passt.focus();
 			return false;
 		}
 		//验证邮箱
 		if(form.email.value != '') {
 			if(!'/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/'.test(form.email.value)) {
 				alert('请输入正确的邮箱地址!');
 			form.email.value = '';
 			form.eamil.focus();
 			return false;
 			}
 		}
 		//验证QQ
 		if(form.qq.value != '') {
 			if(!'/^[1-9]{1}[\d]{5,9}$/'.test(form.qq.value)) {
 				alert('请输入正确的邮箱地址!');
 			form.qq.value = '';
 			form.qq.focus();
 			return false;
 			}
 		}
 		//验证主页
 		if(form.url.value != '') {
 			if(!'/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/'.test(form.url.value)) {
 				alert('请输入正确的邮箱地址!');
 			form.url.value = '';
 			form.url.focus();
 			return false;
 			}
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