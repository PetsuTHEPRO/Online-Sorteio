
const onClickButtons = () => {
    var btnlog = document.getElementById('page-login')
    if( btnlog ) btnlog.addEventListener('click', e => {
        window.location.href = 'area-login.html'
    })
    var btnreg = document.getElementById('page-register')
    if ( btnreg ) btnreg.addEventListener('click', e => {
        window.location.href = 'area-cadastro.html'
    })
}

onClickButtons();