/**
 * 
 */
 window.onload = function () {
 	var messages = document.getElementsByName('message');
 	for(var i = 0; i < messages.length; i ++) {
 		messages[i].onclick = function () {
	 		centerInWindow('message.php?id='+this.title,'message',400,250); 
 		}
 	}
 }
  function centerInWindow(url, wName, width, height) {
  	var marginTop = (screen.height - height)/2;
  	var marginLeft = (screen.width - width)/2;
  	window.open(url, wName, 'width='+width+',height='+height+',top='+marginTop+',left='+marginLeft);
  }