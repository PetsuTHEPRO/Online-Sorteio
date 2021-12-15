import onClickButtonForm from "./form.js";
import sendRequest from './connection.js';
import { setCookie } from './cookies.js';

const register = (DataForm) => {
    DataForm["cmnd"] = "create_register";
    sendRequest(DataForm, stateRegister);
}

const stateRegister = (response, data) => {
    const states = {
        'UserRegisterValid': function() {
            setCookie('UserLogin', data.email, 3);
            setCookie('PasswordLogin', data.password, 3);
            window.location.href = './painel-usuario.php';
        },
        'UserRegisterInvalid': function() {
            $.notify('Usuario de Instagram Já Cadastrado!', 'error')
        },
        'EmailRegisterInvalid': function() {
            $.notify('Email Já Cadastrado!', 'error')
        },
    }
    var resp = response.split(';')
    resp.forEach(r => {
        states[r]();
    })
}
const getRegisterModelObjData = () => {
    return {
        "user": document.getElementById("form-user"),
        "name": document.getElementById("form-name"),
        "datebirth": document.getElementById("form-date"),
        "email": document.getElementById("form-email"),
        "password": document.getElementById("form-password"),
    }
}
export { getRegisterModelObjData, register };