import onClickButtonForm  from "./form.js";

const login = (DataForm, callback) => {
	DataForm["cmnd"] = "login";
	var data = JSON.stringify(DataForm);
	var request = new XMLHttpRequest();
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
}
const getLogModelObjData = () => {
	return {
		"button" : document.getElementById("form-button-log"),
		"email" : document.getElementById("form-email"),
		"password" : document.getElementById("form-password"),
	}
}
onClickButtonForm(getLogModelObjData(), login);
