import onClickButtonForm  from "./form.js";

const register = (DataForm, callback) => {
	DataForm["cmnd"] = "create_register";
	var data = JSON.stringify(DataForm);
	var request = new XMLHttpRequest();
	console.log(data)
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
const getRegModelObjData = () => {
	return {
		"button" : document.getElementById("form-button-reg"),
		"user" : document.getElementById("form-user"),
		"name" : document.getElementById("form-name"),
		"datebirth": document.getElementById("form-date"),
		"email" : document.getElementById("form-email"),
		"password" : document.getElementById("form-password"),
	}
}
onClickButtonForm(getRegModelObjData(), register);

