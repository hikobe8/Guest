/**
 * 
 */
window.onload = function () {
 	code();
 	var mFace = document.getElementById('faceImg');
 	mFace.onclick = function(){
 		alert("dddddd");
 		window.open('face.php','face',"width=400,height=400,top=0,left=0,scrollbars=1");
 	}
 	var form = document.getElementsByTagName('form')[0];
 	form.onsubmit =  function () {	
 		//验证密码长度
 		if(form.password.value != '') {
 			if(form.password.value.length < 6 ) {
 			alert('密码不得小于6位!');
 			form.password.value = '';
 			form.password.focus();
 			return false;
 			}
 		}
 		
 		//验证邮箱
		if(form.email.value == '' || !'/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/'.test(form.email.value)) {
			alert('请输入正确的邮箱地址!');
			form.email.value = '';
			form.eamil.focus();
			return false;
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