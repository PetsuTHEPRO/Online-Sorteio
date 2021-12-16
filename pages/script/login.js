import sendRequest from './connection.js';
import { setCookie } from './cookies.js';
import './modules/notify.min.js';

const login = (DataForm) => {
    DataForm["command"] = "login_user";
    sendRequest(DataForm, stateLogin)
}
const stateLogin = (response, data) => {
    const states = {
        'UserLoginValid': function() {
            setCookie('UserLogin', data.email, 3);
            setCookie('PasswordLogin', data.password, 3);
            window.location.href = './painel-usuario.php';
        },
        'UserLoginInvalid': function() {
            $.notify('Usuario ou Senha Incorretas!', 'error')
        },
    }
    var resp = response.split(';')
    resp.forEach(r => {
        states[r]();
    })
}
const getLoginModelObjData = () => {
    return {
        "email": document.getElementById("form-email"),
        "password": document.getElementById("form-password"),
    }
}
export { getLoginModelObjData, login }