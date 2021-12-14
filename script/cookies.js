const setCookie = (cname, cvalue, exdays) => {
    const date = new Date();
    date.setTime(date.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ date.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
const getCookie = (cname) => {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let cookiesplit = decodedCookie.split(';');

    cookiesplit.forEach(c => {
        if (c.indexOf(name) == 0) {
            console.log(c.substring(name.length, c.length))
            return c.substring(name.length, c.length);
        }
    })
}

export { setCookie, getCookie };