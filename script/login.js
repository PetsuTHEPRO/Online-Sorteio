import onClickButtonForm from "./form.js";
import sendRequest from './connection.js';
import { setCookie } from './cookies.js';

const login = (DataForm, callback) => {
	DataForm["cmnd"] = "login_user";
	sendRequest(DataForm, stateLogin)
}
const stateLogin = (response, data) => {
	const states = {
		'UserLoginValid' : function(){
			setCookie('UserLogin', data.email, 3);
			setCookie('PasswordLogin', data.password, 3);
			window.location.href = 'conectado.html';
		},
		'UserLoginInvalid' : function(){
			console.log("erro");
		},
	}
	states[response]();
}
const getLoginModelObjData = () => {
	return {
		"button" : document.getElementById("form-button-log"),
		"email" : document.getElementById("form-email"),
		"password" : document.getElementById("form-password"),
	}
}
onClickButtonForm(getLoginModelObjData(), login);
