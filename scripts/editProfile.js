function allowEdit(id) {
	if(id=="gjinia"){
		document.getElementById(id).disabled=false;
		document.getElementById(id).focus();
		return;
	}
	document.getElementById(id).readOnly=false;
	document.getElementById(id).focus();
}