window.onload = function() {
	var imgs = document.getElementsByTagName('img');
	for(var i = 0; i < imgs.length; i ++){
		imgs[i].onclick = function (){
			_opener(this.alt);
		}
	}
};

function _opener(src){
	var img = opener.document.getElementById("faceImg");
	img.src = src;
	opener.document.registerform.facesrc.value = src;
}