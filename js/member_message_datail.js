/**
 * 
 */
 window.onload = function () {
 	var del = document.getElementById('delete');
 	var back = document.getElementById("back");
 	back.onclick = function() {
 		history.back();
 	}
 	del.onclick = function() {
 		if(confirm("确定删除此短信?")) {
 			location.href = "member_message_datail.php?action=delete&id="+this.name;	
 		}
 	};
 }