const onClickButtonRegister = () => {
	document.getElementById("regs-button").addEventListener("click", ()=>{
		const regsData = {
			"cmnd" : "create_register",
			"user" : document.getElementById("regs-user").value,
			"name" : document.getElementById("regs-name").value,
			"datebirth": document.getElementById("regs-date").value,
			"email" : document.getElementById("regs-email").value,
			"password" : document.getElementById("regs-password").value,
		}
		console.log("Clicked", regsData)
		data = JSON.stringify(regsData);
		request = new XMLHttpRequest();
		request.open("POST", "../server/main.php", !0);
		request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
		request.send(data);
		request.onreadystatechange = function () {
		    if (request.readyState === 4 && request.status === 200) {
		        try{
		        	jsondata = JSON.parse(request.responseText);
		       		console.log(jsondata);
		       	}catch(e) {
		 			console.log(request.responseText);
		       	}
		    }
		}
	})
}
onClickButtonRegister();