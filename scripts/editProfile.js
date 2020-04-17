function allowEdit(id) {
	if(id=="gjinia"){
		document.getElementById(id).disabled=false;
		return;
	}
	document.getElementById(id).readOnly=false;
}