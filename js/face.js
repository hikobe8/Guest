/**
 * 
 */
 
 //等待网页加载完毕再执行脚本
 window.onload = function() {
 	var mFace = document.getElementById('faceImg');
 	mFace.onclick = function(){
 		window.open('face.php','face',"width=400,height=400,top=0,left=0,scrollbars=1");
 	}
 }