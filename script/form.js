const onClickButtonForm = (DataForm, callback) => {
	DataForm.button.addEventListener("click", ()=>{
		if ( verifyForm(DataForm) ){ return false }
		var data = getData(DataForm)
		callback(data);
	})
}

const verifyForm = (DataForm) => {
	var verifyData = Object.values(DataForm)
	var thereError = false
	verifyData.forEach( (input, i ) => {
		if(input.value === "" && i != 0){
			thereError = true
		}
	});
	return thereError;
}

const getData = (DataForm) => {
	var Data = Object.entries(DataForm)
	var objData = new Object();
	Data.forEach(input => {
		objData[input[0]] = input[1].value
	})
	return objData
}

export default onClickButtonForm;