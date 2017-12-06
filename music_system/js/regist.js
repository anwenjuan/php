window.onload=function(){
	var username = document.getElementById("uesename");
	var password1 = document.getElementById("password1");
	var password2 = document.getElementById("password2");
	var mail = document.getElementById("mail");

	username.onblur = function(){
		if(this.value ===''){
			this.nextSibling.innerHTML='    ';
			this.nextSibling.className='wrong';
		}
	}
}