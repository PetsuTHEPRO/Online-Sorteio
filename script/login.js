import onClickButtonForm from "./form.js";
import sendRequest from './connection.js';
import { setCookie } from './cookies.js';
import './modules/notify.min.js';
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
			$.notify('Usuario ou Senha Incorretas!', 'error')
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
