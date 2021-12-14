import onClickButtonForm  from "./form.js";
import sendRequest from './connection.js';

const register = (DataForm, callback) => {
	DataForm["cmnd"] = "create_register";
	sendRequest(DataForm);
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

