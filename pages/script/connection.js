const sendRequest = (data, callback) => {
    var dataJson = JSON.stringify(data);
    var request = new XMLHttpRequest();
    request.open("POST", "../server/main.php", !0);
    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    request.send(dataJson);
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            //callback(request.responseText, data);
            console.log(request.responseText);
        }
    }
}

export default sendRequest;