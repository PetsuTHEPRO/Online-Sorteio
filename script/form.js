import 'https://code.jquery.com/jquery-3.6.0.js';
import './modules/notify.min.js';

const onClickButtonForm = (DataForm, callback) => {
	DataForm.button.addEventListener("click", ()=>{
		if ( validateForm(DataForm) ){ return false }
		var data = getData(DataForm)
		callback(data);
	})
}

const validateForm = (DataForm) => {
	var validateData = Object.values(DataForm)
	var thereError = false
	validateData.forEach( (input, i ) => {
		if(input.value === "" && i != 0){
			$.notify(`Campo ${input.name} Vazio!`, 'error')
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