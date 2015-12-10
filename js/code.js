/**
 * 
 */
 window.onload = function(){
 	var code = document.getElementById('code');
 	code.onclick = function(){
 		this.src='authcode.php?tm='+Math.random();
 	}
 }