import onClickButtonForm from "./form.js";
import { getLoginModelObjData, login } from './login.js';
import { getRegisterModelObjData, register } from './register.js';

const pageLoad = () => {
    var namePage = document.getElementById('name-page').innerHTML

    console.log(namePage);
    if (namePage === 'area-login') {
        onClickButtonForm(getLoginModelObjData(), login);
    }
    if (namePage == 'area-cadastro') {
        onClickButtonForm(getRegisterModelObjData(), register);
    }
}

const typeButtonHeader = () => {
    var btnHeader = document.getElementById('btn-header')
    var namePage = document.getElementById('name-page').innerHTML

    if (namePage == 'area-cadastro' || namePage == 'index') {
        btnHeader.innerHTML = "Login"
        btnHeader.classList.add('btn-login');
        btnHeader.addEventListener('click', e => window.location.href = './area-login.php')

    } else {
        btnHeader.innerHTML = "Cadastro"
        btnHeader.classList.add('btn-cadastro');
        btnHeader.addEventListener('click', e => window.location.href = './area-cadastro.php')
    }
}
typeButtonHeader();
pageLoad();